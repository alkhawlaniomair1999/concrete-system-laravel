@extends('layouts.admin')
@section('title')
    طباعة فاتورة المشتريات 
@endsection
@section('contentheader')
    فواتير المشتريات
    <a href="{{route('admin.invoice')}}" class="btn btn-primary">خروج</a>
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
  
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>رقم الفاتورة:</b><b>{{ $data->id_invoice }}</b>
            <br>
            
            <b>التاريخ:</b> {{ $data->created_at }}<br>
            <b>الدفع:</b> <br>
            <b>رقم الحساب:</b> {{ $data3->id_account }}<br>
            <b>اسم المورد:</b><b>{{ $data3->name_supplier }} </b><br>
            <b> المستخدم:</b><b>{{ $data->created_by }}</b>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    <hr>
        <!-- Table row -->
        <div class="row">
          <div class="col"></div>
          <div class="col"><h3>فاتورة مشتريات</h3></div>
          <div class="col"></div>
          <div class="col-12 table-responsive">
            
            <table class="table table-striped">
              <thead>
              <tr>
                <th>م</th>
                <th>رقم الصنف</th>
                <th> اسم الصنف</th>
                <th>الكمية</th>
                <th>الاجمالي</th>
              </tr>
              </thead>
              @php
                $i=1;
              @endphp
              <tbody>
                @if(@isset($data4)&&@isset($data5))

                @foreach ($data4 as $d)
                  
               
               
              <tr>
                <td>
                  {{$i  }}
                </td>
                <td>{{ $d->id_item }}</td>
                <td>
                  @foreach ($data5 as $d1 )
                    @if($d1->id_item == $d->id_item)
                    {{ $d1->name_item }}
                    @endif
                  @endforeach
                </td>
                <td>{{ $d->quantity }}</td>
                <td>{{ $d->total }}</td>
              </tr>

              @php
                 $i++;
               @endphp
              @endforeach
              @endif
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    
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
                <p>طبع بواسطة:</p><p>{{ $data->created_by }}</p></div>
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




















