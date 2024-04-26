<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingTable extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'email',
        'datetime',
        'num_of_people',
        'sp_request',
        'user_id',];


}
