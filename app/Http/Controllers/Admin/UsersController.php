<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class UsersController extends Controller
{
    public function index(){
        $data1 = Admin::select()->orderby('id')->paginate(100);
        if (auth()->user()->users == 1) {
        return view('admin.users',['data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['username'] = $request->username;
        $data['password'] = bcrypt($request->password);
        if ($request->init_system == "on") {
            $data['init_system'] = true;   
        }
        else
        {
            $data['init_system'] = false;
        }
        if ($request->supp == 'on') {
            $data['supp'] = true;   
        }
        else
        {
            $data['supp'] = false;
        }
        if ($request->prod == 'on') {
            $data['prod'] = true;   
        }
        else
        {
            $data['prod'] = false;
        }
        if ($request->acc == 'on') {
            $data['acc'] = true;   
        }
        else
        {
            $data['acc'] = false;
        }
         if ($request->users == 'on') {
            $data['users'] = true;   
        }
        else
        {
            $data['users'] = false;
        }
        $data['com_code'] = 1;
        Admin::create($data);
        return redirect()->route('admin.users');
    }
    public function edit($id){
        try {
            $data = Admin::where('id',$id)->first();
            if (auth()->user()->users == 1) {
            return view('admin.users_update',['data'=>$data]);
            }else
            return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.users')->with(['error'=>'عذرا حدث خطأ ما']);
        }
    
    }
    public function update($id,Request $request)
    {
        try {
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['username']=$request->username;
            $data['password']=bcrypt($request->password);
            if ($request->init_system == "on") {
                $data['init_system'] = true;   
            }
            else
            {
                $data['init_system'] = false;
            }
            if ($request->supp == 'on') {
                $data['supp'] = true;   
            }
            else
            {
                $data['supp'] = false;
            }
            if ($request->prod == 'on') {
                $data['prod'] = true;   
            }
            else
            {
                $data['prod'] = false;
            }
            if ($request->acc == 'on') {
                $data['acc'] = true;   
            }
            else
            {
                $data['acc'] = false;
            }
             if ($request->users == 'on') {
                $data['users'] = true;   
            }
            else
            {
                $data['users'] = false;
            }
            Admin::where('id',$id)->update($data);
            return redirect()->route('admin.users')->with(['success'=>'تم تعديل البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.users')->with(['error'=>'عفوا حدث خطأ ما']);
    
        }
    
    }
    public function delete($id){
        try {
            Admin::where('id',$id)->delete();
                return redirect()->route('admin.users')->with(['success'=>'تم حذف السجل بنجاح']);
                } catch (\Throwable $th) {
                    return redirect()->route('admin.users')->with(['error'=>'عفوا حدث خطأ ما']);
    
                }
        
    }
}
