@extends('layouts.admin')
@section('title')
    فواتير المشتريات
@endsection
@section('contentheader')
    المشتريات
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
    <h3 class="card-title" style="float: right">فاتورة مشتريات </h3>
  </div>
    </div>
   </div>
  </form>

    <form action="{{route('admin.invoice_details.insert1',$data1->id_invoice)}}" method="POST">
      @csrf
     <div class="card-body">
      <div class="row">
        <div class="col-2">
            <label for="exampleInputEmail1">رقم الفاتورة:</label>
          <input type="number" value="{{$data1->id_invoice}}" class="form-control" name="id_invoice"  placeholder=" " disabled >
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label> اسم الصنف</label>
          <select class="form-control" name="id_item" id="select2">
            @foreach ($data5 as $d5)
              <option value="{{$d5->id_item}}">{{$d5->name_item}}</option>
            @endforeach
          </select>
      </div>
        </div>
  
        <div class="col-2">
          <label for="exampleInputEmail1">الكمية:  </label>
        <input type="number" class="form-control" name="quantity"  placeholder="الكمية" >
      </div>
  
      <div class="col-3">
        <label for="exampleInputEmail1">السعر:  </label>
       <input type="number" class="form-control" name="price"  placeholder="السعر" >
      </div>
      <div class="col-md-4">
      <div class="form-group">
        <label> اسم المخزن</label>
        <select class="form-control" name="id_store" id="select2">
          
          @foreach ($data7 as $d7)
          <option value="{{$d7->id_store}}">{{$d7->name_store}}</option>
        @endforeach
         
         
        </select>
    </div>
      </div>
       <div class="col-2">
          <label for="exampleInputEmail1">  </label>
          <button type="submit" class="btn btn-success btn-flat">اضافة</button>
       </div>




    
    
    </form>

</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title" style="float:right">عرض تفاصيل الفاتورة</h3>
    @if(@isset($data2))
    <a href="{{ route('print.invoice_print',$data1->id_invoice) }}" class="btn btn-primary">طباعة</a>
    @endif
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead class="table-dark">
      <tr>
        <th>رقم الفاتورة</th>
        <th>اسم الصنف</th>
        <th>السعر</th>
        <th>الكمية</th>
        <th>الاجمالي</th>
      </tr>
      </thead>
      @php
      $i=1;
    @endphp
      <tbody>
        @if(@isset($data2))
        @foreach ($data2 as $d)
        <tr>
          <td>{{$d->id_invoice}}</td>
          <td>@foreach ($data5 as $d5)
            @if ($d5->id_item == $d->id_item)
             {{ $d5->name_item }} 
            @endif
          @endforeach</td>
          <td>{{$d->price}}</td>
          <td>{{$d->quantity}}</td>
          <td>{{$d->total}}</td>
        </tr>
         @php
           $i++;
         @endphp 
        @endforeach  
        @endif   
      </tbody>
    </table>
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






















