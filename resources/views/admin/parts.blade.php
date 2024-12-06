@extends('layouts.admin')
@section('title')
     اجزاء الطلب
@endsection
@section('contentheader')
     اجزاء الطلب
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')


<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">عرض بيانات الطلب</h3>
      <h3 class="card-title" style="padding-right: 50px;float: right ">رقم الطلب: {{ $data->id_order }}</h3>
      <h3 class="card-title" style="padding-right: 50px;float: right ">اسم العميل : {{ $data1->name_customer }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if(@isset($data3)&& !@empty($data3))
      @php 
      $i=1;
      @endphp
      @endif
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>رقم الجزء</th>
          <th>الكمية</th>
          <th>رقم الشاحنة</th>
          <th>اسم السائق</th>
          <th> التأكيد</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        
          @foreach ($data2 as $d2)
          <tr>
          <td>{{ $d2->id_part }}</td>
          <td>{{ $d2->quantity_part }}</td>
          <td>
          @foreach ($data3 as $d3)
            @if ($d3->id_track == $d2->id_track)
              {{ $d3->id_track }}
            @endif             
          @endforeach
        </td> 
        <td>
          @foreach ($data4 as $d4)
          @if ($d4->id_emp == $d2->id_emp)
            {{ $d4->name_emp }}
          @endif
        @endforeach
      </td>
          <td>
            @if ($d2->commet_delivery == 0)
               لم يتم التسليم 
              @else
               تم التسليم 
            @endif
            </td>
            <td>
            @if ($d2->commet_delivery == 0)
            <a href="{{ route('admin.orders.edit',$d2->id_part) }}" class="btn btn-primary">تعديل </a>
            @endif
          </td>
          <td>
            @if ($d2->commet_delivery == 0)
            <a href="{{ route('print.part_print',$d2->id_part) }}" class="btn btn-primary">طباعة </a>
            @endif
          </td>

        </tr>
          @endforeach
         
        
        </tbody>
        <tfoot>
        
        </tfoot>
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






















