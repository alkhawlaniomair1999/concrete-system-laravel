<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edit_invent extends Model
{
    use HasFactory;
    protected $table="edit_invent";
    protected $fillable=[
        'id_store','id_item','quantity','updated_at','created_at','created_by'
    ];
}
