<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    use HasFactory;
    protected $table="dept";
    protected $fillable=[
        'name_dept','manager','id_branch','updated_at','created_at'
    ];
}
