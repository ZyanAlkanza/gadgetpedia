<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderDetails()
    {
        return $this->hasMany(Orderdetail::class);
    }
}
