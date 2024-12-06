<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\types_concrete;
use App\Models\item;
use App\Models\Component_concrete;

class Init_types_concreteController extends Controller
{
    public function index()
    {
        $data1=types_concrete::select()->orderby('id_types_concrete')->paginate(10000);
        if (auth()->user()->prod == 1) {
        return view('admin.init_types_concrete',['data1'=>$data1]);
        }
        else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);

    }
    public function insert(Request $request){
        try{
            $data['type_concrete']=$request->type_concrete;
            $data['price']=$request->price;
            types_concrete::create($data);
            $data2 = types_concrete::select()->orderby('id_types_concrete','DESC')->first();
            $data5 = item::select()->orderby('id_item')->paginate(10000);
            return view('admin.component_concrete',['data2'=>$data2,'data5'=>$data5])->with((['success'=>'تم الاضافة بنجاح']));}
            catch(\Exception $ex){
                  return redirect()->route('admin.init_types_concrete')->with((['error'=>' عذرا حدث خطأما']));
    }
}
    public function update($id){       
                $data=types_concrete::where('id_types_concrete',$id)->first();
                if (auth()->user()->prod == 1) {
                return view(' admin.init_update_types_concrete',['data'=>$data]);
                }else
                return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);

    }
    public function edit($id,Request $request){
                try{
                $data =types_concrete::where('id_types_concrete',$id)->first();            
                $data2['type_concrete']=$request->type_concrete;
                $data2['price']=$request->price;
        
            types_concrete::where('id_types_concrete',$data->id_types_concrete)->update($data2);
            return redirect()->route('admin.init_types_concrete')->with((['success'=>'تم التعديل بنجاح']));}
            catch(\Exception $ex){
                  return redirect()->route('admin.init_types_concrete')->with((['error'=>' عذرا حدث خطأما']));


            }
                
        }
        public function insert1($id,Request $request){
            try {
                $data['id_types_concrete'] = $id;
                $data['id_item'] = $request->id_item;
                $data['quantity'] = $request->quantity;
                Component_concrete::create($data);
                $data2 = types_concrete::select()->orderby('id_types_concrete','DESC')->first();
                $data5 = item::select()->orderby('id_item')->paginate(10000);
                $data3 = Component_concrete::where('id_types_concrete',$id)->paginate(10000);
                return view('admin.component_concrete',['data2'=>$data2,'data5'=>$data5,'data3'=>$data3])->with(['success'=>'تم اضافة المكون بنجاح']);
                        } catch (\Throwable $th) {
                            return redirect()->route('admin.init_types_concrete')->with((['error'=>' عذرا حدث خطأما']));
                        }
           
        }
    public function delete($id){
     try{
        types_concrete::where('id_types_concrete',$id)->delete();
        return redirect()->route('admin.init_types_concrete')->with((['success'=>'تم الحذف بنجاح']));}
            catch(\Exception $ex){
                  return redirect()->route('admin.init_types_concrete')->with((['error'=>' عذرا لا يمكن حذف السجل لارتباطه بسجلات اخرى']));
            }           

}
}