@extends('layouts.admin')
@section('title')
    الموردين
@endsection
@section('contentheader')
    الموردين
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
      <h3 class="card-title" style="float: right">تعديل مورد</h3>
    </div>
    <form action="{{route('admin.suppliers.edit',$data->id_supplier)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">       
            <label> اسم الحساب</label>
            <select class="form-control" name="id_account" id="select2">
              @foreach ($data1 as $d1)
              @if ($d1->id_account == $data->id_account)
              <option value="{{$d1->id_account}}">{{$d1->name_account}}</option>
              @endif
             @endforeach
             @foreach ($data1 as $d1)
             @if ($d1->id_account != $data->id_account)
             <option value="{{$d1->id_account}}">{{$d1->name_account}}</option>
             @endif
            @endforeach
            </select>
        </div>
          </div>
        <div class="col-5">
          <label for="exampleInputEmail1">هاتف المورد</label>
        <input type="number" class="form-control" value="{{$data->phone_supplier}}" name="phone_supplier" placeholder="هاتف المورد" required >
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






















