<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rec;
use App\Models\rec_det;
use App\Models\acc_det;
use App\Models\Accounts;

class recController extends Controller
{
    public function index(){
        $data = rec::select()->orderby('id_rec','DESC')->paginate(10000);
        $data2 = rec_det::select()->orderby('id_rec_det')->paginate(10000);
        $data3 = Accounts::select()->orderby('id_account')->paginate(10000);
        if (auth()->user()->acc == 1) {
        return view('admin.rec',['data'=>$data,'data2'=>$data2,'data3'=>$data3]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']);
    }
public function insert(Request $r){
    try {
        $data['type_rec']=$r->type_rec;
        $data['total']=$r->total;
        $data['details']=$r->details;
        $data['created_by']=auth()->user()->username;
        rec::create($data);
        $data2=rec::select()->orderby('id_rec','DESC')->first();
        $data3=Accounts::select()->orderby('id_account')->paginate(10000);
        if (auth()->user()->acc == 1) {
        return view('admin.rec_det',['data2'=>$data2,'data3'=>$data3]);
        }else
        return redirect()->route('admin.dashboard')->with(['error'=>'ليس لديك صلاحية الوصول لهذه الصفحة']); 
    } catch (\Throwable $th) {
        return redirect()->route('admin.rec')->with(['error'=>'عذرا حدث خطأ ما']);
    }

}
public function insert1($id,Request $request){
    $data2 = rec::where('id_rec',$id)->first();
    $data['id_rec'] = $id;
    $data['id_account'] = $request->id_account;
    rec_det::create($data);
    $data3 = Accounts::where('id_account',$request->id_account)->first();
    $data4['debtor'] = $data3->debtor;
    $data4['debtor'] += $data2->total;
    Accounts::where('id_account',$request->id_account)->update($data4);
    $data7['id_account'] = $request->id_account;
    $data7['id_proc'] = $id;
    $data7['proc_type'] = $data2->type_rec;
    $data7['debtor'] = $data2->total;
    $data7['creditor'] = 0;
    $data7['total'] = $data4['debtor']-$data3->creditor;
    $data7['details'] = $data2->details;
    acc_det::create($data7);
    
    $data1['id_rec'] = $id;
    $data1['id_account'] = $request->id_account1;
    rec_det::create($data1);
    $data5 = Accounts::where('id_account',$request->id_account1)->first();
    $data6['creditor'] = $data5->creditor;
    $data6['creditor'] += $data2->total;
    Accounts::where('id_account',$request->id_account1)->update($data6);
    $data8['id_account'] = $request->id_account1;
    $data8['id_proc'] = $id;
    $data8['proc_type'] = $data2->type_rec;
    $data8['debtor'] = 0;
    $data8['creditor'] =  $data2->total;
    $data8['total'] =$data5->debtor- $data6['creditor'];
    $data8['details'] = $data2->details;
    acc_det::create($data8);
    return redirect()->route('admin.rec');
}

}
