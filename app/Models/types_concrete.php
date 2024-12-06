<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_concrete extends Model
{
    
    use HasFactory;
    protected $table="types_concrete";
    protected $fillable=[
        'type_concrete','price','updated_at','created_at'
    ];
}
