<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table="customer";
    protected $fillable=[
        'name_customer','address','phone_customer','id_account','updated_at','created_at'
    ];
}
