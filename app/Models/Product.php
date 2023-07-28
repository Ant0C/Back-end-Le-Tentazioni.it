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
        'cover_image_s',
        'thumbnail',
        'thumbnail_s',
        'category_id',

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    protected function coverPath(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return asset('storage/' . $attributes['cover_image'],$attributes['cover_image_s']);
            }
        );
    }

    protected $appends = ['cover_path','cover_path_s'];
}
