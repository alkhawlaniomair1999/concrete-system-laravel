@extends('layouts.admin')
@section('title')
    طباعة فاتورة المشتريات 
@endsection
@section('contentheader')
    فواتير المشتريات
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
          <div class="col"><h3>دليل الحسابات </h3></div>
          <div class="col"></div>
          <div class="col-12 table-responsive">
            
            <table class="table table-striped">
              <thead>
              <tr>
                <th>م</th>
                <th> رقم الحساب</th>
                <th> اسم الحساب</th>
                <th> نوع الحساب </th>
                <th>مدين</th>
                <th>دائن</th>
              </tr>
              </thead>
              @php
                $i=1;
              @endphp
              <tbody>
                @if(@isset($data))

                @foreach ($data as $d)
                  
               
               
              <tr>
                <td>
                  {{$i  }}
                </td>
                <td>{{ $d->id_account }}</td>
                <td>
                  {{ $d->name_account }}
                </td>
                <td>{{ $d->type_account }}</td>
                <td>{{ $d->debtor }}</td>
                <td>{{ $d->creditor }}</td>
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




















