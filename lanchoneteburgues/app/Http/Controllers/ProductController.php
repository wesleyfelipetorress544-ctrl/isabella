<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ProductController extends Controller
{
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $attributes = $request->safe()->except('image');
        $image = $request->file('image');

        if (! $image instanceof UploadedFile) {
            throw new RuntimeException('A imagem validada do produto não está disponível.');
        }

        if (! function_exists('imagecreatefromstring') || ! function_exists('imagewebp')) {
            throw new RuntimeException('A extensão GD com suporte a WebP é necessária para salvar imagens de produtos.');
        }

        $sourceImage = imagecreatefromstring($image->get());

        if ($sourceImage === false) {
            throw new RuntimeException('Não foi possível abrir a imagem enviada.');
        }

        $thumbnail = imagecreatetruecolor(800, 600);

        if ($thumbnail === false) {
            imagedestroy($sourceImage);

            throw new RuntimeException('Não foi possível preparar a imagem do produto.');
        }

        imagefill($thumbnail, 0, 0, imagecolorallocate($thumbnail, 255, 255, 255));

        try {
            $sourceWidth = imagesx($sourceImage);
            $sourceHeight = imagesy($sourceImage);
            $targetRatio = 4 / 3;
            $sourceRatio = $sourceWidth / $sourceHeight;

            if ($sourceRatio > $targetRatio) {
                $cropHeight = $sourceHeight;
                $cropWidth = (int) round($sourceHeight * $targetRatio);
                $sourceX = intdiv($sourceWidth - $cropWidth, 2);
                $sourceY = 0;
            } else {
                $cropWidth = $sourceWidth;
                $cropHeight = (int) round($sourceWidth / $targetRatio);
                $sourceX = 0;
                $sourceY = intdiv($sourceHeight - $cropHeight, 2);
            }

            if (! imagecopyresampled(
                $thumbnail,
                $sourceImage,
                0,
                0,
                $sourceX,
                $sourceY,
                800,
                600,
                $cropWidth,
                $cropHeight,
            )) {
                throw new RuntimeException('Não foi possível redimensionar a imagem do produto.');
            }

            ob_start();
            $encoded = imagewebp($thumbnail, null, 82);
            $imageContents = ob_get_clean();

            if (! $encoded || $imageContents === false) {
                throw new RuntimeException('Não foi possível converter a imagem do produto para WebP.');
            }
        } finally {
            imagedestroy($thumbnail);
            imagedestroy($sourceImage);
        }

        $imagePath = 'products/'.Str::uuid().'.webp';

        if (! Storage::disk('public')->put($imagePath, $imageContents)) {
            throw new RuntimeException('Não foi possível salvar a imagem do produto.');
        }

        $attributes['image_path'] = $imagePath;
        Product::query()->create($attributes);

        return redirect()->route('admin')->with('status', 'Produto cadastrado com sucesso.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $imagePath = $product->image_path;
        $productName = $product->name;
        $product->delete();

        if (! Str::startsWith($imagePath, 'products/')) {
            Log::warning('Product image was kept because its path is outside the products directory.', [
                'product_id' => $product->id,
                'image_path' => $imagePath,
            ]);

            return redirect()->to(route('home').'#cardapio')->with(
                'warning',
                "O produto {$productName} foi removido, mas a imagem foi mantida por segurança.",
            );
        }

        $storage = Storage::disk('public');

        if ($storage->exists($imagePath) && ! $storage->delete($imagePath)) {
            Log::error('Failed to delete a product image from public storage.', [
                'product_id' => $product->id,
                'image_path' => $imagePath,
            ]);

            return redirect()->to(route('home').'#cardapio')->with(
                'warning',
                "O produto {$productName} foi removido, mas não foi possível apagar a imagem.",
            );
        }

        return redirect()->to(route('home').'#cardapio')->with(
            'status',
            "O produto {$productName} foi removido com sucesso.",
        );
    }
}
