<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\gen;
use Exception;

class Init_genController extends Controller
{
    public function index()
    {    
        $data1=gen::select()->orderby('id_gen')->first();
        if (isset($data1) && !empty($data1)) {
            if (auth()->user()->init_system == 1) {
            return view('admin.update_gen',['data1'=>$data1]); 
            }else
            return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);           
        }
        else {
            if (auth()->user()->init_system == 1) {
            return view('admin.init_gen'); 
            }else
            return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);           
        }
        
    }
    public function insert(Request $request){
        
            $data['name_gen']=$request->name_gen;
            $data['address_gen']=$request->address_gen;
            $data['logo_gen']=$request->logo_gen;
            $data['email']=$request->email;
            $data['coun_gen']=$request->coun_gen;
            gen::create($data);
            return redirect()->route('admin.init_gen')->with((['success'=>'تم اضافة البيانات بنجاح']));
        
}
public function update($id){
    try{
    $data1 = gen::select()->orderby('id_gen')->first();
    if (auth()->user()->init_system == 1) {
    return view('admin.update_gen',['data1'=>$data1]);
    }else
    return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);           
 }
    catch(Exception $ex){
        return redirect()->route('admin.init_gen')->with((['error'=>'  هناك خطأ ما']));}
    }
   

public function edit(Request $request){
   try{
    $data1 = gen::select()->orderby('id_gen')->first();
    $data['name_gen']=$request->name_gen;
    $data['address_gen']=$request->address_gen;
    $data['logo_gen']=$request->logo_gen;
    $data['email']=$request->email;
    $data['coun_gen']=$request->coun_gen;
    gen::where('id_gen',$data1->id_gen)->update($data);
    return redirect()->route('admin.init_gen')->with((['success'=>'تم تعديل البيانات بنجاح']));}
    catch(Exception $ex){return redirect()->route('admin.init_gen')->with((['error'=>'عذرا حدث خطأ ما']));}

}

}