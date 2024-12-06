<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Orders;
use App\Models\types_concrete;
use App\Models\customer;

use App\Models\rec;
use App\Models\rec_det;

class Agree_printController extends Controller
{
    public function index($id)
    {
        $data=Orders::where('id_order',$id)->first();
        $data1=types_concrete::where('id_types_concrete',$data->id_types_concrete)->first();
        $data2=customer::where('id_customer',$data->id_customer)->first();



return view('print.agree_print',['data'=>$data,'data1'=>$data1,'data2'=>$data2]);

    }}