@extends('layouts.admin')
@section('title')
    تعديل مخزن
@endsection
@section('contentheader')
    تعديل مخزن
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
      <h3 class="card-title" style="float: right">تعديل بيانات المخزن</h3>
    </div>
    <form action="{{route('admin.store.edit',$data->id_store)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم المخزن</label>
          <input type="text" class="form-control" value="{{$data->name_store}}" name="name_store"  placeholder="اسم المخزن" required >
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label>الفرع</label>
          <select class="form-control" name="id_branch" id="select2">
            @if (@isset($data1))
            @foreach ($data1 as $d)
            <option value="{{$d->id_branch}}">{{$d->name_branch}}</option>

          @endforeach
            @endif
            
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



















  <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('assets/amin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
  <script src="{{asset('assets/admin/dist/js/table.js')}}"></script>


@endsection






















