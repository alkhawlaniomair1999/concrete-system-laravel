<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>شركة السعيد للخرسانة الجاهزة</title>
        <!-- Favicon-->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('resources/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('assets/admin/imgs/s.jpg') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0" style="direction: rtl ">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.auth.register') }}">التسجيل</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">تسجيل الدخول</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">خدماتنا</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact"> اطلب الان</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" style="background-image: url({{ asset('assets/admin/imgs/R1.jpg') }})">
            <div class="container">
                <div class="masthead-subheading" >اهلا بك في موقع</div>
                <div class="masthead-heading text-uppercase" >{{ $data->name_gen }}</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">المزيد</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">خدماتنا</h2>
                    <h3 class="section-subheading text-muted">نساعدك من الصفر</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                            <img height="300px" width="300px" src="{{ asset('assets/admin/imgs/11.jpg') }}" alt="">
                        <h4 class="my-3">فريق عمل مختص</h4>
                    </div>
                    <div class="col-md-4">
                        <img height="300px" width="300px" src="{{ asset('assets/admin/imgs/12.jpg') }}" alt="">
                    <h4 class="my-3">مراعاة معايير الايزو</h4>
                </div>
                <div class="col-md-4">
                    <img height="300px" width="300px" src="{{ asset('assets/admin/imgs/13.jpg') }}" alt="">
                <h4 class="my-3">معدات عالمية </h4>
            </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">من نحن</h2>
                    <h3 class="section-subheading text-muted">{{ $data->name_gen }}</h3>
                

                <p >تعد شركة السعيد للخرسانة الجاهزة شريك موثوق لمشروعاتك و أعمالك و أن الانضباط و الالتزام و المرونة هي اهم ما تتميز به الشركة لتقديم أفضل المنتجات و الخدمات</p>
                <p>ففي عام 1996 نشأت (شركة السعيد للخرسانة الجاهزة) هدفها في المساهمة الفعالة في النهضة الحضارية و العمرانية التي تشهدها البلاد</p>
                <p>ما نتميز به من شفافية و مصداقية اثمرت في احتفاظ الشركة بقائمة مميزة من شركاء النجاح الذين استمروا عملاء للشركة منذ تأسيسها و قيم خدمة العملاء و مساهمتنا في المشاركة المجتمعية و البيئة و تحقيق القائدة المشتركة لجميع أطراف العمل</p>
            </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('admin.auth.register') }}">اطلب الان</a>
                </div>
                
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('resources/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
