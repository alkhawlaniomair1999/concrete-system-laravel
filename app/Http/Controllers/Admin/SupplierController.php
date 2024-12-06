<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use App\Models\Accounts;


//use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $data1 = Suppliers::select()->orderby('id_supplier')->paginate(10000);
        $data = Accounts::select()->orderby('id_account')->paginate(10000);
        if (auth()->user()->supp == 1) {
        return view('admin.suppliers',['data1'=>$data1,'data'=>$data]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try {
            $data3 = Accounts::where('id_account',$request->id_account)->first();
            $data['name_supplier']=$data3->name_account;
            $data['phone_supplier']=$request->phone_supplier;
            $data['id_account']=$request->id_account;
            Suppliers::create($data);
            return redirect()->route('admin.suppliers')->with(['success'=>'تم اضافة البيانات بنجاح']);
                } 
        catch (\Exception $ex) {
            return redirect()->route('admin.suppliers')->with(['error'=>'عذرا حدث خطأ ما']);
        }
            
        
    
}
public function update($id){
    try {
        $data = Suppliers::where('id_supplier',$id)->first();
        $data1 = Accounts::select()->orderby('id_account')->paginate(10000);
        if (auth()->user()->supp == 1) {
        return view('admin.update_supplier',['data'=>$data,'data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.suppliers')->with(['error'=>'عذرا حدث خطأ ما']);

    }

}
public function edit($id,Request $request)
{
    try {
        $data = Suppliers::where('id_supplier',$id)->first();
        $data3 = Accounts::where('id_account',$request->id_account)->first();
        $data2['name_supplier']=$data3->name_account;
        $data2['phone_supplier']=$request->phone_supplier;
        $data2['id_account']=$request->id_account;
        Suppliers::where('id_supplier',$data->id_supplier)->update($data2);
        return redirect()->route('admin.suppliers')->with(['success'=>'تم تعديل البيانات بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.suppliers')->with(['error'=>'عفوا حدث خطأ ما']);

    }

}
public function delete($id){
    try {
        Suppliers::where('id_supplier',$id)->delete();
            return redirect()->route('admin.suppliers')->with(['success'=>'تم حذف السجل بنجاح']);
            } catch (\Throwable $th) {
                return redirect()->route('admin.suppliers')->with(['error'=>'عفوا لا يمكن حذف المورد لارتباطه بسجلات اخرى']);

            }
    
}
}
