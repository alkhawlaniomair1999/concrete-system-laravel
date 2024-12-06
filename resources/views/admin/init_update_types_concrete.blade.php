@extends('layouts.admin')
@section('title')
    انواع الخرسانة
@endsection
@section('contentheader')
    انواع الخرسانة
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
      <h3 class="card-title" style="float: right">تعديل نوع الخرسانة</h3>
    </div>
    <form action="{{route('admin.init_types_concrete.edit',$data->id_types_concrete)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-3">
          <label for="exampleInputEmail1">نوع الخرسانة </label>
        <input type="text" class="form-control" value="{{$data->type_concrete}}" name="type_concrete" placeholder="نوع الخرسانة" required >          
      </div>
    
      <div class="col-5">
        <label for="exampleInputEmail1">السعر</label>
      <input type="number" class="form-control" value="{{$data->price}}" name="price" placeholder="السعر" required >
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






















