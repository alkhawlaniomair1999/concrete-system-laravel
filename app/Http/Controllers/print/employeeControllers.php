<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\employee;
use App\Models\Accounts;
use App\Models\Dept;
use App\Models\gen;


class employeeControllers extends Controller
{
    public function index()
    {
        $data1=employee::select()->orderby('id_emp')->paginate(10000);
        $data=Dept::select()->orderby('id_dept')->paginate(10000);
        $data2=Accounts::select()->orderby('id_account')->paginate(10000);
        $data3=gen::select()->orderby('id_gen')->first();
        return view('print.print_employee',['data1'=>$data1,'data'=>$data,'data2'=>$data2,'data3'=>$data3]);
    }
}
