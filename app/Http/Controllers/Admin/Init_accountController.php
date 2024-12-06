<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;


class Init_accountController extends Controller
{
    public function index()
    {
        $data1 =Accounts::select()->orderby('id_account')->paginate(1000);
        if (auth()->user()->acc == 1) {
        return view('admin.init_account',['data1'=>$data1]);
        }
        else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try {
            $data['name_account']=$request->name_account;
            $data['type_account']=$request->type_account;
            $data['debtor']=0;
            $data['creditor']=0;
            Accounts::create($data);
            return redirect()->route('admin.init_account')->with(['success'=>'تم اضافة البيانات بنجاح']);
                } catch (\Throwable $th) {
                   return redirect()->route('admin.init_account')->with(['error'=>'عفوا حدث خطأ ما']);
               }
        
    
}


public function update($id){
    try {
        $data1=Accounts::where('id_account',$id)->first();
        if (auth()->user()->acc == 1) {
        return view('admin.init_account_edit',['data1'=>$data1]);
        }
        else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.init_account')->with(['error'=>'عفرا حدث خطأ ما']);
        }



}

public function edit($id,Request $request){
    try {
        $data1 =Accounts::where('id_account',$id)->first();
        $data['name_account']=$request->name_account;
        $data['type_account']=$request->type_account;
       Accounts::where('id_account',$data1->id_account)->update($data);
    
    
        return redirect()->route('admin.init_account')->with(['success'=>'تم تعديل البيانات بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.init_account')->with(['error'=>'عفوا حدث خطأ ما']);
        }



}


public function delete($id){
    try {
        Accounts::where('id_account',$id)->delete();        
        return redirect()->route('admin.init_account')->with(['success'=>'تم حذف السجل بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.init_account')->with(['error'=>'لا يمكن حذف الحساب بسبب ارتباطه بصجل اخر']);
        }

}

}