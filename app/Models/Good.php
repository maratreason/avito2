<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Good extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'alias', 'img', 'short_content', 'content', 'price'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Good $good) {
            $good->alias = $good->alias ?? str($good->title)->slug();
        });
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
