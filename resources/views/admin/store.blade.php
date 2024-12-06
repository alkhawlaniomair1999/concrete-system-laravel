@extends('layouts.admin')
@section('title')
    تهيئة المخازن
@endsection
@section('contentheader')
    المخازن
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
      <h3 class="card-title" style="float: right">تهيئة المخازن</h3>
    </div>
    <form action="{{route('admin.store.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم المخزن</label>
          <input type="text" class="form-control" name="name_store"  placeholder="اسم المخزن" required >
        </div>
        <div class="col-md-4">
        <div class="form-group">
          
          <label>الفرع</label>
          <select class="form-control" name="id_branch" id="select2">
            @if (@isset($data))
            @foreach ($data as $d)
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


  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">عرض بيانات المخازن</h3>
      <a href="{{ route('print.print_store') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
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
          <th>رقم المخزن</th>
          <th>اسم المخزن</th>
          <th>اسم الفرع</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @if (@isset($data1))
          @foreach ( $data1 as $d )
          <tr>
        <td>{{ $d->id_store }}</td>
        <td>{{ $d->name_store }}</td>
        <td>
          @foreach ($data as $d2)
          @if ($d2->id_branch == $d->id_branch)
          {{ $d2->name_branch }}</td> 
          @endif
          
          @endforeach
        <td><a href="{{ route('admin.store.update',$d->id_store) }}" class="btn btn-primary"> تعديل </a></td>
          <td><a href="{{ route('admin.store.delete',$d->id_store) }}" class="btn btn-primary"> حذف </a></td>
          </tr>
          @php
          $i++;
        @endphp
          
        @endforeach
          @endif
        
        </tbody>
        <tfoot>
        
        </tfoot>
        <script>

          $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
          });
        });
      
      </script>
      

      </table>
    </div>
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






















