@extends('layouts.admin')
@section('title')
    الحسابات
@endsection
@section('contentheader')
    الحسابات
@endsection
@section('contentheaderlink')
    <a href=" {{route('admin.dashboard')}}">الرئيسية</a>
@endsection
@section('contentheaderactive')
عرض
@endsection
@section('content')


<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title" style="float: right">تعـــــديل حساب </h3>
    </div>
    <form action="{{route('admin.init_account.edit',$data1->id_account)}}" method="POST">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-5">
            <label for="exampleInputEmail1">اسم الحساب</label>
          <input type="text" value="{{ $data1->name_account }}" class="form-control" name="name_account"  placeholder="اسم الحساب" required >
        </div>

        <div class="form-group">
            <label>نوع الحساب</label>
            <select class="form-control" name="type_account">
              <option> مورد</option>
              <option> عميل</option>
              <option> موظف</option>
              <option> صندوق</option>
              <option> بنك</option>
            </select>
        </div>


      </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success swalDefaultSuccess">إضافة</button>
      </div>

    </form>
    <!-- /.card-body -->
  </div>



  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          type: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          type: 'info',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          type: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          type: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          type: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
  
      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
    });
  
  </script>













@endsection






















