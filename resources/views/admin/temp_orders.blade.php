@extends('layouts.admin')
@section('title')
الطلبات المؤقتة
@endsection
@section('contentheader')
الطلبات المؤقتة
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')


<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

  <div class="card-body">
    <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="data_table">
     <table id="example" class="table table-striped table-bordered">
       <thead class="table-dark">
           <tr>
                <th>م</th>
                <th>اسم العميل</th>
                <th> نوع الخرسانة</th>
                <th>الكمية</th>
                <th>العنوان</th>
                <th></th>
                <th></th>
           </tr>
       </thead>
       @php
       $i=1;
     @endphp
       <tbody>
      
        @foreach ($data as $d)
          
       
       
      <tr>
        <td>
          {{$i  }}
        </td>
        <td>
            @foreach ($data2 as $d1)
                @if ($d1->id_account == $d->id_account)
                    {{ $d1->name_account }}
                @endif
            @endforeach
        </td>
        <td>
          @foreach ($data3 as $d2 )
            @if($d2->id_types_concrete == $d->id_types_concrete)
            {{ $d2->type_concrete }}
            @endif
          @endforeach
        </td>
        <td>{{ $d->quantity }}</td>
        <td>{{ $d->address }}</td>
        <td><a href="{{ route('admin.conf_order',$d->id_temp_order) }}" class="btn btn-primary">تأكيد الطلب</a>
        </td>
        <td><a href="{{ route('admin.del_order',$d->id_temp_order) }}" class="btn btn-primary">حذف </a>
        </td>
      </tr>

      @php
         $i++;
       @endphp
      @endforeach
       </tbody>
     </table>
              </div></div></div></div>
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






















