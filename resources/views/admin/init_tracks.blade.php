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
      <h3 class="card-title" style="float: right">تهيئة الشاحنات</h3>
    </div>
    <form action="{{route('admin.init_tracks.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">سنة الصنع</label>
        <input type="number" class="form-control" name="model" placeholder="سنة الصنع" required >
      </div>
    
    <div class="col-5">
      <label for="exampleInputEmail1"> رقم اللوحه</label>
    <input type="string" class="form-control" name="id_board" placeholder="رقم اللوحه" required >
  </div>

        
 
   
      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">تأكيد</button>
      </div>
    </div>
    </form>
    <!-- /.card-body -->
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">بيانات جدول الشاحنات</h3>
      <a href="{{ route('print.print_track') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>رقم الشاحنة</th>
          <th>سنة الصنع</th>
          <th>رقم اللوحة</th>
          <th></th>
          <th></th>
          
        </tr>
        </thead>
        @php
        $i=1;
      @endphp
      <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->id_track }}</td>
            <td>{{ $d->model }}</td>
            <td>{{ $d->id_board }}</td>
            <td><a href="{{ route('admin.init_tracks.update',$d->id_track)}}" class="btn btn-primary"> تعديل </a></td>
            <td><a href="{{ route('admin.init_tracks.delete',$d->id_track)}}" class="btn btn-primary"> حذف </a></td>
          </tr>
          @php
            $i++;
          @endphp            
          @endforeach
        </tbody>
      </table>
      <br>
      <br>
      {{ $data->links() }}
    </div>
    <!-- /.card-body -->
  </div>


  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection






















