<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\types_concrete;
use App\Models\Orders;
use App\Models\Parts;
use App\Models\tracks;
use App\Models\Employee;
use App\Models\Stores;
use App\Models\Inventory;
use App\Models\Component_concrete;
use App\Models\Accounts;
use App\Models\acc_det;
use App\Models\orders_re;

class OrdersController extends Controller
{
    public function index(){
        $data = customer::select()->orderby('id_customer','DESC')->paginate(10000);
        $data2 = types_concrete::select()->orderby('id_types_concrete')->paginate(10000);
        $data3 = Orders::select()->orderby('id_order','DESC')->paginate(10000);
        $data4 = Stores::select()->orderby('id_store')->paginate(10000);
        $data5 = Parts::select()->orderby('id_part')->paginate(10000);
        if (auth()->user()->prod == 1) {
            return view('admin.orders',['data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'data5'=>$data5]);
        }
        else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
       
    }
    public function insert(Request $request){
        try {
            $data['id_customer']=$request->id_customer;
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
            $data8 = customer::where('id_customer',$request->id_customer)->first();
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
    
            return redirect()->route('admin.orders')->with(['success'=>'تم اضافة الطلب بنجاح']);
                } catch (\Throwable $th) {
                    return redirect()->route('admin.orders')->with(['error'=>'عفوا حدث خطأ في اضافة الطلب']);
                }
       
    }
    public function details($id){
        $data = Orders::where('id_order',$id)->first();
        $data1 = customer::where('id_customer',$data->id_customer)->first();
        $data2 = Parts::where('id_order',$id)->paginate(10000);
        $data3 = tracks::select()->orderby('id_track')->paginate(10000);
        $data4 = Employee::select()->orderby('id_emp')->paginate(10000);
        return view('admin.parts',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
    }
    public function edit($id){
      $data = Parts::where('id_part',$id)->first();
      $data1 = Employee::select()->orderby('id_emp')->paginate(10000);
      $data2 = tracks::select()->orderby('id_track')->paginate(10000);
      return view('admin.parts_update',['data'=>$data,'data2'=>$data2,'data1'=>$data1]);

    }
    public function update($id,Request $request){
        try {
            $data['id_track']=$request->id_track;
            $data['id_emp']=$request->id_emp;
            $data['commet_delivery']=$request->commet_delivery;
            $data['date_exit']=$request->date_delivery;
            Parts::where('id_part',$id)->update($data);
            $data2 = Parts::where('id_part',$id)->first();
            $data3 = Orders::where('id_order',$data2->id_order)->first();
            return redirect()->route('admin.orders.details',$data3->id_order)->with(['success'=>'تم تعديل الجزء بنجاح']);
                } catch (\Throwable $th) {
                    return redirect()->route('admin.orders.details',$data3->id_order)->with(['error'=>'عفوا حدث خطأ في تعديل الجزء']);
                }
    }
    public function order_re($id){
       try {
        $data['id_order']=$id;
        orders_re::create($data);
        $data3 = orders_re::select()->orderby('id_order_re','DESC')->first();
        $data1 = Orders::where('id_order',$data3->id_order)->first();
        $quant=$data1->quantity;
            $data5 = Inventory::where('id_store',$data1->id_store)->paginate(10000);
            $data6 = Component_concrete::where('id_types_concrete',$data1->id_types_concrete)->paginate(10000);
            foreach ($data5 as $d5) {
                foreach ($data6 as $d6) {
                    if($d5->id_item == $d6->id_item){   
                    $data7['quantity']= $d5->quantity+($quant*$d6->quantity);
                Inventory::where('id_store',$data1->id_store)->where('id_item',$d6->id_item)->update($data7);
                    }
                }
            }
            $data8 = customer::where('id_customer',$data1->id_customer)->first();
            $data9 = Accounts::where('id_account',$data8->id_account)->first();
            $data10['id_account'] = $data9->id_account;
            $data10['id_proc'] = $data3->id_order_re;
            $data10['proc_type'] = 'مردود مبيعات';
            $data10['debtor'] = 0;
            $data10['creditor'] = $data1->price;
            $data10['total'] = ($data9->debtor - $data9->creditor)-$data1->price;
            $data10['details'] = 'مردود فاتورة مبيعات رقم';
            acc_det::create($data10);
            $data11['creditor'] = $data9->creditor + $data1->price;
            Accounts::where('id_account',$data9->id_account)->update($data11);
            $data12['re'] = 1;
            Orders::where('id_order',$id)->update($data12);
            return redirect()->route('admin.orders')->with(['success'=>'تم عمل المردود بنجاح']);
       } catch (\Throwable $th) {
        return redirect()->route('admin.orders')->with(['error'=>'عذرا حدث خطأ في عمل مردود']);
       }
    }
}
