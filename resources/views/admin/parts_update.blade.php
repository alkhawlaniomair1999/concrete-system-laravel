@extends('layouts.admin')
@section('title')
     تعديل جزء
@endsection
@section('contentheader')
     تعديل جزء
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
      <h3 class="card-title" style="float: right">تعديل جزء</h3>
    </div>
    <form action="{{route('admin.orders.update',$data->id_part)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
          <label for="exampleInputEmail1">رقم الجزء</label>
        <input type="number" class="form-control" value="{{ $data->id_part }}" name="{{ $data->id_part }}" placeholder="" disabled >
      </div>
      <div class="col-md-4">
        <div class="form-group">
          
          <label> اسم السائق</label>
          <select class="form-control" name="id_emp" id="select2">
            @foreach ($data1 as $d1)
              <option value="{{$d1->id_emp}}">{{$d1->name_emp}}</option>
              
            @endforeach
          </select>
      </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label> رقم الشاحنة</label>
          <select class="form-control" name="id_track" id="select2">
            @foreach ($data2 as $d2)
              <option value="{{$d2->id_track}}">{{$d2->id_track}}</option>
            @endforeach
          </select>
      </div>
      </div>
      <div class="form-group">
        <label>التسليم</label>
        <select class="form-control" name="commet_delivery">
          <option value="0">لم يتم التسليم</option>        
            <option value="1">تم التسليم</option>
        </select>
    </div>
  <div class="col-3">
    <label for="exampleInputEmail1">تاريخ التسليم  </label>
  <input type="datetime-local" class="form-control" name="date_delivery"  required >
</div>



      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">تأكيد</button>
      </div>

    </form>
    <!-- /.card-body -->
  </div>


        <script>

          $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
          });
        });
      
      </script>
      

      </table>
    </div>
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






















