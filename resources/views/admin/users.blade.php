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
      <h3 class="card-title" style="float: right">اضافة مستخدم</h3>
    </div>
    <form action="{{route('admin.users.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-3">
            <label for="exampleInputEmail1">الاسم</label>
          <input type="text" class="form-control" name="name" placeholder="الاسم" required >
        </div>      
        <div class="col-3">
          <label for="exampleInputEmail1">البريد الالكتروني</label>
        <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" required >
      </div>
      <div class="col-3">
        <label for="exampleInputEmail1">اسم المستخدم</label>
      <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" required >
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


  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">عرض بيانات المستخدمين</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>الاسم</th>
          <th>البريد الالكتروني</th>
          <th>اسم المستخدم</th>
          <th>نوع المستخدم</th>
          <th></th>
          <th></th>
          
        </tr>
        </thead>
        <tbody>
          @if (@isset($data1))
          @foreach ( $data1 as $d )
          <tr>
          <td>{{ $d->name }}</td>
          <td>{{ $d->email }}</td>
          <td>{{ $d->username }}</td>
          <td>
            @if ($d->com_code == 1)
              مستخدم نظام
            @else
              عميل
            @endif
          </td>
          <td><a href="{{route('admin.users.edit',$d->id)}}" class="btn btn-primary">تعديل</a></td>
          <td><a href="{{route('admin.users.delete',$d->id)}}" class="btn btn-primary">حذف</a></td>
          </tr>
          @endforeach  
          @endif
          
        </tbody>
        <br>
        <br>
        @if (@isset($data1))
        {{ $data1->links() }}
        @endif
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>


  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection






















