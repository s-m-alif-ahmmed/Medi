<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getThumbnailAttribute($value){
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return url(Storage::url($value));
        }
        if (request()->is('api/*') && !empty($value)) {
            return url(Storage::url($value));
        }
        return $value;
    }

}
