<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name',
        'description',
        'price',
        'visible',
        'size',
        'color',
        'slug',
        'cover_image',
        'thumbnail'
    ];

    public function user()
    {
    return $this->belongsToMany(Category::class);
    }

    protected function coverPath(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return asset('storage/' . $attributes['cover_image']);
            }
        );
    }
    protected $appends = ['cover_path'];
}
