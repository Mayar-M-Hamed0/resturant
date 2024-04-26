<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'town',
        'country',
        'phone',
        'adderss',
        'user_id',
        'price',
        'status',
        'zipcode'];
}
