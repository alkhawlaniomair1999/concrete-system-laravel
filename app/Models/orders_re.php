<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_re extends Model
{
    use HasFactory;
    protected $table="orders_re";
    protected $fillable=[
        'id_order','updated_at','created_at'
    ];
}
