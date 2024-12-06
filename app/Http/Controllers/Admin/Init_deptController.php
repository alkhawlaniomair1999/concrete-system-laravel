<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dept;
use App\Models\branches;



class Init_deptController extends Controller
{
    
    public function index()
    {
        $data =Dept::select()->orderby('id_dept')->paginate(10000);
        $data1 =branches::select()->orderby('id_branch')->paginate(10000);
        if (auth()->user()->init_system == 1) {
        return view('admin.init_dept',['data'=>$data,'data1'=>$data1]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try{
            $data['name_dept']=$request->name_dept;
            $data['manager']=$request->manager;
            $data['id_branch']=$request->id_branch;
            Dept::create($data);
            return redirect()->route('admin.init_dept')->with((['success'=>'تم اضافه البيانات بنجاح']));
        }
        catch(\Exception $ex){
            return redirect()->route('admin.init_dept')->with((['error'=>'عذرا حدث خطأ ما']));
        }
        
}
public function update($id){
    try{
    $data = Dept::where('id_dept',$id)->first();
    $data1 = branches::select()->orderby('id_branch')->paginate(10000);
    if (auth()->user()->init_system == 1) {
    return view('admin.init_update_dept',['data'=>$data,'data1'=>$data1]);
    }else
    return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
}

    catch(\Exception $ex){
        return redirect()->route('admin.init_dept')->with((['error'=>'عذرا حدث خطأ ما']));}

}
public function edit($id,Request $request)
{
    try{
    $data = Dept::where('id_dept',$id)->first();
    $data2['name_dept']=$request->name_dept;
    $data2['manager']=$request->manager;
    $data2['id_branch']=$request->id_branch;
    Dept::where('id_dept',$data->id_dept)->update($data2);
    return redirect()->route('admin.init_dept')->with((['success'=>'تم تعديل البيانات بنجاح']));
    }
    catch(\Exception $ex){
        return redirect()->route('admin.init_dept')->with((['error'=>'عذرا حدث خطأ ما']));
    }
}
public function delete($id){
    try{
    Dept::where('id_dept',$id)->delete();
    return redirect()->route('admin.init_dept')->with((['success'=>'تم حذف البيانات بنجاح']));
    }
    catch(\Exception $ex){
        return redirect()->route('admin.init_dept')->with((['error'=>'عذرا لا يمكن حذف السجل لارتباطه بسجل اخر']));
    }

}
}