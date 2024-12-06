<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp_order extends Model
{
    use HasFactory;
    protected $table="temp_orders";
    protected $fillable=[
        'id_temp_order','id_types_concrete','quantity','address','id_account','updated_at','created_at'
    ];
}
