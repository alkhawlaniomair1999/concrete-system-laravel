@extends('layouts.admin')
@section('title')
    الرئيسية
@endsection
@section('contentheader')
    الرئيسية
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')
@php
  $s=0;
  $a=0;
@endphp
@foreach ($data as $d3)
@if (@isset($data5))
@foreach ($data5 as $d5)
  @if($d5->id_order == $d3->id_order)
    @if ($d5->commet_delivery == 1)
      @php
        $s = 1;
      @endphp
      @else
      @php
      $s = 0;
    @endphp
    @endif
  @endif
@endforeach
@endif
@if ($s == 0 && $d3->re == 0)
  @php
    $a++;
  @endphp
@endif
@endforeach

<div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <p>عدد الطلبات</p>
              @php
                $i=0;
              @endphp
              @foreach ($data as $d)
                @php
                  $i++;
                @endphp
              @endforeach
              <h3>{{ $i }}</h3>

              
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.orders') }}" class="small-box-footer">مزيد من المعلومات <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <p>عدد العملاء</p>
              @php
                $j=0;
              @endphp
              @foreach ($data1 as $d1)
                @php
                  $j++;
                @endphp
              @endforeach
              <h3>{{ $j }}</h3>

            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.init_customer') }}" class="small-box-footer">مزيد من المعلومات <i class="fas fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <p> عدد الطلبات غير المسلمة</p>
              <h3>{{ $a }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.orders') }}" class="small-box-footer">مزيد من المعلومات<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-12">
              <div class="data_table">
     <table id="example1" class="table table-striped table-bordered">
        <legend><p>عرض بيانات المخزون</p></legend>
       <thead class="">
           <tr>
                <th>م</th>
                <th>اسم المخزن</th>
                <th> اسم الصنف</th>
                <th>الكمية</th>
           </tr>
       </thead>
       @php
       $k=1;
     @endphp
       <tbody>
        @foreach ($data2 as $d)
      <tr>
        <td>
          {{$k  }}
        </td>
        <td>
            @foreach ($data3 as $d1)
                @if ($d1->id_store == $d->id_store)
                    {{ $d1->name_store }}
                @endif
            @endforeach
        </td>
        <td>
          @foreach ($data4 as $d2 )
            @if($d2->id_item == $d->id_item)
            {{ $d2->name_item }}
            @endif
          @endforeach
        </td>
        <td>{{ $d->quantity }}</td>
      </tr>

      @php
         $k++;
       @endphp
      @endforeach
       </tbody>
     </table>
              </div>
            </div>
        </div>
    </div>
   </div>
 <!-- /.card-body -->
  </div>




    
@endsection
