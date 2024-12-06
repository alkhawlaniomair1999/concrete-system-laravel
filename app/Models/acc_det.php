<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acc_det extends Model
{
    use HasFactory;
    protected $table="acc_det";
    protected $fillable=[
        'id_account','id_proc','proc_type','debtor','creditor','total','details','updated_at','created_at'
    ];
}
