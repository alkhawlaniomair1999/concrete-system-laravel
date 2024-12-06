@extends('layouts.admin')
@section('title')
     مردود المشتريات
@endsection
@section('contentheader')
    مردود المشتريات 
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">فاتورة مشتريات</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')



<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title" style="float: right">فاتورة مردود مشتريات </h3>
  </div>
  <form action="{{route('admin.invoice_re.insert')}}" method="POST">
    @csrf
   <div class="card-body">
    <div class="row">
      <div class="col-md-4">
    <div class="form-group">
      <label> اسم المورد</label>
      <select class="form-control" name="id_supplier" id="select2">
        @foreach ($data as $d)
          <option value="{{$d->id_supplier}}">{{$d->name_supplier}}</option>
        @endforeach
      </select>
  </div>
      </div>
    <div class="col-1">
      <label for="exampleInputEmail1">  </label>
      <button type="submit" class="btn btn-success btn-flat">اضافة</button>
  </div>

    </div>
   </div>
  </form>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title" style="float: right">بيانات فواتير المشتريات</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead class="table-dark">
      <tr>
        <th>رقم الفاتورة</th>
        <th>اسم المورد</th>
        <th>اجمالي الفاتورة</th>
        <th>الموظف</th>
        <th>الترحيل</th>
        <td></td>
      </tr>
      </thead>
    <tbody>
      @foreach ($data2 as $d2)
      <tr>
          <td>{{ $d2->id_invoice_re }}</td>
          @foreach ($data as $d)
          @if ($d->id_supplier == $d2->id_supplier)
            <td>{{ $d->name_supplier }}</td>
          @endif            
          @endforeach         
          <td>{{ $d2->total_invoice }}</td>
          <td>{{ $d2->created_by}} </td>
          <td>
            @if ($d2->trans == false)
            <a href="{{ route('admin.invoice_re.trans',$d2->id_invoice_re)}}" class="btn btn-primary"> ترحيل </a>
            @endif
          </td>
          <td><a href="{{ route('print.invoice_re_print',$d2->id_invoice_re)}}" class="btn btn-primary"> طباعة </a>
          </td>
          
        </tr>          
        @endforeach
      </tbody>
    </table>
    
    <br>
    <br>
    {{ $data->links() }}
  </div>
  <!-- /.card-body -->
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






















