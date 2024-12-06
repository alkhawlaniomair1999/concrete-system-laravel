
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
  <div class="row">
    <a href="{{ route('admin.logout') }}" class="btn btn-danger" style="margin-right: 30px;margin-top: 10px">تسجيل الخروج</a> 
    <a href="{{ route('admin.user_order') }}" class="btn btn-info" style="margin-right: 30px;margin-top: 10px"> اضافة طلب</a> 
  
  </div>
  </header>

  @if (@isset($data))
  <div class="card" style="margin: 30px;display:inline-flex">
    <div class="card-header">
      <h3 class="card-title" style="float: right">عرض تفاصيل الطلب رقم: </h3>
      <p>{{ $id }}</p>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example" class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
          <th>رقم الجزء</th>
          <th>الكمية </th>
          <th>وقت الخروج</th>
          <th>وقت الاستلام</th>
          <th>تأكيد الاستلام</th>
        </tr>
        </thead>
        <tbody>
          @if (@isset($data))
          @foreach ( $data as $d )
          <tr>
        <td>{{ $d->id_part }}</td>
        <td>
        {{ $d->quantity_part }}
          </td>
        <td>
          @if ($d->date_exit != null)
          {{ $d->date_exit }}
          @else
          لم يتم تحديد وقت الخروج 
          @endif
          
        </td>
        <td>
          @if ($d->commet_delivery == true)
          {{ $d->updated_at }}
          @else
          لم يتم التسليم
          @endif
        </td>
        <td> 
          @if ($d->commet_delivery == false && $d->id_emp != null)
            <a href="{{ route('admin.commet',$d->id_part) }}" class="btn btn-primary">تأكيد الاستلام</a>
          @elseif ($d->commet_delivery == true)
            تم الاستلام
            @else
            لم يتم تحديد كافة تفاصيل الجزء
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
