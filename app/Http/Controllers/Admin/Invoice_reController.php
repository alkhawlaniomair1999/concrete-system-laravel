<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Invoice_details;
use App\Models\Suppliers;
use App\Models\Employee;
use App\Models\Stores;
use App\Models\item;
use App\Models\acc_det;
use App\Models\Accounts;
use App\Models\Invoice_re;



class Invoice_reController extends Controller
{
    public function index()
    {
        $data = Suppliers::select()->orderby('id_supplier')->paginate(10000);
        $data2 = Invoice_re::select()->orderby('id_invoice_re','DESC')->paginate(10000);
        if (auth()->user()->supp == 1) {
        return view('admin.invoice_re',['data'=>$data,'data2'=>$data2]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
    public function insert(Request $request){
        
            $data['id_supplier']=$request->id_supplier;
            $data['total_invoice']=0;
            $data['trans']=0;
            $data['created_by']=auth()->user()->username;

            Invoice_re::create($data);
            $data1 = Invoice_re::select()->orderby('id_invoice_re','DESC')->first();
            $data7 = Stores::select()->orderby('id_store')->paginate(10000);
            $data5 = item::select()->orderby('id_item')->paginate(10000);
            return view('admin.invoice_re_det',['data1'=>$data1,'data7'=>$data7,'data5'=>$data5])->with(['success'=>'تم اضافة السجل بنجاح']);
        
    } 
    public function trans($id){
        $data = Invoice_re::where('id_invoice_re',$id)->first();
        $data2 = Suppliers::where('id_supplier',$data->id_supplier)->first();
        $data3 = Accounts::where('id_account',$data2->id_account)->first();
        $data4['id_account'] = $data3->id_account;
        $data4['id_proc'] = $id;
        $data4['proc_type'] = 'مردود مشتريات';
        $data4['debtor'] = $data->total_invoice;
        $data4['creditor'] = 0;
        $data4['total'] = ($data3->debtor - $data3->creditor)+$data->total_invoice;
        $data4['details'] = 'مردود مشتريات  رقم';
        acc_det::create($data4);
        $data5['debtor'] = $data3->debtor + $data->total_invoice;
        Accounts::where('id_account',$data2->id_account)->update($data5);
        $data6['trans'] = true;
        Invoice_re::where('id_invoice_re',$id)->update($data6);
        return redirect()->route('admin.invoice_re');
    }
    }


