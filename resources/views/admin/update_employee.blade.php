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
      <h3 class="card-title" style="float: right">تعديل بيانات موظف</h3>
    </div>
    <form action="{{route('admin.employee.edit',$data1->id_emp)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">      
            <label> اسم الحساب</label>
            <select class="form-control" name="id_account" id="select2">
              @foreach ($data3 as $d2)
              @if ($d2->id_account == $data1->id_account)
              <option value="{{$d2->id_account}}">{{$d2->name_account}}</option>  
              @endif                        
              @endforeach
              @foreach ($data3 as $d2)
              @if ($d2->id_account != $data1->id_account)
              <option value="{{$d2->id_account}}">{{$d2->name_account}}</option>  
              @endif                        
              @endforeach
            </select>
        </div>
      </div>    
        <div class="form-group">
          
          <label> اسم القسم</label>
          <select class="form-control" name="id_dept">
            @if (@isset($data2))                         
            @foreach ($data2 as $d1)
              <option value="{{$d1->id_dept}}">{{$d1->name_dept}}</option>         
            @endforeach
            @endif
          </select>
      </div>
       
      <div class="col-5">
          <label for="exampleInputEmail1">العنوان</label>
        <input type="text" class="form-control" value="{{ $data1->address }}" name="address" placeholder="العنوان" required >
      </div>
  
      <div class="col-3">
        <label for="exampleInputEmail1">رقم الجوال </label>
      <input type="number" class="form-control"  value="{{ $data1->phone_emp }}"name="phone_emp" placeholder="رقم الهاتف" required >
    </div>

    <div class="col-3">
      <label for="exampleInputEmail1">رقم الهوية </label>
    <input type="number" class="form-control" value="{{ $data1->personal_id }}" name="personal_id" placeholder="رقم الهوية" required >
  </div> 

  <div class="col-3">
    <label for="exampleInputEmail1">الراتب  </label>
  <input type="number" class="form-control" value="{{ $data1->salary }}" name="salary" placeholder="الراتب " required >
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






















