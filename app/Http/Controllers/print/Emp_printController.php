<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\Dept;
use App\Models\employee;
use App\Models\gen;


class Emp_printController extends Controller
{
    public function index()
    {
       
        $data=employee::select()->orderby('id_emp')->paginate(10000);
        $data1=Dept::select()->orderby('id_dept')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        
            
       


return view('print.emp_print',['data'=>$data,'data1'=>$data1,'data2'=>$data2]);

    }}