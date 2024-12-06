<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rec_det extends Model
{
    use HasFactory;
    protected $table="rec_det";
    protected $fillable=[
    'id_rec','id_account','updated_at','created_at'
    ];
}
