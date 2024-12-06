<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Suppliers;
use App\Models\Accounts;
use App\Models\gen;


class supplierControllers extends Controller
{
    public function index()
    {
        $data1=Suppliers::select()->orderby('id_supplier')->paginate(10000);
        $data=Accounts::select()->orderby('id_account')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.supplier',['data1'=>$data1,'data'=>$data,'data2'=>$data2]);
    }
}
