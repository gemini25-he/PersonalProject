<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'sku',
        'price',
        'quantity',
        'is_featured',
    ];

    // Mối quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Mối quan hệ với bảng size
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    // Mối quan hệ với bảng color
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
