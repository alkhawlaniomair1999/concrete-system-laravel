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
  <form action="{{route('admin.rec.insert')}}" method="POST">
    @csrf
   <div class="card-body">
    <div class="row">
    <div class="form-group">
      <label> نوع السند </label>
      <select class="form-control" name="type_rec">
        
          <option>سند قبض</option>
          <option>سند صرف</option>
      </select>
  </div>

  <div class="col-2">
    <label for="exampleInputEmail1">مبلغ السند  </label>
  <input type="number" class="form-control" name="total" placeholder=" مبلغ السند" required min="0">
</div>
<div class="col-6">
  <label for="exampleInputEmail1">التفاصيل   </label>
<input type="text-area" class="form-control" name="details" placeholder=" التفاصيل " required min="0">
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
    <h3 class="card-title" style="float: right">بيانات السندات </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead class="table-dark">
      <tr>
        <th>رقم السند</th>
        <th>نوع السند</th>
        <th>المدين </th>
        <th>الدائن </th>
        <th>المبلغ</th>
        <th></th>
      </tr>
      </thead>
    <tbody>
      @php
          $i=1;
        @endphp
      @if (@isset($data2))
        @foreach ($data2 as $d)
          <tr>
            <td>{{ $d->id_rec }}</td>
            @if (@isset($data))
            @foreach ($data as $d7)
              @if ($d7->id_rec == $d->id_rec)
                <td>{{ $d7->type_rec }}</td>
              @endif
            @endforeach
              
            @endif
            @if ($i%2==1)
            @if (@isset($data3))
            @foreach ($data3 as $d3)
            @if ($d3->id_account == $d->id_account)
            <td>{{ $d3->name_account}}</td> 
            <td></td>
            @endif
            @endforeach
          @endif
          @else
              @if (@isset($data3))
              @foreach ($data3 as $d3)
              @if ($d3->id_account == $d->id_account)
              <td></td>
              <td>{{ $d3->name_account}}</td> 
              @endif
              @endforeach
            @endif
            @endif
           
            @if(@isset($data))
            @foreach ($data as $d4)
            @if ($d4->id_rec == $d->id_rec)
            <td>{{ $d4->total }}</td>
            @endif              
            @endforeach  
            @endif  
            @if ($i%2==1) 
            <td>    <a href="{{ route('print.rec_print',$d->id_rec) }}" class="btn btn-primary">طباعة</a>
            </td>  
            @else
            <td></td>
            @endif     
          </tr>
          @php
            $i++;
          @endphp
        @endforeach
      @endif         
      </tbody>
    </table>
    <br>
    <br>
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






















