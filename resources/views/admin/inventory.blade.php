@extends('layouts.admin')
@section('title')
      المخزون
@endsection
@section('contentheader')
      المخزون
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')


<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

<a href="{{ route('print.inventory_print') }}" style="margin-right: 20px" class="btn btn-primary"> طباعة </a>

  <div class="card-body">
    <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="data_table">
     <table id="example" class="table table-striped table-bordered">
       <thead class="table-dark">
           <tr>
                <th>م</th>
                <th>اسم المخزن</th>
                <th> اسم الصنف</th>
                <th>الكمية</th>
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
            @foreach ($data1 as $d1)
                @if ($d1->id_store == $d->id_store)
                    {{ $d1->name_store }}
                @endif
            @endforeach
        </td>
        <td>
          @foreach ($data2 as $d2 )
            @if($d2->id_item == $d->id_item)
            {{ $d2->name_item }}
            @endif
          @endforeach
        </td>
        <td>{{ $d->quantity }}</td>
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






















