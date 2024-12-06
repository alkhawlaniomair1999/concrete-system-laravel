@extends('layouts.admin')
@section('title')
    تسوية المخزون
@endsection
@section('contentheader')
    تسوية المخزون
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
    <h3 class="card-title" style="float: right">اضافة تسوية مخزون </h3>
  </div>

    <form action="{{route('admin.edit_invent.insert')}}" method="POST">
      @csrf
      <div class="card-body">
      <div class="row">
        <div class="col-md-4">  
      <div class="form-group">       
        <label> اسم المخزن</label>
        <select class="form-control" name="id_store" id="select2">
          @foreach ($data1 as $d1)
            <option value="{{$d1->id_store}}">{{$d1->name_store}}</option>
          @endforeach
        </select>
    </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
          
          <label> اسم الصنف</label>
          <select class="form-control" name="id_item" id="select2">
            @foreach ($data2 as $d2)
              <option value="{{$d2->id_item}}">{{$d2->name_item}}</option>
            @endforeach
          </select>
      </div>
        </div>
        <div class="col-2">
          <label for="exampleInputEmail1">الكمية:  </label>
        <input type="number" class="form-control" name="quantity"  placeholder="الكمية" >
      </div>
    </div>
       <div class="col-2">
          <label for="exampleInputEmail1">  </label>
          <button type="submit" class="btn btn-success btn-flat">اضافة</button>
       </div>



      </div>
  
    
    </form>

</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title" style="float:right">عرض التسويات المخزنية</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example" class="table table-bordered table-striped">
      <thead class="table-dark">
      <tr>
        <th>رقم التسوية</th>
        <th>اسم المخزن</th>
        <th>الصنف</th>
        <th>الكمية</th>
        <th>تاريخ الانشاء</th>
        <th>انشئ بواسطة</th>
      </tr>
      </thead>
      <tbody>
        @if(@isset($data))
        @foreach ($data as $d)
        <tr>
          <td>{{$d->id_edit_invent}}</td>
          @foreach ($data1 as $d1)
          @if ($d1->id_store == $d->id_store)
            <td>{{ $d1->name_store }}</td>
          @endif
            
          @endforeach
          @foreach ($data2 as $d2)
          @if ($d2->id_item == $d->id_item)
            <td>{{ $d2->name_item }}</td>
          @endif
            
          @endforeach
          <td>{{$d->quantity}}</td>
          <td>{{ $d->created_at }}</td>
          <td>{{ $d->created_by }}</td>
        </tr>
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






















