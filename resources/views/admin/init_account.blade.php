@extends('layouts.admin')
@section('title')
    الحسابات
@endsection
@section('contentheader')
    الحسابات
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')


<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title" style="float: right">تهيئة الحسابات</h3>
    </div>
    <form action="{{route('admin.init_account.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم الحساب</label>
          <input type="text" class="form-control" name="name_account"  placeholder="اسم الحساب" required >
        </div>

        <div class="form-group">
            <label>نوع الحساب</label>
            <select class="form-control" name="type_account">
              <option> مورد</option>
              <option> عميل</option>
              <option> موظف</option>
              <option> صندوق</option>
              <option> بنك</option>
            </select>
        </div>

      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success swalDefaultSuccess">إضافة</button>
      </div>

    </form>
    <!-- /.card-body -->
  </div>



  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">الحسابـــــــات</h3>
      <a href="{{ route('print.acc_print') }}" style="margin-right: 20px" class="btn btn-primary" >طباعة</a>
    </div>
    <!-- /.card-header -->
     <div class="card-body">
      <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
       <table id="example" class="table table-striped table-bordered">
         <thead class="table-dark">
             <tr>
                 <th>رقم</th>
                 <th>اسم الحساب</th>
                 <th>نوع الحساب</th>
                 <th>مدين</th>
                 <th> دائن</th>
                 <th> الرصيد</th>
                 <th></th>
                 <th></th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
          @foreach ($data1 as $d)
            
          
             <tr>
                 <td>{{ $d->id_account }}</td>
                 <td>{{ $d->name_account }}</td>
                 <td>{{ $d->type_account }}</td>
                 <td>{{ $d->debtor }}</td>
                 <td>{{ $d->creditor }}</td>
                 <td>{{ $d->debtor-$d->creditor }}</td>
                <td>   <a href="{{ route('admin.init_account.update',$d->id_account) }}" class="btn btn-primary" >تعديل</a>        </td>
                <td>   <a href="{{ route('admin.init_account.delete',$d->id_account) }}" class="btn btn-success swalDefaultSuccess">حذف</a>     </td>
                <td>   <a href="{{ route('print.acc_det_print',$d->id_account) }}" class="btn btn-success swalDefaultSuccess">كشف الحساب</a>     </td>

              </tr>
             @endforeach
         </tbody>
       </table>
                </div></div></div></div>
     </div>
   <!-- /.card-body -->
    </div>
 
 




  
  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/custom.js')}}"></script>
  <script src="{{asset('assets/admin/js/datatables.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/vfs_fonts.js')}}"></script>












@endsection






















