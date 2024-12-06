@extends('layouts.admin')
@section('title')
    الاقسام
@endsection
@section('contentheader')
    الاقسام
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
      <h3 class="card-title" style="float: right">تهيئة الاقسام</h3>
    </div>
    <form action="{{route('admin.init_dept.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم القسم</label>
          <input type="text" class="form-control" name="name_dept" placeholder="اسم القسم" required >
        </div>
        <div class="col-5">
          <label for="exampleInputEmail1">المدير</label>
        <input type="text" class="form-control" name="manager" placeholder="المدير" required >
      </div>
      <div class="col-md-4">
      <div class="form-group">
       
        <label> اسم الفرع</label>
        <select class="form-control" name="id_branch" id="select2">
          @foreach ($data1 as $d1)
            <option value="{{$d1->id_branch}}">{{$d1->name_branch}}</option>
            
          @endforeach
        </select>
    </div>
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
      <h3 class="card-title" style="float: right">بيانات جدول الاقسام</h3>
      <a href="{{ route('print.dept') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>رقم القسم</th>
          <th>اسم القسم</th>
          <th>المدير</th>
          <th>اسم الفرع</th>
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
            <td>{{ $d->id_dept }}</td>
            <td>{{ $d->name_dept }}</td>
            <td>{{ $d->manager }}</td>
            <td>
              @foreach ($data1 as $d2)
              @if ($d2->id_branch == $d->id_branch)
              {{ $d2->name_branch }}</td> 
              @endif
              
              @endforeach
            
            <td><a href="{{route('admin.init_dept.update',$d->id_dept)}}" class="btn btn-primary">تعديل</a></td>
            <td><a href="{{route('admin.init_dept.delete',$d->id_dept)}}" class="btn btn-primary">حذف</a></td>
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






















