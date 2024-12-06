@extends('layouts.admin')
@section('title')
     المخزون
@endsection
@section('contentheader')
     المخزون
    <a href="{{route('admin.inventory')}}" class="btn btn-primary">خروج</a>
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
              {{ $data3->name_gen }}
            </strong>
            <address style="font-size: 20px">
              <strong>
                {{ $data3->address_gen }}
              </strong>
              <br>
              {{ $data3->coun_gen }}
            </address>
          </div>
          <div class="col-2"><img class="img-fluid mb-2" src="{{ ( asset('assets/admin/imgs').'/'.$data3->logo_gen )}}" alt="الشعار" >
          </div>
        </div>
  
            <hr>
            <div class="row"></div>
            <div class="col"><h3>تقرير المخزون </h3></div>
            <div class="col"></div>
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>م</th>
                          <th>اسم المخزن</th>
                          <th> اسم الصنف</th>
                          <th>الكمية</th>
                        </tr>
                    </thead>
                @php
                    $i=1;
                @endphp
                <tbody>
                  @foreach ($data as $d)
          
       
       
                  <tr>
                    <td>
                      {{$i  }}
                    </td>
                    <td>
                        @foreach ($data1 as $d1)
                            @if ($d1->id_store == $d->id_store)
                                {{ $d1->name_store }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                      @foreach ($data2 as $d2 )
                        @if($d2->id_item == $d->id_item)
                        {{ $d2->name_item }}
                        @endif
                      @endforeach
                    </td>
                    <td>{{ $d->quantity }}</td>
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