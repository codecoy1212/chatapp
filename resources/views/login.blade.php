<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{asset('assets/dist/logo3.png')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Code Coy">
    <meta name="keywords" content="Code Coy">
    <meta name="author" content="LEFT4CODE">
    <title>Login - WatsApp Admin</title>
    <!-- BEGIN: CSS Assets-->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/dist/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/dist/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets/dist/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/dist/css/argon-dashboard.css?v=2.0.2')}}" rel="stylesheet" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login" style="background-image: url({{asset('assets/dist/loginscr.png')}}); background-size: cover;">
    <main class="main-content  mt-3">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column  mx-auto ">
                            <div class="card card-plain">
                                <div  style="margin-left: 120px;" id="logo" ><img src="{{asset('assets/dist/logo3.png')}}" width="170"
                                    height="160" /></div>

                              
                                <!-- Session Status -->

                              <div id="login">

        </div>

                            </div>
                          
                           
                        </div>
                    </div>
                </div>
            </div>`
            </div>
        </section>
    </main>
    
@vite('resources/js/login.js')
    <script src="{{asset('assets/dist/js/app.js')}}"></script>
    
 
    <!-- END: JS Assets-->
</body>

</html>