<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\item;
use App\Models\gen;


class itemControllers extends Controller
{
    public function index()
    {
        $data1=item::select()->orderby('id_item')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.item',['data1'=>$data1,'data2'=>$data2]);
    }
}
