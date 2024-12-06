<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stores;
use App\Models\Invoice_details;
use App\Models\branches;
use App\Models\item;
use App\Models\Inventory;




class StoreController extends Controller
{
    public function index(){
        $data=branches::select()->orderby('id_branch')->paginate(10000);
        $data1=Stores::select()->orderby('id_store')->paginate(10000);
        if (auth()->user()->init_system == 1) {
        return view('admin.store',['data'=>$data,'data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try {
            $data['name_store']=$request->name_store;
            $data['id_branch']=$request->id_branch;
            Stores::create($data);
            $data1 = Stores::select()->orderby('id_store','DESC')->first();
            $data2 = item::select()->orderby('id_item')->paginate(10000);
            if (isset($data2)) {
                foreach ($data2 as $d) {
                    $data3['id_store']=$data1->id_store;
                    $data3['id_item']=$d->id_item;
                    $data3['quantity']=0;
                    Inventory::create($data3);
                }    
            }
            return redirect()->route('admin.store')->with(['success'=>'تم اضافة البيانات بنجاح']);
                } catch (\Throwable $th) {
                    return redirect()->route('admin.store')->with(['error'=>'عفوا حدث خطأ ما']);
                }
        
    }
    public function update($id){
        $data=Stores::where('id_store',$id)->first();
        $data1=branches::select()->orderby('id_branch')->paginate(10000);
        if (auth()->user()->init_system == 1) {
        return view(' admin.store_update',['data'=>$data,'data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
}
public function edit($id,Request $request){
        try{
        $data =Stores::where('id_store',$id)->first();            
        $data2['name_store']=$request->name_store;
        $data2['id_branch']=$request->id_branch;

    Stores::where('id_store',$data->id_store)->update($data2);
    return redirect()->route('admin.store')->with((['success'=>'تم التعديل بنجاح']));}
    catch(\Exception $ex){
          return redirect()->route('admin.store')->with((['error'=>' عذرا حدث خطأ ما']));


    }
        
}
public function delete($id){
try{
Stores::where('id_store',$id)->delete();
return redirect()->route('admin.store')->with((['success'=>'تم الحذف بنجاح']));}
    catch(\Exception $ex){
          return redirect()->route('admin.store')->with((['error'=>' عذرا لا يمكن حذف المخزن لارتباطه بسجلات اخرى']));
    }           

}
}