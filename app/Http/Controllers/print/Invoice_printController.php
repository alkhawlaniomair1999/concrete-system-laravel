<?php

namespace App\Http\Controllers\print;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice_details;
use App\Models\item;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\employee;
use App\Models\Suppliers;
use App\Models\gen;


class Invoice_printController extends Controller
{
    public function index($id)
    {
        $data=Invoice::where('id_invoice',$id)->first();
        $data3=Suppliers::where('id_supplier',$data->id_supplier)->first();
        $data4=Invoice_details::where('id_invoice',$id)->paginate(10000);
        $data5=item::select()->orderby('id_item')->paginate(10000);
        $data2=gen::select()->orderby('id_gen')->first();
        
            
       


return view('print.invoice_print',['data'=>$data,'data3'=>$data3,'data4'=>$data4,'data5'=>$data5,'data2'=>$data2]);

    }}