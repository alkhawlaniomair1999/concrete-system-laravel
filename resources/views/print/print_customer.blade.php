@extends('layouts.admin')
@section('title')
    العملاء
@endsection
@section('contentheader')
    العملاء
    <a href="{{route('admin.init_customer')}}" class="btn btn-primary">خروج</a>
    <button class="btn btn-primary" onclick="window.print();">طباعة</button>
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')
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
            <div class="row"></div>
            <div class="col"><h3>تقرير بيانات العملاء </h3></div>
            <div class="col"></div>
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>رقم العميل</th>
                            <th>اسم العميل</th>
                            <th>الهاتف </th>
                            <th>العنوان </th>
                            <th>اسم الحساب</th> 
                        </tr>
                    </thead>
                @php
                    $i=1;
                @endphp
                <tbody>
                
                    @foreach ($data1 as $d )
                    <tr>
                        <td> {{ $d->id_customer }}</td>
                        <td>{{ $d->name_customer}}</td>
                        <td>{{ $d->phone_customer  }}</td>
                        <td>{{ $d->address  }}</td>
                        <td>
                            @foreach ($data as $d2)
                            @if ($d2->id_account == $d->id_account)
                            {{ $d2->name_account }}</td> 
                            @endif
                            
                         @endforeach
                    </tr>
                    
                   @endforeach
                
                </tbody>
                </table>
            </div>
            <hr style="size:100px" color="black">
            <div class="col-6">
            </div>
        </section>
    </div>
</body>
<script src="{{ asset('asset/tables/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('asset/tables/js/datatables.min.js') }}"></script>
<script src="{{ asset('asset/tables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('asset/tables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/tables/js/assets/js/custom.js') }}"></script>
<script src="{{ asset('asset/tables/js/bootstrap.bunle.min.js') }}"></script>
@endsection