<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rec extends Model
{
    use HasFactory;
    protected $table="rec";
    protected $fillable=[
    'type_rec','total','details','updated_at','created_at','created_by'
    ];
}
