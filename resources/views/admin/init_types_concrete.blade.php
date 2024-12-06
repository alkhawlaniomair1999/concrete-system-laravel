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
      <h3 class="card-title" style="float: right">تهيئة انواع الخرسانة</h3>
    </div>
    <form action="{{route('admin.init_types_concrete.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        
        <div class="col-5">
          <label for="exampleInputEmail1">نوع الخرسانة </label>
        <input type="text" class="form-control" name="type_concrete" placeholder="نوع الخرسانة" required >          
        </div>
      <div class="col-5">
        <label for="exampleInputEmail1">السعر</label>
      <input type="number" class="form-control" name="price" placeholder="السعر" required >
    </div>


      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">تأكيد</button>
      </div>

    </form>
    <!-- /.card-body -->
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">بيانات انواع الخرسانة</h3>
      <a href="{{ route('print.concceret') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      
    
      <table id="example" class="table table-bordered table-striped">
        
        <thead class="table-dark">
        <tr>
          <th>رقم الخرسانة</th>
          <th>نوع الخرسانة</th>
          <th>السعر</th>
          <th></th>
          <th></th>

        </tr>
        </thead>
      @php
      $i=1;  
      @endphp

        <tbody> 
           @foreach ( $data1 as $d)
           <tr>
           <td>{{ $d->id_types_concrete }}</td>
           <td>{{ $d->type_concrete }}</td>
           <td>{{ $d->price }}</td>
           <td><a href="{{route('admin.init_types_concrete.update',$d->id_types_concrete)}}" class="btn btn-primary">تعديل</a>
           <td><a href="{{route('admin.init_types_concrete.delete',$d->id_types_concrete)}}" class="btn btn-primary">حذف</a>

           </tr>
           @php
              $i++;
           @endphp
             
           @endforeach
        </tbody>
        
      </table>
    </div>
    <!-- /.card-body -->
  </div>


  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection






















