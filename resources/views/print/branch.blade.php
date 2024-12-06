@extends('layouts.admin')
@section('title')
    الفروع
@endsection
@section('contentheader')
    الفروع
    <a href="{{route('admin.init_branch')}}" class="btn btn-primary">خروج</a>
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
    <section class="invoice">
      <div class="row">
        <div class="col-6" style="font-size: 30px">
          <strong>
            {{ $data->name_gen }}
          </strong>
          <address style="font-size: 20px">
            <strong>
              {{ $data->address_gen }}
            </strong>
            <br>
            {{ $data->coun_gen }}
          </address>
        </div>
        <div class="col-2"><img class="img-fluid mb-2" src="{{ ( asset('assets/admin/imgs').'/'.$data->logo_gen )}}" alt="الشعار" >
        </div>
      </div>

    
         
              
        
            <hr>
            <div class="row"></div>
            <div class="col"><h3>تقرير بيانات الفروع </h3></div>
            <div class="col"></div>
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>رقم الفرع</th>
                            <th>اسم الفرع</th>
                            <th>المدير</th>
                        </tr>
                    </thead>
                @php
                    $i=1;
                @endphp
                <tbody>
                
                    @foreach ($data1 as $d )
                    <tr>
                        <td> {{ $d->id_branch }}</td>
                        <td>{{ $d->name_branch }}</td>
                        <td>{{ $d->manager }}</td>
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