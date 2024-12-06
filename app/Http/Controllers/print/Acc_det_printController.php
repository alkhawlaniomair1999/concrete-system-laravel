<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\acc_det;
use App\Models\Accounts;
use App\Models\gen;


class Acc_det_printController extends Controller
{
    public function index($id_account)
    {
        $data=Accounts::where('id_account',$id_account)->first();
        $data1=acc_det::where('id_account',$id_account)->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();

        
            
       


return view('print.acc_det_print',['data'=>$data,'data1'=>$data1,'data2'=>$data2]);

    }}