<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    use HasFactory;
    protected $table="branches";
    protected $fillable=[
        'name_branch','manager','creditor','updated_at','created_at'
    ];
}
