@extends('layouts.admin')
@section('title')
     الموظفين
@endsection
@section('contentheader')
    الموظفين
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
      <h3 class="card-title" style="float: right">تهيئة الموظفين</h3>
    </div>
    <form action="{{route('admin.employee.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label> اسم الحساب</label>
            <select class="form-control" name="id_account" id="select2">
              @foreach ($data6 as $d1)
                <option value="{{$d1->id_account}}">{{$d1->name_account}}</option>
              @endforeach
            </select>
        </div>
          </div>    
        <div class="form-group">
          
          <label> اسم القسم</label>
          <select class="form-control" name="id_dept">
            @foreach ($data3 as $d)
              <option value="{{$d->id_dept}}">{{$d->name_dept}}</option>
             
            @endforeach
          </select>
      </div>
      <div class="col-5">
          <label for="exampleInputEmail1">العنوان</label>
        <input type="text" class="form-control" name="address" placeholder="العنوان" required >
      </div>

      <div class="col-3">
        <label for="exampleInputEmail1">رقم الجوال </label>
      <input type="number" class="form-control" name="phone_emp" placeholder="رقم الهاتف" required >
    </div>

    <div class="col-3">
      <label for="exampleInputEmail1">رقم الهوية </label>
    <input type="number" class="form-control" name="personal_id" placeholder="رقم الهوية" required >
  </div>

  <div class="col-3">
    <label for="exampleInputEmail1">الراتب  </label>
  <input type="number" class="form-control" name="salary" placeholder="الراتب " required >
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
      <h3 class="card-title" style="float: right">عرض بيانات الموظفين</h3>
      <a href="{{ route('print.emp_print') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
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
          <th>رقم الموظف</th>
          <th>اسم الموظف</th>
          <th>اسم القسم</th>
          <th>العنوان</th>
          <th> اسم الحساب</th>
          <th> رقم الجوال</th>
          <th>رقم الهوية</th>
          <th>الراتب</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ( $data1 as $d )
          <tr>
        <td>{{ $d->id_emp }}</td>
        <td>{{ $d->name_emp }}</td>
        <td>
            @foreach ($data3 as $d1)
            @if ($d1->id_dept == $d->id_dept)
            {{ $d1->name_dept }}
            @endif            
            @endforeach
          </td> 
        <td>{{ $d->address }}</td>
        <td>
          @foreach ($data6 as $d6)
          @if ($d6->id_account == $d->id_account)
          {{ $d6->name_account }}
          @endif
          @endforeach
        </td> 
        <td>{{ $d->phone_emp }}</td>
        <td>{{ $d->personal_id }}</td>
        <td>{{ $d->salary }}</td>
        <td><a href="{{ route('admin.employee.update',$d->id_emp) }}" class="btn btn-primary"> تعديل </a></td>
          <td><a href="{{ route('admin.employee.delete',$d->id_emp) }}" class="btn btn-primary"> حذف </a></td>
          </tr>
          @php
          $i++;
        @endphp
          
        @endforeach
        
        </tbody>
        <tfoot>
        
        </tfoot>
       
      

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






















