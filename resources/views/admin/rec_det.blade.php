@extends('layouts.admin')
@section('title')
    السندات 
@endsection
@section('contentheader')
    السندات
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}"> الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')



<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title" style="float: right"> اضافة سند </h3>
  </div>
  <form action="{{route('admin.rec.insert1',$data2->id_rec)}}" method="POST">
    @csrf
   <div class="card-body">
    <div class="row">

  <div class="col-2">
    <label for="exampleInputEmail1">رقم السند  </label>
  <input type="number" class="form-control" value="{{ $data2->id_rec }}" name="id_rec"  disabled>
</div>
<div class="form-group">
  <label> من الحساب </label>
  <select class="form-control" name="id_account">
    @if (@isset($data3))
      @foreach ($data3 as $d3)
        <option value="{{ $d3->id_account }}">{{ $d3->name_account }}</option>
      @endforeach
    @endif
  </select>
</div>

<div class="form-group">
<label> الى الحساب </label>
<select class="form-control" name="id_account1">
  @if (@isset($data3))
    @foreach ($data3 as $d3)
      <option value="{{ $d3->id_account }}">{{ $d3->name_account }}</option>
    @endforeach
  @endif
</select>
</div>

    <div class="col-1">
      <label for="exampleInputEmail1">  </label>
      <button type="submit" class="btn btn-success btn-flat">اضافة</button>
  </div>

    </div>
   </div>
  </form>
</div>




@push('scripts')

@endpush

  <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('assets/amin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
  
 
@endsection






















