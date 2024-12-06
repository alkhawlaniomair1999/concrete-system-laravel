<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice_re_det;
use App\Models\item;
use App\Models\Inventory;
use App\Models\Invoice_re;
use App\Models\employee;
use App\Models\Suppliers;
use App\Models\Accounts;
use App\Models\gen;


class Invoice_re_printController extends Controller
{
    public function index($id)
    {
        $data=Invoice_re::where('id_invoice_re',$id)->first();
        $data5=Invoice_re_det::where('id_invoice_re',$id)->paginate(10000);
        $data4=item::select()->orderby('id_item')->paginate(10000);
        $data6=Accounts::where('id_account',$id)->first();
        $data2=gen::select()->orderby('id_gen')->first();

return view('print.invoice_re_print',['data'=>$data,'data4'=>$data4,'data5'=>$data5,'data6'=>$data6,'data2'=>$data2]);

    }}