<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'product_id',
        'product_query_id',
        'sku',
        'email',
        'additional_note',
        'leg',
        'side',
        'color_desc',
        'cc',
        'cb1',
        'cb',
        'lower_length',
        'cg',
        'ce1',
        'cd',
        'upper_length',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
