@extends('layouts.admin')
@section('title')
    الشاحنات
@endsection
@section('contentheader')
    الشاحنات
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
      <h3 class="card-title" style="float: right">تعديل بيانات شاحنة</h3>
    </div>
    <form action="{{route('admin.init_tracks.edit',$data->id_track)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">سنة الصنع</label>
        <input type="number" class="form-control" value="{{ $data->model }}" name="model" placeholder="سنة الصنع" required >
      </div>
     
    <div class="col-5">
      <label for="exampleInputEmail1">رقم اللوحه</label>
    <input type="text" class="form-control" value="{{ $data->id_board }}" name="id_board" placeholder="رقم اللوحه" required >
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






















