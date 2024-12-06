<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\edit_invent;
use App\Models\Stores;
use App\Models\item;
use App\Models\Inventory;


class edit_inventController extends Controller
{
    public function index(){
        $data = edit_invent::select()->orderby('id_edit_invent')->paginate(10000);
        $data1 = Stores::select()->orderby('id_store')->paginate(10000);
        $data2 = item::select()->orderby('id_item')->paginate(10000);
        if (auth()->user()->prod == 1) {
        return view('admin.edit_invent',['data'=>$data,'data1'=>$data1,'data2'=>$data2]);
        }
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        try {
            $data['id_store'] = $request->id_store;
            $data['id_item'] = $request->id_item;
            $data['quantity'] = $request->quantity;
            $data['created_by'] = auth()->user()->username;
            edit_invent::create($data);
            $data1 = edit_invent::select()->orderby('id_edit_invent','DESC')->first();
            $data2 = Inventory::where('id_store',$data1->id_store)->where('id_item',$data1->id_item)->first();
            $data3['quantity'] = $data2['quantity'];
            $data3['quantity'] -= $request->quantity;
            Inventory::where('id_store',$data1->id_store)->where('id_item',$data1->id_item)->update($data3);
            return redirect()->route('admin.edit_invent')->with(['success'=>'تم عمل التسوية بنجاح']);
        } catch (\Throwable $th) {
            //throw $th;
        }
      
    }
}
