@extends('layouts.admin')
@section('title')
    التهيئة العامه
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
      <h3 class="card-title" style="float: right">التهيئة العامه</h3>
    </div>
    <form action="{{route('admin.init_gen.edit')}}" method="post">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">الاسم </label>
        <input type="text" class="form-control" value="{{ $data1->name_gen }}" name="name_gen" placeholder="الاسم " required >
      </div>
      
      <div class="col-5">
        <label for="exampleInputEmail1"> العنوان</label>
      <input type="text" class="form-control" value="{{ $data1->address_gen }}" name="address_gen" placeholder="" required >
    </div>
    <div class="col-5" >
      <label for="exampleInputEmail1" > الشعار</label>
      <div class="image" id="oldimage">
      <img width="50" height="50" src="{{ ( asset('assets/admin/imgs').'/'.$data1->logo_gen )}}" alt="الشعار" >
      <button type="button" class="btn btn-sm btn-danger" id="update_image">تغيير الصورة </button>
      <button type="button" class="btn btn-sm btn-danger"  style="display: none" id="cancel_update_image">الغاء الصورة </button>
      </div>
      </div>
     
      <div class="col-5">
        <label for="exampleInputEmail1"> البريد الالكتروني</label>
      <input type="text" class="form-control" value="{{ $data1->email }}" name="email" placeholder="" required >
    </div>
    <div class="col-5">
      <label for="exampleInputEmail1"> بيانات الاتصال</label>
    <input type="text" class="form-control" value="{{ $data1->coun_gen }}" name="coun_gen" placeholder="" required >
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























