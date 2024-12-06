<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\branches;
use Exception;

class Init_branchController extends Controller
{
    public function index()
    {
        $data1=branches::select()->orderby('id_branch')->paginate(10000);
        if (auth()->user()->init_system == 1) {
        return view('admin.init_branch',['data1'=>$data1]);
        }
        else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try{
            $data['name_branch']=$request->name_branch;
            $data['manager']=$request->manager;
            
            branches::create($data);
            return redirect()->route('admin.init_branch')->with((['success'=>'تم اضافة البيانات بنجاح']));}
            catch(Exception $ex){
                return redirect()->route('admin.init_branch')->with((['error'=>'عذرا حدث خطأ ما']));}
}
public function update($id){
    try{
    $data1 = branches::where('id_branch',$id)->first();
    if (auth()->user()->init_system == 1) {
    return view('admin.update_branch',['data1'=>$data1]);
    }else
    return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
 }
    catch(Exception $ex){
        return redirect()->route('admin.init_branch')->with((['error'=>'  هناك خطأ ما']));}
    }
   

public function edit($id,Request $request){
    try{
    $data1 = branches::where('id_branch',$id)->first();
    $data['name_branch']=$request->name_branch;
    $data['manager']=$request->manager;
    branches::where('id_branch',$data1->id_branch)->update($data);
    return redirect()->route('admin.init_branch')->with((['success'=>'تم تعديل البيانات بنجاح']));}
    catch(Exception $ex){return redirect()->route('admin.update_branch')->with((['error'=>'عذرا حدث خطأ ما']));}

}
public function delete($id){
    try{
    branches::where('id_branch',$id)->delete();
    return redirect()->route('admin.init_branch')->with((['success'=>'تم الحذف البيانات بنجاح']));}
    catch(Exception $ex){return redirect()->route('admin.init_branch')->with((['error'=>'لا يمكن حذف السجل لارتباطه بسجل اخر']));}
}
}