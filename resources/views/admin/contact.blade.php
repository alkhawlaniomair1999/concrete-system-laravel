
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
<body style="background-image:url('{{ asset('assets/admin/imgs/c2.jpg') }}');">
  @include('admin.include.success')
  <header>
    <div class="row">
      <a href="{{ route('admin.logout') }}" class="btn btn-danger" style="margin-right: 50px;margin-top: 10px">تسجيل الخروج</a> 
      <a href="{{ route('admin.user_order') }}" class="btn btn-info" style="margin-right: 30px;margin-top: 10px"> اضافة طلب</a>    
    </div>
    </header>
  <section class="page-section" id="services" style="margin-top: 30px">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">تواصل معنا</h2>
            <h3 class="section-subheading text-muted">لتأكيد طلبك يرجى التواصل معنا عبر القنوات التالية</h3>
        </div>
        <div class="row text-center" >
          
            <div class="col-md-2">
                <span class="fa-stack fa-4x">
                  <a href="https://wa.me/967779893520"><i class="fab fa-whatsapp"></i></a>                   
                </span>
                <h4 class="my-3">واتساب</h4>
            </div>
            <div class="col-md-2">
                <span class="fa-stack fa-4x">
                  <a href="https://www.facebook.com/ya7yd"><i class="fab fa-facebook-f"></i>
                  </a>
                </span>
                <h4 class="my-3">فيسبوك</h4>
            </div>
            <div class="col-md-2" >
                <span class="fa-stack fa-4x">
                  <a href="https://www.instagram.com/ya7yd"><i class="fab fa-instagram"></i>
                  </a>
                </span>
                <h4 class="my-3">انستجرام</h4>
            </div>
        </div>
        <div class="text-center">
          <h3 class="section-subheading text-muted">او يمكنك الاتصال على الرقم التالي: 967779893520+</h3>
      </div>
    </div>
</section>


<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/amin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/table.js')}}"></script>

</body>
</html>
