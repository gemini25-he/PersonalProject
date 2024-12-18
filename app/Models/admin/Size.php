<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_active',
        'description'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
