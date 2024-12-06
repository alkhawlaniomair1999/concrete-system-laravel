<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tracks;
use App\Models\Employee;

class Init_tracksController extends Controller
{
    public function index()
    {
            $data =tracks::select()->orderby('id_track')->paginate(10000);
            $data1 =Employee::select()->orderby('id_emp')->paginate(10000);
            if (auth()->user()->prod == 1) {
            return view('admin.init_tracks',['data'=>$data,'data1'=>$data1]);
            }else
            return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try{
            
            $data['model']=$request->model;
            $data['id_board']=$request->id_board;
            tracks::create($data);
            return redirect()->route('admin.init_tracks')->with((['success'=>'تم اضافة البيانات بنجاح']));
    }
    catch(\Exception $ex){
        return redirect()->route('admin.init_tracks')->with((['error'=>'عذرا حدث خطأ ما']));
    }
        
        
    
}
public function update($id){
    try{
    $data = tracks::where('id_track',$id)->first();
    $data1 = Employee::select()->orderby('id_emp')->paginate(10000);
    return view('admin.init_update_tracks',['data'=>$data,'data1'=>$data1]);
    }
    catch(\Exception $ex){
        return redirect()->route('admin.init_tracks')->with((['error'=>'عذرا حدث خطأ ما']));}
}
public function edit($id,Request $request)
{
    try{
    $data = tracks::where('id_track',$id)->first();
    $data2['model']=$request->model;
    $data2['id_board']=$request->id_board;
    tracks::where('id_track',$data->id_track)->update($data2);
    return redirect()->route('admin.init_tracks')->with((['success'=>'تم تعديل البيانات بنجاح']));
    }
    catch(\Exception $ex){
        return redirect()->route('admin.init_tracks')->with((['error'=>'عذرا حدث خطأ ما']));
    }
}
public function delete($id){
    try{
    tracks::where('id_track',$id)->delete();
    return redirect()->route('admin.init_tracks')->with((['success'=>'تم حذف البيانات بنجاح']));
}
catch(\Exception $ex){
    return redirect()->route('admin.init_tracks')->with((['error'=>'عذرا لا يمكن حذف السجل لارتباطه بسجلات اخرى']));}
}
}