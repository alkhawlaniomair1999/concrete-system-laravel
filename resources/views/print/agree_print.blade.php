@extends('layouts.admin')
@section('title')
الحسابات
@endsection
@section('contentheader')
     طباعة سند
    <a href="{{route('admin.orders')}}" class="btn btn-primary">خروج</a>
    <button class="btn btn-primary" onclick="window.print();">طباعة</button>
   
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}"> الرئيسية</a>
@endsection
@section('contentheaderactive')

@endsection
@section('content')
<!--onload="window.print();-->
<body >
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-7" style="font-size: 30px"><strong> شركة السعيد لتصنيع الخرسانة الجاهزة</strong>
            <address style="font-size: 20px">
              <strong>فرع إب</strong><br>
              اليمن-إب_شارع 24 المتفرع من شارع تعز<br>
              تلفون:772905871<br>
              
              Email: info@almasaeedstudio.com
            </address>
          </div>
          <div class="col-2"><img src="{{ asset('assets/admin/imgs/logo.jpeg') }}" class="img-fluid mb-2" > 
          </div>

        </div>
        <hr>

         <div class="row">
            <div class="col"></div>
           <div class="col"><h3>عقد بيع خرسانة</h3></div>
           <div class="col"></div>
         </div>
        <hr>



        <div class="row">
          <div class="col-12" style="font-size: 20px">


          
           <p>إنه في يوم ............. الموافق {{ $data->created_at }}  تم الاتفاق بين كل من :</p>
           <p> الطرف الأول/شركة السعيد لتصنيع الخرسانة والمقاولات ويمثلها الأخ/مدير الوحدة الإنتاجية......................</p>
           <p>الطرف الثاني:{{ $data2->name_customer }}</p>
           <p>  نوع المنشأة المطلوب صبها.....................................               </p>
           <p>موقع الصب/........................</p>
           <p>تاريخ الصب:{{ $data->date_delivery }}</p>
          </div>

          <div class="col-12 table-responsive">
            
            <table class="table table-striped" border="2">
              <thead>
              <tr>
                <th>كميةالصب</th>
                <th>  المقاومة المطلوبة  </th>
                <th> سعر م3 </th>
                <th> كمية الاسمنت لكل م3  </th>
                <th>إجمالي قيمة الطلب</th>
                
              </tr>
              </thead>
             <tbody>
              <tr>
                <th>{{ $data->quantity }}م3</th>
                <th></th>
                <th>{{ $data->price}}</th>
                <th>{{ $data1->quantity }}</th>
                <th>{{$data->quantity*$data->price  }}</th>




              </tr>



             </tbody>
            </table>
            

          </div>
          </div>
          
            <hr>
      <div class="col">
         <p>1.يحق للطرف الثاني وضع علامات على عينات اختبار التكسير للتأكد من صحتها ومطابقتها اثناء اختبار التكسير  ويجب عى الطرف الثاني ابلاغ الشركة رغبته في حضور اختبارات التكسير قب يوم على موعد التكسير المفترض.</p>
         <p> 2.تنحصر مسئولية الطرف الأاول عن جودة الخرسانة من خلال نتائج اختبارات التكسير التي يجريها في مختبراته أو اختبارات المختبر المحايد بحضور ممثله؛ ولا يكون الطر الأول مسؤؤل عن اية نتائج لاختبارات اخرى مهما كان نوعها ويجب على الطرف الثاني حضور هذه الاختبارات او تعتبر نتائج هذه الاختبارات الناتجة عن مختبر الطرف الاول ملزمة له.</p>
         <p>3.الطرف الأول مسؤول عن توريد كمية الخرسانة المذكورة وعبر مسؤول عن اي اختبارات لم ينص عليها لعقد</p>
        <p>4.فوض الطرف الثاني الاخ /.......................................... باستلام الخرسانة والتعامل معه بصفته ........................</p> 
        <p>5.في حالة عدم تواجد الاشخاث المفوضين بالتوقيع على ايصالات الاستلام في الموقع يعتبر توقيع اي شخص تابع للطرف الثاني بمثابة اقررا من الطرف الثاني بالاستلام .</p>
        <p>6.يلتزم الطرف الثاني باتباع التعليمات الخاصة بالصب ويجب عليه عدم إضافة الماء أو اي مواد اخرى ويتبع الاجاءت االخاصة بتشغيل الخريانة عند الصب وبعده ووفق الاصول والعرف المهني وهو مسؤول مسئولية كاملة عن كل ما ينتج عن عدم اتخاذ هذه الاجراءت.</p>
        <p>7.الطرف الثاني مسؤول عن اصدار اي تراخيص تتعلق باعمال البناء والصب والمرور والبلدية والاشغال او اي اطراف اخرى في موقع الصب فإن الطرف الاول غير مسؤول باي حال من الاحوال عن ذلك؛كم ان الطرف الثاني مسؤول عن اي خسائر تقع للطرف الاول نتيجة عدم وجود هذه التراخيص</p>
        <p>8.لايحق للطرف الثاني أن يطلب من الطرف الاول الصب في المواعيد التي تخالف المسموح بها من الجهات المختصة او في الظرو المناخية السيئة ويكون متحملا المسؤولية الكاملة عن نتائج المواعيد التي يحددها من قبله.</p>
        <hr>
      </div>
<br><br><br><br><br>
 
      <div class="row">
        <div class="col-5">الطرف الأول:.............................. </div>
        <div class="col-3"></div>
        <div class="col-3">الطف الثاني:.................................</div>
      </div>
      <br><br>

        

      </section>
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    </body>



  
   
   <script src="{{asset('assets/tables/js/jquery-3.6.0.min.js')}}"></script>
   <script src="{{asset('assets/tables/js/datatables.min.js')}}"></script>
   <script src="{{asset('assets/tables/js/pdfmake.min.js')}}"></script>
   <script src="{{asset('assets/tables/js/vfs_fonts.js')}}"></script>
   <script src="{{asset('assets/tables/js/assets/js/custom.js')}}"></script>
   <script src="{{asset('assets/tables/js/bootstrap.bundle.min.js')}}"></script>

 
   



@endsection




















