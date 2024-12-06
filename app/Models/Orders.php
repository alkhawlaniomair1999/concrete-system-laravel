<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=[
        'id_customer','quantity','price','id_types_concrete','address','date_delivery','updated_at','created_at','id_store','re'
    ];
}
