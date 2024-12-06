<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\branches;
use App\Models\gen;


class branchControllers extends Controller
{
    public function index()
    {
        $data1=branches::select()->orderby('id_branch')->paginate(10000);
        $data=gen::select()->orderby('id_gen')->first();
        return view('print.branch',['data1'=>$data1,'data'=>$data]);
    }
}
