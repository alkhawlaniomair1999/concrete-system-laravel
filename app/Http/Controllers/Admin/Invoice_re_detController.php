<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\item;
use App\Models\Invoice_details;
use App\Models\Suppliers;
use App\Models\Employee;
use App\Models\Stores;
use App\Models\Inventory;
use App\Models\Invoice_re;
use App\Models\invoice_re_det;

class Invoice_re_detController extends Controller
{
    public function index(Request $request)
    {
        $data1 = Invoice_re::select()->orderby('id_invoice_re','DESC')->first();
        $data2 = invoice_re_det::where('id_invoice_re',$data1->id_invoice_re)->select()->orderby('id_invoice_re')->paginate(10000);
        $data7 = Stores::select()->orderby('id_store')->paginate(10000);
        $data5 = item::select()->orderby('id_item')->paginate(10000);
        if (auth()->user()->supp == 1) {
        return view('admin.invoice_re_det',['data1'=>$data1,'data2'=>$data2,'data7'=>$data7,'data5'=>$data5]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert1($id,Request $request){
        
            $data['id_invoice_re']=$id;
            $data['id_item']=$request->id_item;
            $data['price']=$request->price;
            $data['quantity']=$request->quantity;
            $data['total']=$request->price*$request->quantity;
            invoice_re_det::create($data);  
            $data1 = Invoice_re::select()->orderby('id_invoice_re','DESC')->first();
            $data1->total_invoice+=$request->price*$request->quantity;
            $data2['total_invoice']=$data1->total_invoice;
            Invoice_re::where('id_invoice_re',$data1->id_invoice_re)->update($data2);          
            $data3 = Inventory::where('id_store',$request->id_store)->paginate(10000);
            foreach ($data3 as $d) {
                if ($d->id_item == $request->id_item ) {                    
                    $d2['quantity']=$d->quantity;
                    $d2['quantity']-=$request->quantity;
                    Inventory::where('id_store',$request->id_store)->where('id_item',$request->id_item)->update($d2);
                }
           }
         
            return redirect()->route('admin.invoice_re_det')->with(['success'=>'تمت اضافة الصنف بنجاح']);
                


        }
    }


