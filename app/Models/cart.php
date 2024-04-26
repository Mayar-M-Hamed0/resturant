<?php

namespace App\Models;

use App\Models\food\food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'user_id',
        'food_id',

    ];

    function user(){
        return $this->belongsTo(User::class);
    }
    function food(){
        return $this->belongsTo(food::class);
    }
}
