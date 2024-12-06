<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\item;
use App\Models\Inventory;
use App\Models\Stores;
use App\Models\gen;


class inventoryController extends Controller
{
public function index(){
    $data13 = Inventory::select()->orderby('id_inventory')->paginate(10000);
    $data14 = Stores::select()->orderby('id_store')->paginate(10000);
    $data15 = item::select()->orderby('id_item')->paginate(10000);
    if (auth()->user()->prod == 1 || auth()->user()->supp == 1) {
    return view('admin.inventory',['data'=>$data13,'data1'=>$data14,'data2'=>$data15]);
    }else
    return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);

}
public function print(){
    $data13 = Inventory::select()->orderby('id_inventory')->paginate(10000);
    $data14 = Stores::select()->orderby('id_store')->paginate(10000);
    $data15 = item::select()->orderby('id_item')->paginate(10000);
    $data2=gen::select()->orderby('id_gen')->first();
    return view('print.inventory_print',['data'=>$data13,'data1'=>$data14,'data2'=>$data15,'data3'=>$data2]);
}
}
