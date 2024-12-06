@extends('layouts.admin')
@section('title')
    مكونات الخرسانة
@endsection
@section('contentheader')
    مكونات الخرسانة
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')



<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title" style="float: right">اضافة مكونات خرسانة </h3>
  </div>
    </div>
   </div>
  </form>

    <form action="{{route('admin.init_types_concrete.insert1',$data2->id_types_concrete)}}" method="POST">
      @csrf
     <div class="card-body">
      <div class="row">
        <div class="col-2">
            <label for="exampleInputEmail1">رقم نوع الخرسانة:</label>
          <input type="number" value="{{$data2->id_types_concrete}}" class="form-control" name="id_types_concrete"  placeholder=" " disabled >
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

       <div class="col-2">
          <label for="exampleInputEmail1">  </label>
          <button type="submit" class="btn btn-success btn-flat">اضافة</button>
       </div>




    
    
    </form>

</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title" style="float:right">عرض تفاصيل الفاتورة</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>رقم المكون</th>
        <th>نوع الخرسانة</th>
        <th>الصنف</th>
        <th>الكمية</th>
      </tr>
      </thead>
      @php
      $i=1;
    @endphp
      <tbody>
        @if(@isset($data3))
        @foreach ($data3 as $d)
        <tr>
          <td>{{$d->id_component_concrete}}</td>
            <td>{{ $data2->type_concrete }}</td>
          @foreach ($data5 as $d5)
          @if ($d5->id_item == $d->id_item)
            <td>{{ $d5->name_item }}</td>
          @endif
            
          @endforeach
          <td>{{$d->quantity}}</td>
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






















