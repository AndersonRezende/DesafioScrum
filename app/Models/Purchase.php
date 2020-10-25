<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
    	'client_id', 'product_id', 'value'
    ];

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }

    public function product() 
    {
        return $this->belongsTo(Product::class);
    }
}
