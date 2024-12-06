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
      <h3 class="card-title" style="float: right">تعديل بيانات القسم</h3>
    </div>
    <form action="{{route('admin.init_dept.edit',$data->id_dept)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم القسم</label>
          <input type="text" class="form-control" value="{{ $data->name_dept }}" name="name_dept" placeholder="اسم الاقسام" required >
        </div>
        <div class="col-5">
          <label for="exampleInputEmail1">المدير</label>
        <input type="text" class="form-control" value="{{ $data->manager }}" name="manager" placeholder="المدير" required >
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




  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection






















