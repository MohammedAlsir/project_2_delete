 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>

            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav mr-auto-navbav">


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            @auth
                                {{Auth::user()->name}}
                            @endauth
                        </span>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('profile')}}" class="dropdown-item">
                            <i class="fa fa-pencil-square-o m-auto"></i>
                            <span>الملف الشخصي</span>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('logout')}}" class="dropdown-item">
                            <i class="fa fa-sign-out m-auto"></i>
                            <span>تسجيل الخروج</span>
                        </a>

                    </div>
                </li>

            </ul>
        </nav>
