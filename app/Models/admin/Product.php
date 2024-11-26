<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'status', 'is_featured'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Mối quan hệ giữa Product và ProductImage
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
