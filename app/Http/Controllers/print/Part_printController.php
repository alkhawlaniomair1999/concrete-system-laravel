<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Orders;
use App\Models\types_concrete;
use App\Models\customer;
use App\Models\gen;
use App\Models\Parts;
use App\Models\rec;
use App\Models\rec_det;
use App\Models\tracks;

class Part_printController extends Controller
{
    public function index($id)
    {
        $data4=Parts::where('id_part',$id)->first();
        $data=Orders::where('id_order',$data4->id_order)->first();
        $data1=types_concrete::where('id_types_concrete',$data->id_types_concrete)->first();
        $data2=customer::where('id_customer',$data->id_customer)->first();
        $data3=Parts::where('id_order',$data4->id_order)->orderby('id_part')->paginate(10000);
        $data5=tracks::select()->orderby('id_track')->paginate(10000);
return view('print.part_print',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data4'=>$data4,'data3'=>$data3,'data5'=>$data5]);

    }}