<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\gen;


class Acc_printController extends Controller
{
    public function index()
    {
       
        $data=Accounts::select()->orderby('id_account')->paginate(10000);

        $data2=gen::select()->orderby('id_gen')->first();
            
       


return view('print.acc_print',['data'=>$data,'data2'=>$data2]);

    }}