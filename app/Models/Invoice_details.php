<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    use HasFactory;
    protected $table="details_invoice";
    protected $fillable=[
        'id_invoice','id_item','price','quantity','total','updated_at','created_at'
    ];
}
