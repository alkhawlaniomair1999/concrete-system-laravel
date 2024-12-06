@extends('layouts.admin')
@section('title')
    العملاء
@endsection
@section('contentheader')
    العملاء
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
      <h3 class="card-title" style="float: right">تهيئة العملاء</h3>
    </div>
    <form action="{{route('admin.init_customer.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label> اسم الحساب</label>
            <select class="form-control" name="id_account" id="select2">
              @foreach ($data1 as $d1)
                <option value="{{$d1->id_account}}">{{$d1->name_account}}</option>
              @endforeach
            </select>
        </div>
          </div>     
        <div class="col-5">
          <label for="exampleInputEmail1">العنوان</label>
        <input type="text" class="form-control" name="address" placeholder="العنوان" required >
      </div>
      <div class="col-5">
        <label for="exampleInputEmail1"> رقم الهاتف</label>
      <input type="number" class="form-control" name="phone_customer" placeholder="رقم الهاتف" required >
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
      <h3 class="card-title" style="float: right">بيانات جدول العملاء</h3>
      <a href="{{ route('print.print_customer') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>اسم العميل</th>
          <th>العنوان</th>
          <th>رقم الهاتف</th>
          <th>اسم الحساب</th>
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
            <td>{{ $d->name_customer }}</td>
            <td>{{ $d->address }}</td>
            <td>{{ $d->phone_customer }}</td>
            <td>
              @foreach ($data1 as $d2)
              @if ($d2->id_account == $d->id_account)
              {{ $d2->name_account }}</td> 
              @endif
              
              @endforeach

            <td><a href="{{ route('admin.init_customer.update',$d->id_customer)}}" class="btn btn-primary">تعديل</a></td>
            <td><a href="{{ route('admin.init_customer.delete',$d->id_customer)}}" class="btn btn-primary">حذف</a></td>
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






















