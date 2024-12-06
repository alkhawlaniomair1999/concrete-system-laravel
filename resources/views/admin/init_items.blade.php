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
      <h3 class="card-title" style="float: right">تهيئة الاصناف</h3>
    </div>
    <form action="{{route('admin.init_item.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">اسم الصنف</label>
        <input type="text" class="form-control" name="name_item" placeholder="اسم الصنف" required >
      </div>
      
      <div class="col-5">
        <label for="exampleInputEmail1">وحدة القياس</label>
      <input type="text" class="form-control" name="measuring_unit" placeholder="وحدة القياس" required >
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
      <h3 class="card-title" style="float: right">عرض بيانات الاصناف</h3>
      <a href="{{ route('print.item') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if(@isset($data1)&& !@empty($data1))
      @php 
      $i=1;
      @endphp
      @endif
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th> رقم الصنف</th>
          <th>اسم الصنف </th>
          <th>وحدةالقياس</th>
          <th></th>
          <th></th>
          
        </tr>
        </thead>
        <tbody>
          @foreach ( $data1 as $d )
          <tr>
          <td>{{ $d->id_item }}</td>
          <td>{{ $d->name_item }}</td>
          <td>{{ $d->measuring_unit  }}</td>
          <td><a href="{{ route('admin.init_item.update',$d->id_item) }}" class="btn btn-primary"> تعديل </a></td>
          <td><a href="{{ route('admin.init_item.delete',$d->id_item) }}" class="btn btn-primary"> حذف </a></td>
          </tr>
          @php
            $i++;
          @endphp
            
          @endforeach
        
        </tbody>
        <br>
        <br>
        {{ $data1->links() }}
        
      </table>
    </div>
    <!-- /.card-body -->
  </div>


  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection






















