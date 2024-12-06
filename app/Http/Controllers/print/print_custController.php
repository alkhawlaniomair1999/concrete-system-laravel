<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\customer;
use App\Models\Accounts;
use App\Models\gen;


class print_custController extends Controller
{
    public function index()
    {
        $data1=customer::select()->orderby('id_customer')->paginate(10000);
        $data=Accounts::select()->orderby('id_account')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.print_customer',['data1'=>$data1,'data'=>$data,'data2'=>$data2]);
    }
}
