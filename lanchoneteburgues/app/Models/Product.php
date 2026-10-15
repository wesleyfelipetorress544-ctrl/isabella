<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'category', 'burger_type', 'description', 'price', 'image_path'])]
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    public const CATEGORIES = [
        'lanches' => 'Lanches',
        'bebidas' => 'Bebidas',
        'acompanhamentos' => 'Acompanhamentos',
    ];

    public const BURGER_TYPES = [
        'classicos' => 'Clássicos',
        'smash' => 'Smash',
        'frango' => 'Frango',
        'vegetariano' => 'Vegetariano',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }
}
