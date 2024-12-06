<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Init_accountController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\Init_branchController;
use App\Http\Controllers\Admin\Init_itemController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\Invoice_detailsController;
use App\Http\Controllers\Admin\Init_types_concreteController;
use App\Http\Controllers\Admin\employeeController;
use App\Http\Controllers\Admin\Init_deptController;
use App\Http\Controllers\Admin\Init_customerController;
use App\Http\Controllers\Admin\Init_tracksController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\print\Emp_printController;
use App\Http\Controllers\print\Acc_printController;
use App\Http\Controllers\print\Invoice_printController;
use App\Http\Controllers\print\branchControllers;
use App\Http\Controllers\print\itemControllers;
use App\Http\Controllers\print\supplierControllers;
use App\Http\Controllers\print\deptControllers;
use App\Http\Controllers\print\employeeControllers;
use App\Http\Controllers\print\print_custController;
use App\Http\Controllers\print\print_trackControllers;
use App\Http\Controllers\print\print_conccereteControllers;
use App\Http\Controllers\print\print_storeControllers;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\recController;
use App\Http\Controllers\print\Acc_det_printController;
use App\Http\Controllers\Admin\Invoice_reController;
use App\Http\Controllers\Admin\Invoice_re_detController;
use App\Http\Controllers\Admin\Init_genController;
use App\Http\Controllers\print\Invoice_re_printController;
use App\Http\Controllers\Admin\inventoryController;
use App\Http\Controllers\Admin\edit_inventController;
use App\Http\Controllers\print\Rec_printController;
use App\Http\Controllers\print\Agree_printController;
use App\Http\Controllers\Admin\temp_orderController;
use App\Http\Controllers\print\Part_printController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



 

    

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('logout',[loginController::class,'logout'])->name('admin.logout');
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    //general_initialize
    Route::get('init_gen',[Init_genController::class,'index'])->name('admin.init_gen');
    Route::post('init_gen/insert',[Init_genController::class,'insert'])->name('admin.init_gen.insert');
    Route::post('init_gen/edit',[Init_genController::class,'edit'])->name('admin.init_gen.edit');
    //accounts
    Route::get('init_account',[Init_accountController::class,'index'])->name('admin.init_account');
    Route::post('init_account/insert',[Init_accountController::class,'insert'])->name('admin.init_account.insert');
   Route::post('init_account/edit{id}',[Init_accountController::class,'edit'])->name('admin.init_account.edit');
   Route::get('init_account/delete{id}',[Init_accountController::class,'delete'])->name('admin.init_account.delete');
   Route::get('init_account/update{id}',[Init_accountController::class,'update'])->name('admin.init_account.update');
   //suppliers
    Route::get('suppliers',[SupplierController::class,'index'])->name('admin.suppliers');
    Route::post('suppliers/insert',[SupplierController::class,'insert'])->name('admin.suppliers.insert');
    Route::get('suppliers/update{id}',[SupplierController::class,'update'])->name('admin.suppliers.update');
    Route::post('suppliers/edit{id}',[SupplierController::class,'edit'])->name('admin.suppliers.edit');
    Route::get('suppliers/delete{id}',[SupplierController::class,'delete'])->name('admin.suppliers.delete');
    //invoice
    Route::get('invoice',[InvoiceController::class,'index'])->name('admin.invoice');
    Route::post('invoice/insert',[InvoiceController::class,'insert'])->name('admin.invoice.insert');
    Route::get('invoice_details',[Invoice_detailsController::class,'index'])->name('admin.invoice_details');
    Route::post('invoice_details/insert1{id}',[Invoice_detailsController::class,'insert1'])->name('admin.invoice_details.insert1');
    Route::get('invoice/trans{id}',[InvoiceController::class,'trans'])->name('admin.invoice.trans');
    //types concrete    
    Route::get('init_types_concrete',[Init_types_concreteController::class,'index'])->name('admin.init_types_concrete');
    Route::post('init_types_concrete/insert',[Init_types_concreteController::class,'insert'])->name('admin.init_types_concrete.insert'); 
    Route::get('init_types_concrete/update{id}',[Init_types_concreteController::class,'update'])->name('admin.init_types_concrete.update');
    Route::post('init_types_concrete/edit{id}',[Init_types_concreteController::class,'edit'])->name('admin.init_types_concrete.edit');
    Route::get('init_types_concrete/delete{id}',[Init_types_concreteController::class,'delete'])->name('admin.init_types_concrete.delete');
    Route::post('init_types_concrete/insert1{id}',[Init_types_concreteController::class,'insert1'])->name('admin.init_types_concrete.insert1'); 
    //branch
    Route::get('init_branch',[Init_branchController::class,'index'])->name('admin.init_branch');
    Route::post('init_branch/insert',[Init_branchController::class,'insert'])->name('admin.init_branch.insert');
    Route::get('init_branch/update{id}',[Init_branchController::class,'update'])->name('admin.init_branch.update');
    Route::post('init_branch/edit{id}',[Init_branchController::class,'edit'])->name('admin.init_branch.edit');
    Route::get('init_branch/delete{id}',[Init_branchController::class,'delete'])->name('admin.init_branch.delete');
    //item
    Route::get('init_item',[Init_itemController::class,'index'])->name('admin.init_item');
    Route::get('init_item/update{id}',[Init_itemController::class,'update'])->name('admin.init_item.update');
    Route::post('init_item/edit{id}',[Init_itemController::class,'edit'])->name('admin.init_item.edit');
    Route::post('init_item/insert',[Init_itemController::class,'insert'])->name('admin.init_item.insert');
    Route::get('init_item/delete{id}',[Init_itemController::class,'delete'])->name('admin.init_item.delete');
    //employee
    Route::get('employee',[EmployeeController::class,'index'])->name('admin.employee');
    Route::post('employee/insert',[EmployeeController::class,'insert'])->name('admin.employee.insert');
    Route::get('employee/update{id}',[EmployeeController::class,'update'])->name('admin.employee.update');
    Route::post('employee/edit{id}',[EmployeeController::class,'edit'])->name('admin.employee.edit');
    Route::get('employee/delete{id}',[EmployeeController::class,'delete'])->name('admin.employee.delete');
    //dept
    Route::get('init_dept',[Init_deptController::class,'index'])->name('admin.init_dept');
    Route::get('init_dept/update{id}',[Init_deptController::class,'update'])->name('admin.init_dept.update');
    Route::post('init_dept/edit{id}',[Init_deptController::class,'edit'])->name('admin.init_dept.edit');
    Route::post('init_dept/insert',[Init_deptController::class,'insert'])->name('admin.init_dept.insert');
    Route::get('init_dept/delete{id}',[Init_deptController::class,'delete'])->name('admin.init_dept.delete');
    //customer  
    Route::get('init_customer',[Init_customerController::class,'index'])->name('admin.init_customer');
    Route::get('init_customer/update{id}',[Init_customerController::class,'update'])->name('admin.init_customer.update');
    Route::post('init_customer/edit{id}',[Init_customerController::class,'edit'])->name('admin.init_customer.edit');
    Route::post('init_customer/insert',[Init_customerController::class,'insert'])->name('admin.init_customer.insert');
    Route::get('init_customer/delete{id}',[Init_customerController::class,'delete'])->name('admin.init_customer.delete');
    //tracks  
    Route::get('init_tracks',[Init_tracksController::class,'index'])->name('admin.init_tracks');
    Route::get('init_tracks/update{id}',[Init_tracksController::class,'update'])->name('admin.init_tracks.update');
    Route::post('init_tracks/edit{id}',[Init_tracksController::class,'edit'])->name('admin.init_tracks.edit');
    Route::post('init_tracks/insert',[Init_tracksController::class,'insert'])->name('admin.init_tracks.insert');
    Route::get('init_tracks/delete{id}',[Init_tracksController::class,'delete'])->name('admin.init_tracks.delete');
    //store
    Route::get('store',[StoreController::class,'index'])->name('admin.store');
    Route::get('store/update{id}',[StoreController::class,'update'])->name('admin.store.update');
    Route::post('store/edit{id}',[StoreController::class,'edit'])->name('admin.store.edit');
    Route::post('store/insert',[StoreController::class,'insert'])->name('admin.store.insert');
    Route::get('store/delete{id}',[StoreController::class,'delete'])->name('admin.store.delete');
    //orders
    Route::get('orders',[OrdersController::class,'index'])->name('admin.orders');
    Route::post('orders.insert',[OrdersController::class,'insert'])->name('admin.orders.insert');
    Route::get('orders.details{id}',[OrdersController::class,'details'])->name('admin.orders.details');
    Route::get('orders.edit{id}',[OrdersController::class,'edit'])->name('admin.orders.edit');
    Route::post('orders.update{id}',[OrdersController::class,'update'])->name('admin.orders.update');
    Route::get('orders.order_re{id}',[OrdersController::class,'order_re'])->name('admin.orders.order_re');
    //users
    Route::get('users',[UsersController::class,'index'])->name('admin.users');
    Route::post('users.insert',[UsersController::class,'insert'])->name('admin.users.insert');
    Route::get('users.edit{id}',[UsersController::class,'edit'])->name('admin.users.edit');
    Route::post('users.update{id}',[UsersController::class,'update'])->name('admin.users.update');
    Route::get('users.delete{id}',[UsersController::class,'delete'])->name('admin.users.delete');
    //print
    Route::get('invoice_print{id}',[Invoice_printController::class,'index'])->name('print.invoice_print');
    Route::get('acc_print',[Acc_printController::class,'index'])->name('print.acc_print');
    Route::get('emp_print',[Emp_printController::class,'index'])->name('print.emp_print');
    Route::get('branch',[branchControllers::class,'index'])->name('print.branch');
    Route::get('item',[itemControllers::class,'index'])->name('print.item');
    Route::get('supplier',[supplierControllers::class,'index'])->name('print.supplier');
    Route::get('dept',[deptControllers::class,'index'])->name('print.dept');
    Route::get('print_employee',[employeeControllers::class,'index'])->name('print.print_employee');
    Route::get('print_customer',[print_custController::class,'index'])->name('print.print_customer');
    Route::get('print_track',[print_trackControllers::class,'index'])->name('print.print_track');
    Route::get('concceret',[print_conccereteControllers::class,'index'])->name('print.concceret');
    Route::get('print_store',[print_storeControllers::class,'index'])->name('print.print_store');
    Route::get('acc_det_print{id}',[Acc_det_printController::class,'index'])->name('print.acc_det_print');
    Route::get('invoice_re_print{id}',[Invoice_re_printController::class,'index'])->name('print.invoice_re_print');
    Route::get('inventory_print',[inventoryController::class,'print'])->name('print.inventory_print');
    Route::get('rec_print{id}',[Rec_printController::class,'index'])->name('print.rec_print');
    Route::get('agree_print{id}',[Agree_printController::class,'index'])->name('print.agree_print');
    Route::get('part_print{id}',[Part_printController::class,'index'])->name('print.part_print');


