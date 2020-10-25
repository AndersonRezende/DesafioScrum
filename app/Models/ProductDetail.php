<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'product_id', 'filename'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'user_id', 'id');
    }
}
