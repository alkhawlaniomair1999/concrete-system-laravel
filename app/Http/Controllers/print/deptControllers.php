<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Dept;
use App\Models\branches;
use App\Models\gen;


class deptControllers extends Controller
{
    public function index()
    {
        $data1=Dept::select()->orderby('id_dept')->paginate(10000);
        $data=branches::select()->orderby('id_branch')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        return view('print.dept',['data1'=>$data1,'data'=>$data,'data2'=>$data2]);
    }
}
