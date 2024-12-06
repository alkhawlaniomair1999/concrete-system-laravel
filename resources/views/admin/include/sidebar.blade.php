<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-light">الفرع الرئيسي</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
        </div>
        <div class="info">
          <div class="row">
          <h6 style="color: papayawhip; margin-right: 10px">اسم المستخدم: </h6>
          <h6 style="color: papayawhip; margin-right: 10px;margin-left: 10px">{{ auth()->user()->username }}</h6>
        </div>
      </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          






    <!-- تهيئة النظام-->
    @if (auth()->user()->init_system)
    <li class="nav-item has-treeview" >
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          تهيئة النظام
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.init_gen') }}" class="nav-link">         
            <i class="far fa-circle nav-icon"></i>
            <p> تهيئة عامة</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.init_branch') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> تهيئة الفروع</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.init_dept') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> تهيئة الاقسام</p>
          </a>
        </li>

        
        <li class="nav-item">
          <a href="{{ route('admin.employee') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>تهيئة الموظفين </p>
          </a>
        </li>
        
                
        <li class="nav-item">
          <a href="{{ route('admin.init_tracks') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>  تهيئة الشاحنات </p>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="{{ route('admin.store') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>تهيئة المخازن </p>
          </a>
        </li>
      </ul>
    </li>    
    @endif
   












 <!-- قسم التوريد -->
 @if (auth()->user()->supp)
 <li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>
      التوريد
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.suppliers') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>الموردين</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.init_item')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>الاصناف</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.invoice')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p> فاتورة مشتريات</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.invoice_re')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p> فاتورة مردود مشتريات</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.inventory')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>المخزون</p>
      </a>
    </li>
  </ul>
</li>
 
 @endif
 





<!-- قسم التوريد -->





               <!-- الانتاج -->
               @if (auth()->user()->prod)
               <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    قسم الانتاج 
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
    
    
                  <li class="nav-item">
                    <a href="{{ route('admin.init_customer') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>   تهيئة العملاء </p>
                    </a>
                  </li>
                 
    
                  <li class="nav-item">
                    <a href="{{ route('admin.init_types_concrete') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>  تهيئة انواع الخرسانة</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.orders') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>الطلبات</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.temp_order') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>الطلبات المؤقتة</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.inventory')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>المخزون</p>
                    </a>
                  </li>                  
                  <li class="nav-item">
                    <a href="{{route('admin.edit_invent')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>تسوية مخزنية</p>
                    </a>
                  </li>    
                </ul>
              </li>
         
               @endif
          







          

<!-- الحسابات -->
@if (auth()->user()->acc)
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>
      الحسابات
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.init_account') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p> تهيئة الحسابات</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.rec') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>سند قيد</p>
      </a>
    </li>
  </ul>
</li> 
@endif




@if(auth()->user()->users)     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                المستخدمين
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link" >                
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة مستخدم</p>
                </a>
              </li>
            </ul>
            @endif
          




         



          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>