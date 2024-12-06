<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    use HasFactory;
    protected $table="parts";
    protected $fillable=[
        'id_order','id_track','quantity_part','id_emp','commet_delivery','date_exit','updated_at','created_at'
    ];
}
