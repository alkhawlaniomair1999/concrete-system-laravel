<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    protected $table="stores";
    protected $fillable=[
        'name_store','id_branch','updated_at','created_at'
    ];

}
