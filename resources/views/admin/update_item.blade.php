@extends('layouts.admin')
@section('title')
    الاصناف
@endsection
@section('contentheader')
    الاصناف
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
      <h3 class="card-title" style="float: right">تعديل بيانات الصنف</h3>
    </div>
    <form action="{{route('admin.init_item.edit',$data1->id_item)}}" method="post">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">اسم الصنف</label>
        <input type="text" class="form-control" value="{{ $data1->name_item }}" name="name_item" placeholder="اسم الصنف" required >
      </div>
      
      <div class="col-5">
        <label for="exampleInputEmail1">وحدة القياس</label>
      <input type="text" class="form-control" value="{{ $data1->measuring_unit }}" name="measuring_unit" placeholder="" required >
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























