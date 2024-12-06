<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\types_concrete;
use App\Models\gen;


class print_conccereteControllers extends Controller
{
    public function index()
    {
        $data1=types_concrete::select()->orderby('id_types_concrete')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.concceret',['data1'=>$data1,'data2'=>$data2]);
    }
}
