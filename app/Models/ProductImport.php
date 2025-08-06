<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImport extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'description',
        'product_length',
        'side',
        'color_desc',
        'product_size',
        'cC',
        'cB1',
        'cB',
        'lmall_D1',
        'cG',
        'cE1',
        'cD',
        'lE_G',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
