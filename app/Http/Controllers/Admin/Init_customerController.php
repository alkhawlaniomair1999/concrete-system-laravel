<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Accounts;

class Init_customerController extends Controller
{
    public function index()
    {
        $data =customer::select()->orderby('id_customer')->paginate(10000);
        $data1 =Accounts::select()->orderby('id_account')->paginate(10000);
        if (auth()->user()->prod == 1) {
        return view('admin.init_customer',['data'=>$data,'data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);

    }
    public function insert(Request $request){
        try{
            $data2 = Accounts::where('id_account',$request->id_account)->first();
            $data['name_customer']=$data2->name_account;
            $data['address']=$request->address;
            $data['phone_customer']=$request->phone_customer;
            $data['id_account']=$request->id_account;
            customer::create($data);
            return redirect()->route('admin.init_customer')->with((['success'=>'تم اضافة البيانات بنجاح']));
        }
        catch(\Exception $ex){
            return redirect()->route('admin.init_customer')->with((['error'=>'عذرا حدث خطأ ما']));   
        }
        
    
}

public function update($id){
    try{
    $data = customer::where('id_customer',$id)->first();
    $data1 = Accounts::select()->orderby('id_account')->paginate(10000);
    if (auth()->user()->prod == 1) {
    return view('admin.init_update_customer',['data'=>$data,'data1'=>$data1]);
    }else
    return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    catch(\Exception $ex) {
        return redirect()->route('admin.init_customer')->with((['error'=>'عذرا حدث خطأ ما']));

    }

}
public function edit($id,Request $request)
{
    try{
    $data = customer::where('id_customer',$id)->first();
    $data3 = Accounts::where('id_account',$request->id_account)->first();
    $data2['name_customer']=$data3->name_account;
    $data2['address']=$request->address;
    $data2['phone_customer']=$request->phone_customer;
    $data2['id_account']=$request->id_account;
    customer::where('id_customer',$data->id_customer)->update($data2);
    return redirect()->route('admin.init_customer')->with((['success'=>'تم تعديل البيانات بنجاح']));
    }
    catch(\Exception $ex) {
        return redirect()->route('admin.init_customer')->with((['error'=>'عذرا حدث خطأ ما']));
}
}
public function delete($id){
    try{
    customer::where('id_customer',$id)->delete();
    return redirect()->route('admin.init_customer')->with((['success'=>'تم حذف البيانات بنجاح']));
}
catch(\Exception $ex) {
    return redirect()->route('admin.init_customer')->with((['error'=>'عذرا لا يمكن حذف السجل لارتباطه بسجل اخر']));
}
}
}