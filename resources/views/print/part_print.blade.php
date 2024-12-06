@extends('layouts.admin')
@section('title')
الحسابات
@endsection
@section('contentheader')
     طباعة سند
    <a href="{{route('admin.orders.details',$data->id_order)}}" class="btn btn-primary">خروج</a>
    <button class="btn btn-primary" onclick="window.print();">طباعة</button>
   
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}"> الرئيسية</a>
@endsection
@section('contentheaderactive')

@endsection
@section('content')
<!--onload="window.print();-->
<body>
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
          <div class="col-2"><img src="{{ asset('assets/admin/imgs/s.jpg') }}" class="img-fluid mb-2" > 
          </div>

        </div>
        <hr>

         <div class="row">
            <div class="col"></div>
           <div class="col-5"><h3> أمر تسليم خلطة خرسانية جاهزة </h3></div>
           <div class="col"></div>
         </div>
        <hr>
        <div class="col-12 table-responsive">
            
          <table class="table table-striped" border="2">
            <thead>
            <tr>
              <th>التاريخ:{{ $data->date_delivery }}</th>
              <th>  وقت الاعداد   </th>
              <th> رقم الطلب: {{ $data->id_order }} </th>
              <th>    رقم الجزء: {{ $data4->id_part }} </th>
              
              
            </tr>
            </thead>
          </table>
        </div>
        

          <div class="col-12 table-responsive">
            
            <table class="table table-striped" border="2">
              <thead>
              <tr>
                <th>اسم الجهة الطالبة</th>
                <th>  اسم المخول بالاستلام   </th>
                <th> منطقة التسليم(عنوان موقع الصب)</th>
                
              </tr>
              </thead>
             <tbody>
              <tr>
                <th>{{ $data2->name_customer }}</th>
                <th></th>
                <th>{{ $data->address}}</th>
                



              </tr>



             </tbody>
            </table>
            
          </div>
          <div class="row">
            <div class="col"></div>
           <div class="col"><h3> تفاصيل كميات الطلب   </h3></div>
           <div class="col"></div>
         </div>

        <div class="col-12 table-responsive">
            
          <table class="table table-striped" border="2">
            @php
              $i=0;
            @endphp
            @foreach ($data3 as $d)
              @if ($d->id_part < $data4->id_part)
                @php
                  $i++;
                @endphp
              @endif
            @endforeach
            <thead>
            <tr>
              <th>حجم الطلب (متر مكعب) </th>
              <th>  المسلم السابق     </th>
              <th> الحالي</th>
              <th>الاجمالي</th>
              <th>الباقي</th>

            </tr>
            </thead>
           <tbody>
            <tr>
              <th>{{ $data->quantity }}</th>
              <th>{{ $i*8 }}</th>
              <th>{{ $data4->quantity_part }}</th>
              <th>{{ ($i*8)+$data4->quantity_part }}</th>
              <th>{{ $data->quantity-(($i*8)+$data4->quantity_part) }}</th>



            </tr>



           </tbody>
          </table>
          
        </div>


        <div class="col-12 table-responsive">
            
          <table class="table table-striped" border="2">
            <thead>
            <tr>
              <th>رقم الشاحنه   </th>
              <th>   السائق     </th>
              <th> مشغل الخلاطة</th>
              <th>مسؤول الوحده الانتاجية</th>
              <th>المراجع</th>
              <th>مراقب البوابة</th>

            </tr>
            </thead>
           <tbody>
            <tr>
              <th>
                @foreach ($data5 as $d2)
                @if ($d2->id_track == $data4->id_track)
                  {{ $d2->id_board }}
                @endif                  
                @endforeach
              </th>
              <th>الاسم/...........</th>
              <th>الاسم/...........</th>
              <th>الاسم/...........</th>
              <th>الاسم/...........</th>
              <th>الاسم/...........</th>


            </tr>
            <tr>
              <th></th>
              <th>التوقيع</th>
              <th>التوقيع</th>
              <th>التوقيع</th>
              <th>التوقيع</th>
              <th>التوقيع</th>


            </tr>


           </tbody>
          </table>
          
        </div>
        <div class="row">
          <div class="col"></div>
         <div class="col"><h3>   ..سند استلام..   </h3></div>
         <div class="col"></div>
       </div>
       <hr>
       <div class="col" style="font-size: 18px">
        <p>استلمت الخلطة الخرسانيةالجاهزة بحسب المواصفات المطلوبة:الكمية رقم(..........................     )كتابة...............................................................</p>
      <p> اسم المستلم:................................................................التوقيع:........................</p>
      <p>التاريخ/...................................... وقت الاستلام/...............................</p>
      </div>
          </div>
          
            <hr>
      
<br><br><br><br><br>
 
      

        

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




















