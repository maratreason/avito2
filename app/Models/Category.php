<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'alias', 'img'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Category $category) {
            $category->alias = $category->alias ?? str($category->title)->slug();
        });
    }

    public function goods(): BelongsToMany
    {
        return $this->balongsToMany(Good::class);
    }
}
