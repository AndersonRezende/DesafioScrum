<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'description', 'amount', 'value'
    ];

    public function productsDetail() 
    {
        return $this->hasMany(ProductDetail::class, 'product_id');
    }
}
