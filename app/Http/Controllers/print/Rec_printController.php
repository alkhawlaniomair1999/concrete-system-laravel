<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts;

use App\Models\rec;
use App\Models\rec_det;

class Rec_printController extends Controller
{
    public function index($id)
    {
        $data=rec::where('id_rec',$id)->first();
        $data3=Accounts::select()->paginate(10000);
        $data4=rec_det::where('id_rec',$id)->paginate(10000);




return view('print.rec_print',['data'=>$data,'data3'=>$data3,'data4'=>$data4]);

    }}