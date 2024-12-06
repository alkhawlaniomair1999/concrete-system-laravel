<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table="employee";
    protected $fillable=[
        'name_emp','address','id_dept','phone_emp','salary','personal_id','id_account','created_at'
    ];
}
