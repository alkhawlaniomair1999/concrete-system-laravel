@extends('layouts.admin')
@section('title')
     الحسابات
@endsection
@section('contentheader')
     طباعة كشف حساب  
    <a href="{{route('admin.init_account')}}" class="btn btn-primary">خروج</a>
    <button class="btn btn-primary" onclick="window.print();">طباعة</button>
   
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}"> الرئيسية</a>
@endsection
@section('contentheaderactive')

@endsection
@section('content')
<!--onload="window.print();-->
<body style="padding:,width:297mm ,hight:297mm important ">
    <div class="wrapper" style="">
      <!-- Main content -->
      <section class="invoice" >
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
          <div class="col-12 table-responsive">
            
            <table class="table table-striped" style="font-size:25px " >
              <thead>
                
                  
              <tr>
                <th>اسم الحساب:{{ $data->name_account }}</th>
                <th>رقم الحساب:{{ $data->id_account }}</th>
                <th>نوع الحساب :{{ $data->type_account }}</th>

                
                
              </tr>
              </thead>
            </table>
          </div>
          
          <div class="col-12 table-responsive">
            
            <table class="table table-striped" style="font-size:25px " border="2">
              <thead>
                
                  
              <tr>
                <th>التاريخ</th>
                <th>العملية</th>

                <th> التفاصيل </th>
                <th> مدين </th>
                <th> دائن  </th>
                <th>الرصيد</th>
                
              </tr>
              </thead>
              @php
                $i=1;
              @endphp
              <tbody border="1" >
                @if(@isset($data1))

                @foreach ($data1 as $d)
                  
               
               
              <tr>
                <td>
                  {{$d->created_at}}
                </td>
                <td>
                  {{$d->proc_type}}
                </td>
                <td>
                  {{ $d->details }}:{{ $d->id_proc }}
                </td>
                <td>{{ $d->debtor }}</td>
                <td>{{ $d->creditor }}</td>
                <td>{{ $d->total}}</td>
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
        <div class="col-12 table-responsive">
            
          <table class="table table-striped" style="font-size:25px " >
            <thead>
              
                
            <tr>
              @php
                $s =  $data->debtor-$data->creditor
              @endphp
              <th>إجمالي مدين :{{ $data->debtor }}</th>
              <th>إجمالي دائن :{{ $data->creditor }}</th>
              <th>الرصيد  :
                @if ($s >=0 )
                عليكم: 
                @else
                 لكم: 
              @endif
                {{ $data->debtor-$data->creditor  }}
               
              </th>
             
              
            </tr>
            </thead>
          </table>
        </div>





        <hr style="size:100px" color="black">
          <!-- /.col -->
          
            
              
                
              
              
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




















