<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $table="accounts";
    protected $fillable=[
        'name_account','type_account','debtor','creditor','updated_at','created_at'
    ];
}
