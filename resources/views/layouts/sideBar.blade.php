 <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset("dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{Helper::GeneralSiteSettings('name')}}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->photo ? asset('uploads/users/'.Auth::user()->photo) : asset('uploads/users/user.webp') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('profile')}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link @yield('home')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                  الرئيسية
                            </p>
                            </a>
                        </li>

                        @if (Auth::user()->level == "1")
                            <li class="nav-item has-treeview  @yield('pharma_open')">
                                <a href="#" class="nav-link @yield('pharma')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الصيدليات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('pharma.index')}}" class="nav-link @yield('pharma_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الصيدليات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('pharma.create')}}" class="nav-link @yield('pharma_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة صيدلية جديدة</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview  @yield('report_open')">
                                <a href="#" class="nav-link @yield('report')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    التقارير
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >

                                    <li class="nav-item">
                                        <a href="{{route('report.pharma')}}" class="nav-link @yield('report_pharma')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الصيدليات</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->level == "2")
                            {{-- <li class="nav-item has-treeview  @yield('pharmacy_open')">
                                <a href="#" class="nav-link @yield('pharmacy')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الصيادلة
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('pharmacy.index')}}" class="nav-link @yield('pharmacy_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الصيادلة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('pharmacy.create')}}" class="nav-link @yield('pharmacy_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة صيدلي جديد</p>
                                        </a>
                                    </li>

                                </ul>
                            </li> --}}

                             <li class="nav-item has-treeview  @yield('medicine_open')">
                                <a href="#" class="nav-link @yield('medicine')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الادوية
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >
                                    <li class="nav-item">
                                        <a href="{{route('medicine.index')}}" class="nav-link @yield('medicine_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الادوية</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('medicine.create')}}" class="nav-link @yield('medicine_create')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إضافة دواء جديد</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview  @yield('order_open')">
                                <a href="#" class="nav-link @yield('order')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    الطلبات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >

                                    <li class="nav-item">
                                        <a href="{{route('order.index')}}" class="nav-link @yield('order_index')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الطلبات الجديدة</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('acceptable')}}" class="nav-link @yield('acceptable')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الطلبات المقبولة</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('rejected')}}" class="nav-link @yield('rejected')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الطلبات المرفوضة </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                             <li class="nav-item has-treeview  @yield('report_open')">
                                <a href="#" class="nav-link @yield('report')">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    التقارير
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview" >

                                    <li class="nav-item">
                                        <a href="{{route('report.medicine')}}" class="nav-link @yield('report_medicine')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الادوية</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                        @endif

                        {{-- <li class="nav-item">
                            <a href="{{route('setting')}}" class="nav-link @yield('setting')">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                الاعدادات العامة
                            </p>
                            </a>
                        </li> --}}


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
