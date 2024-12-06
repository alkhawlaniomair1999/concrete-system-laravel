<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_re extends Model
{
    use HasFactory;
    protected $table="invoice_re";
    protected $fillable=[
    'id_supplier','updated_at','created_at','total_invoice','trans','created_by'
    ];
}
