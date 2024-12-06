<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\item;
use App\Models\Inventory;
use App\Models\Stores;
use App\Models\Orders;
use App\Models\customer;
use App\Models\Parts;


class DashboardController extends Controller
{
    public function index()
    {
        $data = Orders::select()->orderby('id_order')->paginate(10000);
        $data1 = customer::select()->orderby('id_customer')->paginate(10000);
        $data2 = Inventory::select()->orderby('id_inventory')->paginate(10000);
        $data3 = Stores::select()->orderby('id_store')->paginate(10000);
        $data4 = item::select()->orderby('id_item')->paginate(10000);
        $data5 = Parts::select()->orderby('id_part')->paginate(10000);
        if (auth()->user()->com_code == 1) {
            return view('admin.dashboard',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'data5'=>$data5]);
        }
        else
        return redirect()->route('admin.user_order');
    }
}
