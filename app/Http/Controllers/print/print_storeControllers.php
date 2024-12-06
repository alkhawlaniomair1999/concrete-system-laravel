<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Stores;
use App\Models\branches;
use App\Models\gen;


class print_storeControllers extends Controller
{
    public function index()
    {
        $data1=Stores::select()->orderby('id_store')->paginate(10000);
        $data=branches::select()->orderby('id_branch')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.print_store',['data1'=>$data1,'data'=>$data,'data2'=>$data2]);
    }
}
