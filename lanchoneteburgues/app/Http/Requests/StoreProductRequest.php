<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'category' => ['required', 'string', Rule::in(array_keys(Product::CATEGORIES))],
            'burger_type' => [
                'exclude_unless:category,lanches',
                'required',
                'string',
                Rule::in(array_keys(Product::BURGER_TYPES)),
            ],
            'description' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'numeric', 'decimal:0,2', 'min:0.01', 'max:999999.99'],
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'extensions:jpg,jpeg,png,webp',
                'dimensions:max_width=6000,max_height=6000',
                'max:2048',
            ],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator): void {
                if ($validator->errors()->has('image')) {
                    return;
                }

                $image = $this->file('image');

                if (! $image instanceof UploadedFile) {
                    return;
                }

                $dimensions = getimagesize($image->getRealPath());

                if ($dimensions === false || $dimensions[0] * $dimensions[1] > 12_000_000) {
                    $validator->errors()->add(
                        'image',
                        'A imagem original não pode ultrapassar 12 megapixels.',
                    );
                }
            },
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Informe o nome do produto.',
            'category.required' => 'Selecione uma categoria.',
            'category.in' => 'Selecione uma categoria válida.',
            'burger_type.required' => 'Selecione uma categoria para o lanche.',
            'burger_type.in' => 'Selecione uma categoria válida para o lanche.',
            'description.required' => 'Informe a descrição do produto.',
            'price.required' => 'Informe o preço do produto.',
            'price.decimal' => 'O preço deve ter no máximo duas casas decimais.',
            'price.min' => 'O preço deve ser maior que zero.',
            'image.required' => 'Selecione uma imagem para o produto.',
            'image.image' => 'O arquivo selecionado precisa ser uma imagem.',
            'image.mimes' => 'A imagem precisa estar no formato JPG, PNG ou WEBP.',
            'image.extensions' => 'A extensão do arquivo precisa ser JPG, PNG ou WEBP.',
            'image.dimensions' => 'A imagem original não pode ultrapassar 6000 pixels de largura ou altura.',
            'image.max' => 'A imagem original não pode ultrapassar 2 MB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'category' => 'categoria',
            'burger_type' => 'categoria do lanche',
            'description' => 'descrição',
            'price' => 'preço',
            'image' => 'imagem',
        ];
    }
}
