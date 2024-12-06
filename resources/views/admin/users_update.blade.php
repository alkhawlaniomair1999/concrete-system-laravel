@extends('layouts.admin')
@section('title')
    المستخدمين
@endsection
@section('contentheader')
    المستخدمين
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
      <h3 class="card-title" style="float: right">تعديل بيانات مستخدم</h3>
    </div>
    <form action="{{route('admin.users.update',$data->id)}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-3">
              <label for="exampleInputEmail1">الاسم</label>
            <input type="text" class="form-control" value="{{ $data->name }}" name="name" placeholder="الاسم" required >
          </div>      
          <div class="col-3">
            <label for="exampleInputEmail1">البريد الالكتروني</label>
          <input type="email" class="form-control" value="{{ $data->email }}" name="email" placeholder="البريد الالكتروني" required >
        </div>
        <div class="col-3">
          <label for="exampleInputEmail1">اسم المستخدم</label>
        <input type="text" class="form-control" value="{{ $data->username}}" name="username" placeholder="اسم المستخدم" required >
        </div>
      <div class="col-3">
        <label for="exampleInputEmail1">كلمة المرور</label>
      <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required >
    </div>
        </div>
        <hr>
    <div class="row" style="margin-right: 10px">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="init_system">
        <label for="customCheckbox1" class="custom-control-label">تهيئة النظام</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="supp">
        <label for="customCheckbox2" class="custom-control-label">التوريد</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox3" name="prod">
        <label for="customCheckbox3" class="custom-control-label">الانتاج</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox4" name="acc">
        <label for="customCheckbox4" class="custom-control-label">الحسابات</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="customCheckbox5" name="users">
        <label for="customCheckbox5" class="custom-control-label">المستخدمين</label>
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






















