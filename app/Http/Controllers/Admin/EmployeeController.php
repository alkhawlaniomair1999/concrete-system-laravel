<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\Dept;
use App\Models\Accounts;
use Exception;

class employeeController extends Controller
{
    public function index()
    {
        $data1 = employee::select()->orderby('id_emp')->paginate(10000);
        $data3=Dept::select()->orderby('id_dept')->paginate(10000);
        $data6=Accounts::select()->orderby('id_account')->paginate(10000);
        if (auth()->user()->init_system == 1) {
        return view('admin.employee',['data1'=>$data1,'data6'=>$data6,'data3'=>$data3]);
        }
        else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);

    }
    public function insert(Request $request){
        try{
            $data['name_emp']=$request->name_emp;
            $data['address']=$request->address;
            $data['id_dept']=$request->id_dept;
            $data['phone_emp']=$request->phone_emp;
            $data['personal_id']=$request->personal_id;
            $data['id_account']=$request->id_account;
            $data['salary']=$request->salary;
            employee::create($data);
            return redirect()->route('admin.employee')->with((['success'=>'تم اضافة البيانات بنجاح']));
        }catch(\Exception $ex){
            return redirect()->route('admin
            .employee')->with((['error'=>'عذرا حدث خطأ ما']));
        }
    }
        
        public function update($id){
            try{
            $data1 = employee::where('id_emp',$id)->first();
            $data2 = Dept::select()->orderby('id_dept')->paginate(10000);
            $data3 = Accounts::select()->orderby('id_account')->paginate(10000);
            if (auth()->user()->init_system == 1) {
            return view('admin.update_employee',['data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
            }
            else
            return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
            }catch(Exception $ex){
                return redirect()->route('admin.employee')->with((['success'=>'هناك خطأ ما']));
            }
        }
        public function edit($id,Request $request){
            try{
            $data1 = employee::where('id_emp',$id)->first();
            $data['name_emp']=$request->name_emp;
            $data['address']=$request->address;
            $data['id_dept']=$request->id_dept;
            $data['phone_emp']=$request->phone_emp;
            $data['personal_id']=$request->personal_id;
            $data['id_account']=$request->id_account;
            $data['salary']=$request->salary;
            employee::where('id_emp',$data1->id_emp)->update($data);
            return redirect()->route('admin.employee')->with((['success'=>'تم تعديل البيانات بنجاح']));
            }catch(Exception $ex){
                return redirect()->route('admin.employee')->with((['error'=>'عذرا حدث خطأ ما']));
            }
    
        }
        public function delete($id){
            try{
            employee::where('id_emp',$id)->delete();
            return redirect()->route('admin.employee')->with((['success'=>'تم الحذف البيانات بنجاح']));
            }catch(Exception $ex){
                return redirect()->route('admin.employee')->with((['error'=>'لا يمكن حذف السجل بسبب ارتباطه بسجل اخر']));
            }
        }
}