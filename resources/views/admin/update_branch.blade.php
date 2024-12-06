@extends('layouts.admin')
@section('title')
    الفروع
@endsection
@section('contentheader')
    الفروع
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
      <h3 class="card-title" style="float: right">تعديل بيانات الفرع</h3>
    </div>
    <form action="{{route('admin.init_branch.edit',$data1->id_branch)}}" method="post">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">اسم الفرع</label>
        <input type="text" class="form-control" value="{{ $data1->name_branch }}" name="name_branch" placeholder="اسم الفرع" required >
      </div>
      
      <div class="col-5">
        <label for="exampleInputEmail1"> المدير</label>
      <input type="text" class="form-control" value="{{ $data1->manager }}" name="manager" placeholder="" required >
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























