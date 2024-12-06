<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_re_det extends Model
{
    use HasFactory;
    protected $table="invoice_re_det";
    protected $fillable=[
        'id_invoice_re','id_item','price','quantity','total','updated_at','created_at'
    ];
}
