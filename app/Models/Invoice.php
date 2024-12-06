<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table="head_invoice";
    protected $fillable=[
    'id_supplier','update_at','created_at','total_invoice','trans','created_by'
    ];
}
