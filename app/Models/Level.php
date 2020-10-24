<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = ['description'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
