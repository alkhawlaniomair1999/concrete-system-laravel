<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component_concrete extends Model
{
    use HasFactory;
    protected $table="component_concrete";
    protected $fillable=[
        'id_types_concrete','id_item','quantity','updated_at','created_at'
    ];
}
