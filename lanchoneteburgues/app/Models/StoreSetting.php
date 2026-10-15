<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['is_open'])]
class StoreSetting extends Model
{
    protected function casts(): array
    {
        return [
            'is_open' => 'boolean',
        ];
    }
}
