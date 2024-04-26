<?php

namespace App\Models\food;

use App\Models\cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;
    protected $table= 'food';
    protected $fillable=[
    'name',
    'category',
    'description',
    'image',
    'price'];

    function cart(){
        return $this->hasMany(cart::class);
    }
}
