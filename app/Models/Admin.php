<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table="admins";
    protected $fillable=[
        'name','email','username','password','init_system','supp','prod','acc','users','created_at','updated_at','created_by','updated_by','com_code',
    ];
}
