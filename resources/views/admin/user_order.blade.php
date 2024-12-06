
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

  <a href="{{ route('admin.logout') }}" class="btn btn-danger" style="margin-right: 30px;margin-top: 10px">تسجيل الخروج</a> 
<div class="card card-secondary" style="margin: 30px">
  <div class="card-header" >
    <h3 class="card-title" style="float: right;margin-right: 20px"> اضافة طلب</h3>
  </div>
  <form action="{{route('admin.user_order.insert')}}" method="POST">
    @csrf
  <div class="card-body">
    <div class="row">
    <div class="col">
      <div class="col-md-4">
        <div class="form-group">
          @php
            $i = 0;
          @endphp       
          <label>نوع الخرسانة</label>
          <select class="form-control" name="id_types_concrete" id="select2">
            @if (@isset($data))
            @foreach ($data as $d)
            <option value="{{$d->id_types_concrete}}">النوع: {{$d->type_concrete}} - السعر للمتر المكعب: {{ $d->price }}</option>      
            @endforeach
            @endif  
          </select>       
      </div>
        </div>
  
      <div class="col-md-4">
          <label for="exampleInputEmail1">الكمية بالمتر المكعب</label>
        <input type="number" class="form-control" name="quantity"  placeholder="الكمية بالمتر المكعب" required >
      </div>
      <div class="col-md-4">
        <label for="exampleInputEmail1">العنوان</label>
      <input type="text" class="form-control" name="address"  placeholder="العنوان" required >
    </div>

    </div>
  </div>
</div>
  <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-right: 20px">تأكيد</button>
        
    </div>
  
  </form>
 
  <!-- /.card-body -->
</div>

  <a href="{{ route('admin.mytemp_order') }}" class="btn btn-info" style="margin-right: 30px">طلباتي  </a>
  <a href="{{ route('print.acc_det_print',$data2->id_account) }}" class="btn btn-success swalDefaultSuccess">كشف الحساب</a>

















<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/amin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/table.js')}}"></script>

</body>
</html>
