<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracks extends Model
{
    use HasFactory;
    protected $table="tracks";
    protected $fillable=[
        'id_track','model','id_board','updated_at','created_at'
    ];
}
