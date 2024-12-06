
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>الطلبات</title>
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/fonts/SansPro/SansPro.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/mycustomstyle.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2-bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2.min.css')}}">

</head>
<body>
  @include('admin.include.success')
<header>
  <a href="{{ route('admin.logout') }}" class="btn btn-danger" style="margin-right: 30px;margin-top: 10px">تسجيل الخروج</a> 
  <a href="{{ route('admin.user_order') }}" class="btn btn-info" style="margin-right: 30px;margin-top: 10px"> اضافة طلب</a> 
</header>

  <div class="card" style="margin: 30px;display:inline-flex" >
    <div class="card-header" >
      <h3 class="card-title" style="float: right">عرض بيانات الطلبات الغير مؤكدة</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped" >
        <thead class="table-dark" >
        <tr>
          <th>رقم الطلب</th>
          <th>الكمية </th>
          <th>نوع الخرسانة</th>
          <th>العنوان</th>
          <th>السعر</th>
          <th>التأكيد</th>
        </tr>
        </thead>
        @php
          $s = 0;
        @endphp
        <tbody>
          @if (@isset($data1))
          @foreach ( $data1 as $d1 )
          <tr>
        <td>{{ $d1->id_temp_order }}</td>
        <td>
        {{ $d1->quantity }}
          </td>
        <td>
          @foreach ($data4 as $d4)
            @if ($d4->id_types_concrete == $d1->id_types_concrete)
              {{ $d4->type_concrete }}
              @php
                $i = $d4->price;
              @endphp
            @endif
          @endforeach
        </td>
        <td>{{ $d1->address }}</td>
       <td> {{ ($i*$d1->quantity) }} </td>
      <td>
          <a href="{{ route('admin.contact') }}" class="btn btn-primary"> تأكيد الطلب  </a>
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
  <div class="card" style="margin: 30px;display:inline-flex">
    <div class="card-header">
      <h3 class="card-title" style="float: right">عرض بيانات الطلبات المؤكدة</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>رقم الطلب</th>
          <th>الكمية </th>
          <th>نوع الخرسانة</th>
          <th>العنوان</th>
          <th>السعر</th>
          <th>تاريخ التسليم</th>
          <th>التفاصيل</th>
        </tr>
        </thead>
        <tbody>
          @if (@isset($data3))
          @foreach ( $data3 as $d3 )
          <tr>
        <td>{{ $d3->id_order }}</td>
        <td>
        {{ $d3->quantity }}
          </td>
        <td>
          @foreach ($data4 as $d4)
            @if ($d4->id_types_concrete == $d3->id_types_concrete)
              {{ $d4->type_concrete }}
            @endif
          @endforeach
        </td>
        <td>{{ $d3->address }}</td>
        <td>{{ $d3->price }}</td>
        <td>{{ $d3->date_delivery }}</td>
        <td> <a href="{{ route('admin.my_det_order',$d3->id_order) }}" class="btn btn-primary"> تفاصيل الطلب   </a></td>
          </tr>          
        @endforeach
        
        </tbody>
      </table>
    </div>
  </div>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endif














<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/amin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/table.js')}}"></script>

</body>
</html>
