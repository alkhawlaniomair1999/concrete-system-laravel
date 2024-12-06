@extends('layouts.admin')
@section('title')
     الطلبات
@endsection
@section('contentheader')
     الطلبات
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
      <h3 class="card-title" style="float: right">تهيئة طلب</h3>
    </div>
    <form action="{{route('admin.orders.insert')}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
        <div class="form-group">
          
          <label> اسم الزبون</label>
          <select class="form-control" name="id_customer" id="select2">
            @foreach ($data as $d)
              <option value="{{$d->id_customer}}">{{$d->name_customer}}</option>
             
            @endforeach
          </select>
      </div>
        </div>
      <div class="col-5">
        <label for="exampleInputEmail1">الكمية بالمتر المكعب</label>
      <input type="number" class="form-control" name="quantity" placeholder="الكمية بالمتر المكعب" required >
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <label> نوع الخرسانة</label>
          <select class="form-control" name="id_types_concrete" id="select2">
            @foreach ($data2 as $d2)
              <option value="{{$d2->id_types_concrete}}">{{$d2->type_concrete}}</option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-5">
      <label for="exampleInputEmail1">العنوان</label>
    <input type="text" class="form-control" name="address" placeholder="العنوان" required >
  </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>المخزن</label>
        <select class="form-control" name="id_store" id="select2">
          @foreach ($data4 as $d4)
            <option value="{{$d4->id_store}}">{{$d4->name_store}}</option>
          @endforeach
        </select>
    </div>
    </div>
      
  <div class="col-3">
    <label for="exampleInputEmail1">تاريخ التسليم  </label>
  <input type="date" class="form-control" name="date_delivery"  required >
</div>



      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">تأكيد</button>
      </div>

    </form>
    <!-- /.card-body -->
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="float: right">عرض بيانات الطلبات</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if(@isset($data3)&& !@empty($data3))
      @endif
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>رقم الطلب</th>
          <th>اسم الزبون</th>
          <th>الكمية </th>
          <th>نوع الخرسانة</th>
          <th> السعر</th>
          <th>العنوان</th>
          <th> تاريخ التسليم </th>
          <th>التفاصيل</th>
          <th>مردود الطلب</th>
          <th>العقد</th>
        </tr>
        </thead>
        <tbody>
          @if (@isset($data3))
          @foreach ( $data3 as $d3 )
          @php
            $s=0;
          @endphp
          <tr>
        <td>{{ $d3->id_order }}</td>
        <td>
          @foreach ($data as $d)
          @if ($d->id_customer == $d3->id_customer)
            {{ $d->name_customer }}
          @endif
            
          @endforeach
          </td>
        <td>{{ $d3->quantity }}</td>
        <td>
          @foreach ($data2 as $d2)
            @if ($d2->id_types_concrete == $d3->id_types_concrete)
              {{ $d2->type_concrete }}
            @endif
          @endforeach
        </td>
        <td>{{ $d3->price }}</td>
        <td>{{ $d3->address }}</td>
        <td>{{ $d3->date_delivery }}</td>        
          @if (@isset($data5))
            @foreach ($data5 as $d5)
              @if($d5->id_order == $d3->id_order)
                @if ($d5->commet_delivery == 1)
                  @php
                    $s = 1;
                  @endphp
                  @else
                  @php
                  $s = 0;
                @endphp
                @endif
              @endif
            @endforeach
          @endif
          <td>
            @if ($s == 1)
              {{ 'تم تسليم الطلب' }}
            @endif
          @if ($d3->re == 0 && $s == 0)
          <a href="{{ route('admin.orders.details',$d3->id_order) }}" class="btn btn-primary"> تفاصيل </a>
          @endif      
        </td>
        <td>
          @if ($d3->re)
            {{ 'تم عمل مردود للطلب' }}
          @endif
          @if ($d3->re == 0 && $s == 0)
        <a href="{{ route('admin.orders.order_re',$d3->id_order) }}" class="btn btn-primary"> مردود طلب </a>
        @endif
      </td>
      <td>
        @if ($d3->re == 0 && $s == 0)
          <a href="{{ route('print.agree_print',$d3->id_order) }}" class="btn btn-primary"> طباعة  </a>
        @endif
      </td>
          </tr>          
        @endforeach
          @endif
        
        
        </tbody>
      </table>
    </div>
  </div>
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






















