@extends('layouts.admin')
@section('title')
  تهيئة عامه
@endsection
@section('contentheader')
    
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
      <h3 class="card-title" style="float: right">تهيئة عامه</h3>
    </div>
    <form action="{{route('admin.init_gen.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">الاسم </label>
          <input type="text" class="form-control" name="name_gen" placeholder="الاسم " required >
        </div>
        
       
        <div class="col-5">
          <label for="exampleInputEmail1">العنوان</label>
        <input type="text" class="form-control" name="address_gen" placeholder="العنوان" required >
      </div>
      <div class="col-5">
        <label for="exampleInputEmail1">الشعار</label>
        <div class="image">
        <input img src="{{ asset('assets/admin/imgs').'/' }}" type="file" name="logo_gen" id="logo_gen" class="form-control" name="logo_gen" placeholder="الشعار" required>
        </div>
    </div>
    <div class="col-5">
      <label for="exampleInputEmail1">البريد الالكتروني</label>
    <input type="text" class="form-control" name="email" placeholder="البريد الالكتروني" required >
  </div>
  <div class="col-5">
    <label for="exampleInputEmail1">بيانات الاتصال</label>
  <input type="text" class="form-control" name="coun_gen" placeholder="بيانات الاتصال" required >
</div>
     
      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">تأكيد</button>
      </div>

    </form>
    <!-- /.card-body -->
  </div>




  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection






















