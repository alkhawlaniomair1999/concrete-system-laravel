<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\gen;
use App\Models\Admin;
use App\Models\Accounts;
use App\Models\customer;
use App\Models\types_concrete;

class loginController extends Controller
{
    public function show_login_view()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password'),'com_code'=>1])) {
            
          return redirect()->route('admin.dashboard');  
        }
        else if (auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password'),'com_code'=>2])) {
            return redirect()->route('admin.user_order');  
          }
        else
        return redirect()->route('admin.showlogin')->with(['error'=>'خطأ في اسم المستخدم او كلمة المرور']);
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.user_page');
    }
    public function user_page(){
        $data = gen::select()->orderby('id_gen')->first();
        return view('admin.user_page',['data'=>$data]);
    }
    public function register(){
        return view('admin.auth.register');
    }
    public function enduser(Request $request){
        $d1 = 0 ;$d2 =0 ;$d3 = 0 ;
        try {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['username'] = $request->username;
            $data['password'] = bcrypt($request->password);
            $data['init_system'] = false;
            $data['supp'] = false;
            $data['prod'] = false;
            $data['acc'] = false;
            $data['users'] = false;
            $data['com_code'] = 2;
            $d1=Admin::create($data);
            $data1['name_account']=$request->name;
            $data1['type_account']='عميل';
            $data1['debtor']=0;
            $data1['creditor']=0;
            $d2=Accounts::create($data1);
            $data2 = Accounts::select()->orderby('id_account','DESC')->first();
            $data3['name_customer']=$request->name;
            $data3['address']=$request->address;
            $data3['phone_customer']=$request->phone;
            $data3['id_account']=$data2->id_account;
            $d3=customer::create($data3);
            return view('admin.auth.login');
        } catch (\Throwable $th) {
            if ($d1 == true && $d2 == true && $d3 == true) {
                return view('admin.auth.login');
            }
            else{
                if ($d3 == true) {
                    $data4 = customer::select()->orderby('id_customer','DESC')->first();
                    customer::where('id_customer',$data4->id_customer)->delete();
                }
                if ($d2 == true) {
                    $data5 = Accounts::select()->orderby('id_account','DESC')->first();
                    Accounts::where('id_account',$data5->id_account)->delete();
                }
                if ($d1 == true) {
                    $data6 = Admin::select()->orderby('id','DESC')->first();
                    Admin::where('id',$data6->id)->delete();
                }
                return redirect()->route('admin.auth.register')->with(['error'=>'الاسم او اسم المستخدم موجود بالفعل!']);
            }           
        }
    }
/*
    function make_new_admin()
    {
        $admin=new App\Models\Admin();
        $admin->name = 'omair';
        $admin->email = 'omair@gmail.com';
        $admin->username = 'omair';
        $admin->password = bcrypt('omair');
        $admin->init_system = true;
        $admin->supp = true;
        $admin->prod = true;
        $admin->acc = true;
        $admin->users = true;
        $admin->com_code=1;
        $admin->save();
    }
    */
}

