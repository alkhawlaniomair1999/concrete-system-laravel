<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table="suppliers";
    protected $fillable=[
        'name_supplier','phone_supplier','id_account','updated_at','created_at'
    ];
}
