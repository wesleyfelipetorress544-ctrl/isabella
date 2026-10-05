<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'isbn', 'description'];

    public function getCoverUrlAttribute(): ?string
    {
        $coverId = $this->coverId();

        return $coverId ? 'https://covers.openlibrary.org/b/olid/'.$coverId.'-M.jpg' : null;
    }

    private function coverId(): ?string
    {
        $title = Str::lower($this->title);

        return match (true) {
            Str::startsWith($title, 'dom casmurro') => 'OL22170762M',
            Str::startsWith($title, 'capit') => 'OL62256210M',
            Str::startsWith($title, 'a hora da estrela') => 'OL35693081M',
            default => null,
        };
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(BookReview::class);
    }
}