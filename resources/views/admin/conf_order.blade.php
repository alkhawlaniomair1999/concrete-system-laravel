@extends('layouts.admin')
@section('title')
     تأكيد طلب
@endsection
@section('contentheader')
     تأكيد طلب
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
      <h3 class="card-title" style="float: right">تأكيد طلب</h3>
    </div>
    <form action="{{route('admin.conf_order.insert1',$data->id_temp_order)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">اسم الزبون</label>
        <input type="text" class="form-control" name="id_account" value="{{ $data2->name_account }}"  disabled >
      </div>
      <div class="col-5">
        <label for="exampleInputEmail1">الكمية بالمتر المكعب</label>
      <input type="number" class="form-control" value="{{ $data->quantity }}" name="quantity"  required >
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <label> نوع الخرسانة</label>
          <select class="form-control" name="id_types_concrete" id="select2">
            @foreach ($data3 as $d2)
              @if ($d2->id_types_concrete == $data->id_types_concrete)
              <option value="{{$d2->id_types_concrete}}">{{$d2->type_concrete}}</option>
              @endif            
            @endforeach
            @foreach ($data3 as $d2)
            @if ($d2->id_types_concrete != $data->id_types_concrete)
            <option value="{{$d2->id_types_concrete}}">{{$d2->type_concrete}}</option>
            @endif            
          @endforeach
          </select>
      </div>
    </div>
    <div class="col-5">
      <label for="exampleInputEmail1">العنوان</label>
    <input type="text" class="form-control" name="address" value="{{ $data->address }}" placeholder="العنوان" required >
  </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>المخزن</label>
        <select class="form-control" name="id_store" id="select2">
          @foreach ($data4 as $d4)
            <option value="{{$d4->id_store}}">{{$d4->name_store}}</option>
          @endforeach
        </select>
    </div>
    </div>
      
  <div class="col-3">
    <label for="exampleInputEmail1">تاريخ التسليم  </label>
  <input type="date" class="form-control" name="date_delivery"  required >
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






















