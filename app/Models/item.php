<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table="items";
    protected $fillable=[
        'name_item','measuring_unit','creditor','updated_at','created_at'
    ];
}
