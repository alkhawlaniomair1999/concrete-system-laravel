<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\tracks;
use App\Models\employee;
use App\Models\gen;


class print_trackControllers extends Controller
{
    public function index()
    {
        $data1=tracks::select()->orderby('id_track')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.print_track',['data1'=>$data1,'data2'=>$data2]);
    }
}
