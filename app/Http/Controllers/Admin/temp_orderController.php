<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\temp_order;
use App\Models\types_concrete;
use App\Models\Stores;
use App\Models\customer;
use App\Models\Orders;
use App\Models\Parts;
use App\Models\tracks;
use App\Models\Employee;
use App\Models\Component_concrete;
use App\Models\acc_det;
use App\Models\orders_re;
use App\Models\Inventory;



class temp_orderController extends Controller
{
    public function index(){
        $data = types_concrete::select()->orderby('id_types_concrete')->paginate(10000);
        $data2 = Accounts::where('name_account',auth()->user()->name)->first();
        return view('admin.user_order',['data'=>$data,'data2'=>$data2]); 
    }
    public function insert(Request $request){
        $data['id_types_concrete'] = $request->id_types_concrete;
        $data['quantity'] = $request->quantity;
        $data['address'] = $request->address;
        $data2 = Accounts::where('name_account',auth()->user()->name)->first();
        $data['id_account'] = $data2->id_account;
        temp_order::create($data);
        return redirect()->route('admin.user_order')->with(['success'=>'تم اضافة الطلب بنجاح']);
    }
    public function show(){
        $data = temp_order::select()->orderby('id_temp_order')->paginate(10000);
        $data2 = Accounts::select()->orderby('id_account')->paginate(10000);
       $data3 = types_concrete::select()->orderby('id_types_concrete')->paginate(10000); 
        return view('admin.temp_orders',['data'=>$data,'data2'=>$data2,'data3'=>$data3]);
    }
    public function conf_order($id){
        $data = temp_order::where('id_temp_order',$id)->first();
        $data2 = Accounts::where('id_account',$data->id_account)->first();
        $data3 = types_concrete::select()->orderby('id_types_concrete')->paginate(10000);
        $data4 = Stores::select()->orderby('id_store')->paginate(10000);
        return view('admin.conf_order',['data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
    }
    public function insert1(Request $request ,$id){
        $data13=temp_order::where('id_temp_order',$id)->first();
        $data14=customer::where('id_account',$data13->id_account)->first();
        $data['id_customer']=$data14->id_customer;
        $data['quantity']=$request->quantity;
        $data2 = types_concrete::where('id_types_concrete',$request->id_types_concrete)->first();
        $data['price']=$data2->price*$request->quantity;
        $data['id_types_concrete']=$request->id_types_concrete;
        $data['address']=$request->address;
        $data['date_delivery']=$request->date_delivery;
        $data['id_store']=$request->id_store;
        $data['re'] = 0;
        Orders::create($data);
        $data3 = Orders::select()->orderby('id_order','DESC')->first();
        $count = $request->quantity;
        for ($i=$count; $i >=8 ; $i-=8) { 
            $data4['id_order']=$data3->id_order;
            $data4['quantity_part']=8;
            $data4['commet_delivery']=false;
            Parts::create($data4);
            $count-=8;
        }
        if($count > 0){
            $data4['id_order']=$data3->id_order;
            $data4['quantity_part']=$count;
            $data4['commet_delivery']=false;
            Parts::create($data4);
        }
        $quant=$request->quantity;
        $data5 = Inventory::where('id_store',$request->id_store)->paginate(10000);
        $data6 = Component_concrete::where('id_types_concrete',$data2->id_types_concrete)->paginate(10000);
        foreach ($data5 as $d5) {
            foreach ($data6 as $d6) {
                if($d5->id_item == $d6->id_item){   
                $data7['quantity']= $d5->quantity-($quant*$d6->quantity);
            Inventory::where('id_store',$request->id_store)->where('id_item',$d6->id_item)->update($data7);
                }
            }
        }
        $data8 = customer::where('id_customer',$data14->id_customer)->first();
        $data9 = Accounts::where('id_account',$data8->id_account)->first();
        $data10['id_account'] = $data9->id_account;
        $data10['id_proc'] = $data3->id_order;
        $data10['proc_type'] = 'مبيعات';
        $data10['debtor'] = $data3->price;
        $data10['creditor'] = 0;
        $data10['total'] = ($data9->debtor - $data9->creditor)+$data3->price;
        $data10['details'] = 'فاتورة مبيعات رقم';
        acc_det::create($data10);
        $data11['debtor'] = $data9->debtor + $data3->price;
        Accounts::where('id_account',$data9->id_account)->update($data11);
        temp_order::where('id_temp_order',$id)->delete();
        return redirect()->route('admin.orders')->with(['success'=>'تم تأكيد الطلب بنجاح']);
    }
    public function showtemp(){
        $data = Accounts::where('name_account',auth()->user()->name)->first();
        $data1 = temp_order::where('id_account',$data->id_account)->paginate(10000);
        $data2 = customer::where('id_account',$data->id_account)->first();
        $data3 = Orders::where('id_customer',$data2->id_customer)->paginate(10000);
        $data4 = types_concrete::select()->orderby('id_types_concrete')->paginate(10000);
        return view('admin.my_orders',['data'=>$data,'data1'=>$data1,'data3'=>$data3,'data4'=>$data4]);
    }
    public function det($id){
        $data = Parts::where('id_order',$id)->orderby('id_part')->paginate(10000);
        return view('admin.my_det_order',['data'=>$data,'id'=>$id]);
    }
    public function commet($id){
        $data['commet_delivery'] = 1;
        Parts::where('id_part',$id)->update($data);
        $data3 = Parts::where('id_part',$id)->first();

        return redirect()->route('admin.my_det_order',$data3->id_order);
    }
    public function contact(){
        return view('admin.contact');
    }
    public function del_order($id){
        try {
            temp_order::where('id_temp_order',$id)->delete();
        return redirect()->route('admin.temp_order')->with(['success'=>'تم حذف الطلب بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->route('admin.temp_order')->with(['erorr'=>'عفوا حدث خطأ ما']);
        }
        
        
    }
}
