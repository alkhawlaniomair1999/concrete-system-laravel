@extends('layouts.admin')
@section('title')
    الموظفين
@endsection
@section('contentheader')
    الموظفين
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
            <div class="col"><h3>تقرير بيانات الموظفين </h3></div>
            <div class="col"></div>
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                         
                            <th>رقم الموظف</th>
                            <th>اسم الموضف</th>
                            <th>العنوان </th>
                            <th>اسم القسم</th>
                            <th>اسم الحساب</th>
                            <th>رقم الجوال</th>
                            <th> الهوية</th>
                            <th> الراتب</th>
                        </tr>
                
                    </thead>
                @php
                    $i=1;
                @endphp
                <tbody>
                
                    @foreach ($data1 as $d )
                    <tr>
                        <td> {{ $d->id_emp }}</td>
                        <td>{{ $d->name_emp}}</td>
                        <td>{{ $d->address  }}</td>
                        <td>
                            @foreach ($data as $d2)
                            @if ($d2->id_dept == $d->id_dept)
                            {{ $d2->name_dept }}
                            </td> 
                            @endif
                            
                            @endforeach
                            <td>
                                @foreach ($data2 as $d2)
                                @if ($d2->id_account == $d->id_account)
                                {{ $d2->name_account }}</td> 
                                @endif
                                
                                @endforeach
                        <td>{{ $d->phone_emp  }}</td>
                        <td>{{ $d->personal_id  }}</td>
                        <td>{{ $d->salary  }}</td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                        
                    @endforeach
                        
                
                </tbody>
                </table>
            </div>
            <hr style="size:100px" color="black">
            <div class="col-6">
            </div>
        </section>
    </dive>
</body>
<script src="{{ asset('asset/tables/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('asset/tables/js/datatables.min.js') }}"></script>
<script src="{{ asset('asset/tables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('asset/tables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/tables/js/assets/js/custom.js') }}"></script>
<script src="{{ asset('asset/tables/js/bootstrap.bunle.min.js') }}"></script>
@endsection