//recipet
Route::get('rec',[recController::class,'index'])->name('admin.rec');
Route::post('rec/insert',[recController::class,'insert'])->name('admin.rec.insert');
Route::post('rec/insert1{id}',[recController::class,'insert1'])->name('admin.rec.insert1');
//invoice_return
Route::get('invoice_re',[Invoice_reController::class,'index'])->name('admin.invoice_re');
Route::post('invoice_re/insert',[Invoice_reController::class,'insert'])->name('admin.invoice_re.insert');
Route::get('invoice_re_det',[Invoice_re_detController::class,'index'])->name('admin.invoice_re_det');
Route::post('invoice_re_det/insert1{id}',[Invoice_re_detController::class,'insert1'])->name('admin.invoice_re_det.insert1');
Route::get('invoice_re/trans{id}',[Invoice_reController::class,'trans'])->name('admin.invoice_re.trans');
//inventory
Route::get('inventory',[inventoryController::class,'index'])->name('admin.inventory');
//edit_invent
Route::get('edit_invent',[edit_inventController::class,'index'])->name('admin.edit_invent');
Route::post('edit_invent/insert',[edit_inventController::class,'insert'])->name('admin.edit_invent.insert');
//enduser
Route::get('user_order',[temp_orderController::class,'index'])->name('admin.user_order');
Route::post('user_order/insert',[temp_orderController::class,'insert'])->name('admin.user_order.insert');
Route::get('temp_order',[temp_orderController::class,'show'])->name('admin.temp_order');
Route::get('conf_order{id}',[temp_orderController::class,'conf_order'])->name('admin.conf_order');
Route::get('del_order{id}',[temp_orderController::class,'del_order'])->name('admin.del_order');
Route::post('conf_order/insert1{id}',[temp_orderController::class,'insert1'])->name('admin.conf_order.insert1');
Route::get('temp_order/mytemp_order',[temp_orderController::class,'showtemp'])->name('admin.mytemp_order');
Route::get('my_det_order{id}',[temp_orderController::class,'det'])->name('admin.my_det_order');
Route::get('commet{id}',[temp_orderController::class,'commet'])->name('admin.commet');
Route::get('contact',[temp_orderController::class,'contact'])->name('admin.contact');



    });
    

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function(){
    Route::get('user_page',[loginController::class,'user_page'])->name('admin.user_page');
    Route::get('login',[loginController::class,'show_login_view'])->name('admin.showlogin');
    Route::post('login',[loginController::class,'login'])->name('admin.login');
    Route::get('register',[loginController::class,'register'])->name('admin.auth.register');
    Route::post('enduser',[loginController::class,'enduser'])->name('admin.enduser');


});
