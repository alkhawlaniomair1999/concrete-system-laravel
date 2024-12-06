<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\item;
use App\Models\Inventory;
use App\Models\Stores;

use Illuminate\Http\Request;


class Init_itemController extends Controller
{
    public function index()
    {
        $data1 = item::select()->orderby('id_item')->paginate(10000);
        if (auth()->user()->supp == 1) {
        return view('admin.init_items',['data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function update($id){
        try{
        $data1 = item::where('id_item',$id)->first();
        if (auth()->user()->supp == 1) {
        return view('admin.update_item',['data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']); 
    }
        catch(\Exception $ex){
            return redirect()->route('admin.init_item')->with((['error'=>'عذرا حدث خطأ ما']));
        }
       
    }
    public function edit($id,Request $request){
        try{
        $data1 = item::where('id_item',$id)->first();
        $data['name_item']=$request->name_item;
        $data['measuring_unit']=$request->measuring_unit;
        item::where('id_item',$data1->id_item)->update($data);
        return redirect()->route('admin.init_item')->with((['success'=>'تم التعديل البيانات بنجاح']));}
        catch(\Exception $ex){
            return redirect()->route('admin.init_item')->with((['error'=>'عذرا حدث خطأ ما']));
        }
    

    }
    public function delete($id){
        try{
        item::where('id_item',$id)->delete();
        return redirect()->route('admin.init_item')->with((['success'=>'تم حذف البيانات بنجاح']));}
        catch(\Exception $ex){
            return redirect()->route('admin.init_item')->with((['error'=>'عذرا لا يمكن حذف الصنف لارتباطه بسجلات اخرى']));
        }
    }
    public function insert(Request $request){
        try{
            $data['name_item']=$request->name_item;
            $data['measuring_unit']=$request->measuring_unit;
            item::create($data);
            $data1 = item::select()->orderby('id_item','DESC')->first();
            $data2 = Stores::select()->orderby('id_store')->paginate(10000);
            if (!empty($data2)) {
                foreach ($data2 as $d ){
                    $data3['id_store']=$d->id_store;
                    $data3['id_item']=$data1->id_item;
                    $data3['quantity']=0;
                    Inventory::create($data3);
                }
            }
            return redirect()->route('admin.init_item')->with((['success'=>'تم اضافة البيانات بنجاح']));}
            catch(\Exception $ex){
                return redirect()->route('admin.init_item')->with((['error'=>'عذرا حدث خطأ ما']));
            }
        
    
}
}