<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name',
        'hex_code',
        'is_active'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
