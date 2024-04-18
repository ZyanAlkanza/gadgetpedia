<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function orderDetails()
    {
        return $this->hasMany(Orderdetail::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
