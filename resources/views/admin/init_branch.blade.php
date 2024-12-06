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
      <h3 class="card-title" style="float: right">تهيئة الفروع</h3>
    </div>
    <form action="{{route('admin.init_branch.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم الفرع</label>
          <input type="text" class="form-control" name="name_branch" placeholder="اسم الفرع" required >
        </div>
        
       
        <div class="col-5">
          <label for="exampleInputEmail1">المدير</label>
        <input type="text" class="form-control" name="manager" placeholder="المدير" required >
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
      <h3 class="card-title" style="float: right">عرض بيانات الفروع</h3>
      <a href="{{ route('print.branch') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th> رقم الفرع</th>
          <th>اسم الفرع </th>
          <th>المدير</th>
          <th></th>
          <th></th>
          
        </tr>
        </thead>
        <tbody>
          @foreach ( $data1 as $d )
          <tr>
          <td>{{ $d->id_branch }}</td>
          <td>{{ $d->name_branch }}</td>
          <td>{{ $d->manager }}</td>
          <td><a href="{{ route('admin.init_branch.update',$d->id_branch) }}" class="btn btn-primary"> تعديل </a></td>
          <td><a href="{{ route('admin.init_branch.delete',$d->id_branch) }}" class="btn btn-primary"> حذف </a></td>
          </tr>
            
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






















