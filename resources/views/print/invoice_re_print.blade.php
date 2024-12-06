@extends('layouts.admin')
@section('title')
    طباعة فاتورة مردود المشتريات 
@endsection
@section('contentheader')
    فواتير مردود المشتريات
    <a href="{{route('admin.invoice_re')}}" class="btn btn-primary">خروج</a>
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
          <div class="col-6" style="font-size: 30px">
            <strong>
              {{ $data2->name_gen }}
            </strong>
            <address style="font-size: 20px">
              <strong>
                {{ $data2->address_gen }}
              </strong>
              <br>
              {{ $data2->coun_gen }}
            </address>
          </div>
          <div class="col-2"><img class="img-fluid mb-2" src="{{ ( asset('assets/admin/imgs').'/'.$data2->logo_gen )}}" alt="الشعار" >
          </div>
        </div>
  
    <hr>
        <!-- Table row -->
        <div class="row">
          <div class="col"></div>
          <div class="col"><h3>فاتورة مردرو مشتريات</h3></div>
          <div class="col"></div>
          <div class="col-12 table-responsive">
            
            <div class="row-sm-4 invoice-row">
              <table class="table table-striped">
              <th>رقم مردود المشتريات:</th><td>{{ $data->id_invoice_re }}</td>
              <th>التاريخ:</th><td> {{ $data->created_at }}</td>
              <th>اسم الحساب:</th> 
              <td>{{ $data6->name_account }}</td>
              <th> المستخدم:</th><td>{{ $data->created_by }}</td>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="col-12 table-responsive">
            
          <table class="table table-striped">
            <thead>
            <tr>
              <th>م</th>
              <th>رقم الصنف</th>
              <th> اسم الصنف</th>
              <th>السعر</th>
              <th>الكمية</th>
              <th>الاجمالي</th>
            </tr>
            </thead>
            @php
              $i=1;
            @endphp
            <tbody>

              @foreach ($data5 as $d)
                
             
             
            <tr>
              <td>
                {{$i  }}
              </td>
              <td>{{ $d->id_item }}</td>
              <td>
                @foreach ($data4 as $d1 )
                  @if($d1->id_item == $d->id_item)
                  {{ $d1->name_item }}
                  @endif
                @endforeach
              </td>
              <td>{{ $d->price }}</td>
              <td>{{ $d->quantity }}</td>
              <td>{{ $d->total }}</td>
            </tr>

            @php
               $i++;
             @endphp
            @endforeach
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
        <hr style="size:100px" color="black">
          <!-- /.col -->
          <div class="col-6">
           
    
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">الاجمالي:</th>
                  <td>{{ $data->total_invoice }}</td>
                </tr>
                
                <tr>
                  <th>الخصم:</th>
                  <td>0.0</td>
                </tr>
                <tr>
                  <th>الاجمالي :</th>
                  <td>{{ $data->total_invoice }}</td>
                </tr>
              </table>
            </div>
            
              
                <div class="row">
                <p>طبع بواسطة:</p><p>{{ auth()->user()->username }}</p></div>
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




















