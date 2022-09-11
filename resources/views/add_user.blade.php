<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <title>WatsApp | Admin</title>
        <link href="{{asset('assets/dist/logo1.png')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
          <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('assets/dist/css/app.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <style>
    .dot {
        height: 15px;
        width: 15px;
        background-color: rgb(41, 190, 21);
        border-radius: 50%;
        display: inline-block;
    }

    .myclass {
        width: 100% !important;
        overflow: auto;
    }
    
@media screen and (max-width: 2000px) {
        .myclass {
        width: 1500px !important;
        
    }
}
@media screen and (max-width: 1800px) {
        .myclass {
        width: 1400px !important;
        
    }
}
@media screen and (max-width: 1600px) {
        .myclass {
        width: 1300px !important;
        
    }
}
@media screen and (max-width: 1400px) {
        .myclass {
        width: 1000px !important;
        
    }
}

@media screen and (max-width: 1100px) {
        .myclass {
        width: 800px !important;
        
    }
}
@media screen and (max-width: 720px) {
        .myclass {
        width: 100% !important;
        
    }
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{ route('admin_dashboard') }}" class="flex mr-auto">
                    <img alt="Admin" class="img-fluid" style="width:50px" src="{{asset('assets/dist/logo2.png')}}">
                    <span class="hidden xl:block text-white text-lg ml-3"> Sarah Smith </span>
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{ route('admin_dashboard') }}" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
               <li>
                        <a href="{{ route('org') }}" class="menu ">
                            <div class="menu__icon"> <i data-feather="users"></i> </div>
                            <div class="menu__title"> Orgnizations </div>
                        </a>
                    </li>
                
                  
                    
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="{{ route('admin_dashboard') }}" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Admin Template" class="img-fluid " style="width:20%;  border-radius: 50%;" src="{{asset('assets/dist/logo2.png')}}">
                    <span class="hidden xl:block text-white text-lg ml-3"> Sarah Smith </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{ route('admin_dashboard') }}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                  <li>
                        <a href="{{route('org')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title"> Orgnizations </div>
                        </a>
                    </li>
                 
                   
                 
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">CMS</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                  
                   
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Admin" src="{{asset('assets/dist/images/profile-2.jpg')}}">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-1 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b border-theme">
                                    <div class="font-medium">Admin</div>
                                   
                                </div>
                                <div class="p-2">
                                    <!--<a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>-->
            
                                    <!--<a href="change-password.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>-->
                                    <!--<a href="web-setting.php" class="flex items-center blok p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>-->
                                   
                                </div>
                                <div class="">
                                    <a href="{{route('logout')}}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>

<style>
    .dot {
        height: 15px;
        width: 15px;
        background-color: rgb(41, 190, 21);
        border-radius: 50%;
        display: inline-block;
    }
</style>

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto ml-2" >
        {{(isset($id))? 'Update User' : 'Add New User'}}
       
    </h2>
    
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

    </div>
</div>
<!-- ==============================ADD Category Modal============================================ -->

<!-- BEGIN: Datatable -->
<input id="orgid" type="hidden" value="{{(isset($id) && $id!='')? $id : ''}}">
    
<div class="intro-y  box p-5 mt-5 myclass" id="app"></div>
   


<!-- END: Datatable -->

<div class="modal" id="addmodal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <div class="text-3xl mt-5">Add File</div>

            </div>
            <div class="px-5 pb-8 ">
                <form type="submit" action="import_csv" method="post" enctype="multipart/form-data">
                    @csrf
                
                    <div class="intro-y col-span-12 sm:col-span-6 px-2">
                        <div class="mb-2 mt-3"> CSV File*</div>
                        <input class="input w-full border flex-1" type="file" name="file" accept=".csv" required>
                        <span class="text-theme-6">
                            @error('img')
                            {{ 'File is required' }}
                            @enderror
                        </span>
                    </div>
                    <div class="text-center">
                        <button type="button" data-dismiss="modal"
                            class="button w-24 border text-gray-700 mr-1 mt-6">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-42 text-white  pl-5 pr-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



                </div>
            <!-- END: Content -->
        </div>
      @vite('resources/js/add_user.js')
        <script src="{{asset('assets/dist/js/app.js')}}"></script>
        <script src="{{asset('assets/src/js/summernote.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>
               
                @if(Session::has('login_message'))
                <div id="mydiv" class="rounded-md px-5 mt-2 lg:mx-20 py-4 mb-2 bg-theme-18 text-theme-9"><i class="fa fa-check text-theme-9 mr-2"></i>Your Account has been <strong>Login Successfully!</strong></div>
                @endif
                @if(Session::has('delete_message'))
                <div id="mydiv" class="rounded-md px-5 lg:mx-20 py-4 mb-2 mt-2 bg-theme-31 text-theme-6"><i class="fa fa-times text-theme-6 mr-2"></i> Record has been Deleted <strong>Successfully!</strong></div>
                @endif
                @if(Session::has('update_message'))
                <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-17 text-theme-11"><i class="fa fa-edit text-theme-11 mr-2"></i> Record has been Updated <strong>Successfully!</strong></div>
                 @endif
                 @if(Session::has('add_message'))
                <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-18 text-theme-9"><i class="fa fa-check text-theme-9 mr-2"></i>New Record has been Added <strong>Successfully!</strong></div>
                @endif
                @if(Session::has('error_message'))
                <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-31 text-theme-6"><i class="fa fa-exclamation-circle text-theme-6 mr-2"></i> Error Alert <strong>Something went wrong!</strong></div>
                @endif
                 @if(Session::has('error'))
                <div id="mydiv" class="rounded-md mt-2 px-5 lg:mx-20 py-4 mb-2 bg-theme-31 text-theme-6"><i class="fa fa-exclamation-circle text-theme-6 mr-2"></i>{{session('error')}}</strong></div>
                @endif
               
 <script>
     setTimeout(function() {
         
    $('#mydiv').fadeOut('fast');
}, 3000);

function divout(){
 $('#mydiv').fadeOut('fast');   
}

 </script>
 
                <!-- END: Top Bar -->