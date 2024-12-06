@extends('layouts.admin')
@section('title')
الحسابات
@endsection
@section('contentheader')
     طباعة سند
    <a href="{{route('admin.rec')}}" class="btn btn-primary">خروج</a>
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
          <div class="col-2">            <img src="{{ asset('assets/admin/imgs/logo.jpeg') }}" class="img-fluid mb-2" > 
          </div>
          
          
          </div>
          <!-- /.col -->
        
        <!-- info row -->
        
          <!-- /.col -->
          
        <!-- /.row -->
    <hr>
        <!-- Table row -->
        <div class="row">
          <div class="col"></div>
          <div class="col"><h3> {{ $data->type_rec }}</h3></div>
          <div class="col"></div>
          <div class="col-12 table-responsive">
            
            <table class="table table-striped" style="font-size: 20px">
              <thead>
              <tr>
                
                <th>رقم السند:{{ $data->id_rec}}</th>
                <th> المبلغ :{{ $data->total }} </th>
                <th>التاريخ:{{ $data->created_at }}</th>
                <th>المستخدم:{{ $data->created_by }}</th>
              </tr>
              </thead>
             
              
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    
        
          <!-- /.col -->
          <div class="col-6">
           
    @php
      $i=0;
    @endphp
            <div class="table-responsive">
              <table class="table"style="font-size: 25px" >
               @foreach ($data4 as $d1)
                 @if ($i==0)
                 <tr>
                  <th>من حساب:</th>
                  <td>
                    @foreach ($data3 as $d3 )
                    @if ($d3->id_account==$d1->id_account)
                      {{ $d3->name_account }}
                    @endif
                    @endforeach
                  </td>
                </tr>
                 @else
                 <tr>
                  <th style="width:50%">إلى حساب  :</th>
                  <td>
                    @foreach ($data3 as $d3 )
                    @if ($d3->id_account==$d1->id_account)
                      {{ $d3->name_account }}
                    @endif
                    @endforeach
                  </td>
                </tr>
                 @endif
                 @php
                   $i++;
                 @endphp
               @endforeach
               
              </table>
            </div>
          </div>
          <div class="col-10">
            <div class="table-responsive">
              <table class="table"style="font-size: 25px">
                <tr>
                  <th>التفاصيل:</th>
                  <td>{{ $data->details }}</td>
                
                </tr>
              </div>
              </table>
            </div>
          </div>
          <hr>
            <div class="col-12 table-responsive">
            
              <table class="table table-striped">
                <thead>
                <tr>
                  
                  <th> المستلم:ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</th>
                  <th>التوقيع:ــــــــــــــــــــــــــــــ</th>
                  <th>الحسابات:ــــــــــــــــــــــــــــ</th>
                  <th></th>
                  <th>طبع بواسطة:{{ auth()->user()->username }}</th>
                </tr>
                </thead>
               
                
              </table>
            </div>



              
                
             
              
              
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
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




















