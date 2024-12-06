<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gen extends Model
{
    use HasFactory;
    protected $table="gen";
    protected $fillable=[
        'name_gen','address_gen','logo_gen','email','coun_gen','updated_at','created_at'
    ];
}
