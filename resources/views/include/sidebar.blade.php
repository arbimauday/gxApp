<!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
        <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
        <div class="sidebar-overlay-slide from-top" id="appMenu">
            <div class="row">
                <div class="col-xs-6 no-padding">
                    <a href="#" class="p-l-40"><img src="{{ asset('temp/assets/img/demo/social_app.svg') }}" alt="socail">
                    </a>
                </div>
                <div class="col-xs-6 no-padding">
                    <a href="#" class="p-l-10"><img src="{{ asset('temp/assets/img/demo/email_app.svg') }}" alt="socail">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 m-t-20 no-padding">
                    <a href="#" class="p-l-40"><img src="{{ asset('temp/assets/img/demo/calendar_app.svg') }}" alt="socail">
                    </a>
                </div>
                <div class="col-xs-6 m-t-20 no-padding">
                    <a href="#" class="p-l-10"><img src="{{ asset('temp/assets/img/demo/add_more.svg') }}" alt="socail">
                    </a>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
        <!-- BEGIN SIDEBAR MENU HEADER-->
        <div class="sidebar-header">
            <img src="{{ asset('temp/assets/img/logo_white.png') }}" alt="logo" class="brand" width="78" height="22">
            <div class="sidebar-header-controls">
                <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20 hidden-md-down" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
                </button>
                <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
                </button>
            </div>
        </div>
        <!-- END SIDEBAR MENU HEADER-->
        <!-- START SIDEBAR MENU -->
        <div class="sidebar-menu">
            <!-- BEGIN SIDEBAR MENU ITEMS-->
            <ul class="menu-items">
                <!-- Full Calendar -->
                <li class="m-t-20">
                    <a href="{{ url('/calendar/full') }}">
                        <span class="title">Full Calenar</span>
                    </a>
                    <span class="icon-thumbnail"><i class="pg-calender"></i></span>
                </li>

                <!-- Report Software Error -->
                <li  class="">
                    <a href="javascript:;"><span class="title">Report Error</span>
                        <span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="fa fa-paperclip"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ url('/report/data/for-admin') }}">Admin</a>
                            <span class="icon-thumbnail">A</span>
                        </li>
                        <li class="">
                            <a href="{{ url('/report/data/for-user') }}">User</a>
                            <span class="icon-thumbnail">U</span>
                        </li>
                    </ul>
                </li>

                <!-- MASTER VEHICLE -->
                <li class="">
                    <a href="javascript:;"><span class="title">Master Vehicle</span>
                        <span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="fa fa-wheelchair"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ url('/masterVehicle/car') }}">Car</a>
                            <span class="icon-thumbnail">C</span>
                        </li>
                        <li class="">
                            <a href="{{ url('/masterVehicle/motorcycle') }}">Motorcycle</a>
                            <span class="icon-thumbnail">M</span>
                        </li>
                    </ul>
                </li>

                <!-- WEB CAM, QRCODE -->
                <li>
                    <a href="javascript:;"><span class="title">Master Web Cam</span>
                        <span class=" arrow"></span></a>
                    <span class="icon-thumbnail"><i class="fa fa-video-camera"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ url('/masterWebcam/barcode') }}">Barcode</a>
                            <span class="icon-thumbnail">B</span>
                        </li>
                        <li>
                            <a href="{{ url('/masterWebcam/scanFace') }}">Scan Face</a>
                            <span class="icon-thumbnail">SF</span>
                        </li>
                    </ul>
                </li>

                <!-- MONITORING -->
                <li>
                    <a href="javascript:;"><span class="title">Monitoring</span>
                        <span class="arrow"></span>
                    </a>
                    <span class="icon-thumbnail"><i class="fa fa-desktop"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ url('/monitoring/checkingJobs') }}">Checking Error</a>
                            <span class="icon-thumbnail">CE</span>
                        </li>
                        <li>
                            <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}">Backup Pack</a>
                            <span class="icon-thumbnail">BP</span>
                        </li>
                    </ul>
                </li>

                <!-- LOG REQUES -->
                <li>
                    <a href="{{ url('/logRequest') }}">
                        <span class="title">Log Reques</span>
                    </a>
                    <span class="icon-thumbnail"><i class="pg-boxnet"></i></span>
                </li>

                <!-- EMPLOYEE -->
                <li>
                    <a href="javascript:;"><span class="title">Employee</span>
                        <span class="arrow"></span>
                    </a>
                    <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ url('/employee/medicalRecords') }}">Medical Records</a>
                            <span class="icon-thumbnail">MR</span>
                        </li>
                    </ul>
                </li>

                <!-- Test -->
                <li>
                    <a href="javascript:;"><span class="title">Test</span>
                        <span class="arrow"></span>
                    </a>
                    <span class="icon-thumbnail"><i class="fs-14 fa fa-magic"></i></span>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ url('/test/scrolling')}}">Scrolling Vue</a>
                            <span class="icon-thumbnail">SV</span>
                        </li>
                    </ul>
                </li>

                {{--<li>--}}
                    {{--<a href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }} " class="title">--}}
                        {{--<i class="fa fa-hdd-o"></i> <span>Backups</span>--}}
                    {{--</a>--}}
                {{--</li>--}}


                <!-- Data list dafault -->
                    {{--<li class="m-t-30 ">--}}
                        {{--<a href="{{ url('/dashboard') }}" class="detailed">--}}
                            {{--<span class="title">Dashboard</span>--}}
                            {{--<span class="details">12 New Updates</span>--}}
                        {{--</a>--}}
                        {{--<span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="{{ url('/email') }}" class="detailed">--}}
                            {{--<span class="title">Email</span>--}}
                            {{--<span class="details">234 New Emails</span>--}}
                        {{--</a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-mail"></i></span>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="{{ url('/social') }}"><span class="title">Social</span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-social"></i></span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><span class="title">Calendar</span>--}}
                            {{--<span class=" arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-calender"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/calendar/full') }}">Full</a>--}}
                                {{--<span class="icon-thumbnail">F</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/calendar/basic') }}">Basic</a>--}}
                                {{--<span class="icon-thumbnail">c</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Languages</a>--}}
                                {{--<span class="icon-thumbnail">L</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/calendar/month') }}">Month</a>--}}
                                {{--<span class="icon-thumbnail">M</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Lazy load</a>--}}
                                {{--<span class="icon-thumbnail">La</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="http://pages.revox.io/dashboard/2.1.0/doc/#calendar" target="_blank">Documentation</a>--}}
                                {{--<span class="icon-thumbnail">D</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="{{ url('/') }}">--}}
                            {{--<span class="title">Builder</span>--}}
                        {{--</a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-layouts"></i></span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><span class="title">Layouts</span>--}}
                            {{--<span class=" arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Default</a>--}}
                                {{--<span class="icon-thumbnail">dl</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Secondary</a>--}}
                                {{--<span class="icon-thumbnail">sl</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Boxed</a>--}}
                                {{--<span class="icon-thumbnail">bl</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">RTL</a>--}}
                                {{--<span class="icon-thumbnail">rl</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><span class="title">UI Elements</span>--}}
                            {{--<span class=" arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail">Ui</span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Color</a>--}}
                                {{--<span class="icon-thumbnail">c</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Typography</a>--}}
                                {{--<span class="icon-thumbnail">t</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Icons</a>--}}
                                {{--<span class="icon-thumbnail">i</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Buttons</a>--}}
                                {{--<span class="icon-thumbnail">b</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Notifications</a>--}}
                                {{--<span class="icon-thumbnail">n</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Modals</a>--}}
                                {{--<span class="icon-thumbnail">m</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Progress &amp; Activity</a>--}}
                                {{--<span class="icon-thumbnail">pa</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Tabs &amp; Accordions</a>--}}
                                {{--<span class="icon-thumbnail">ta</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Sliders</a>--}}
                                {{--<span class="icon-thumbnail">s</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Tree View</a>--}}
                                {{--<span class="icon-thumbnail">tv</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Nestable</a>--}}
                                {{--<span class="icon-thumbnail">ns</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;">--}}
                            {{--<span class="title">Forms</span>--}}
                            {{--<span class=" arrow"></span>--}}
                        {{--</a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-form"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Form Elements</a>--}}
                                {{--<span class="icon-thumbnail">fe</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Form Layouts</a>--}}
                                {{--<span class="icon-thumbnail">fl</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Form Wizard</a>--}}
                                {{--<span class="icon-thumbnail">fw</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="{{ url('/') }}">--}}
                            {{--<span class="title">Cards</span>--}}
                        {{--</a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-grid"></i></span>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="{{ url('/') }}">--}}
                            {{--<span class="title">Views</span>--}}
                        {{--</a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg pg-ui"></i></span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><span class="title">Tables</span>--}}
                            {{--<span class=" arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-tables"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Basic Tables</a>--}}
                                {{--<span class="icon-thumbnail">bt</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Data Tables</a>--}}
                                {{--<span class="icon-thumbnail">dt</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><span class="title">Maps</span>--}}
                            {{--<span class=" arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-map"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Google Maps</a>--}}
                                {{--<span class="icon-thumbnail">gm</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Vector Maps</a>--}}
                                {{--<span class="icon-thumbnail">vm</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="{{ url('/') }}"><span class="title">Charts</span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-charts"></i></span>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;"><span class="title">Extra</span>--}}
                            {{--<span class=" arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-bag"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Invoice</a>--}}
                                {{--<span class="icon-thumbnail">in</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="404.html">404 Page</a>--}}
                                {{--<span class="icon-thumbnail">pg</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">500 Page</a>--}}
                                {{--<span class="icon-thumbnail">pg</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Blank Page</a>--}}
                                {{--<span class="icon-thumbnail">bp</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Login</a>--}}
                                {{--<span class="icon-thumbnail">l</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Register</a>--}}
                                {{--<span class="icon-thumbnail">re</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Lockscreen</a>--}}
                                {{--<span class="icon-thumbnail">ls</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Gallery</a>--}}
                                {{--<span class="icon-thumbnail">gl</span>--}}
                            {{--</li>--}}
                            {{--<li class="">--}}
                                {{--<a href="{{ url('/') }}">Timeline</a>--}}
                                {{--<span class="icon-thumbnail">t</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="javascript:;"><span class="title">Menu Levels</span>--}}
                            {{--<span class="arrow"></span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li>--}}
                                {{--<a href="javascript:;">Level 1</a>--}}
                                {{--<span class="icon-thumbnail">L1</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="javascript:;"><span class="title">Level 2</span>--}}
                                    {{--<span class="arrow"></span></a>--}}
                                {{--<span class="icon-thumbnail">L2</span>--}}
                                {{--<ul class="sub-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">Sub Menu</a>--}}
                                        {{--<span class="icon-thumbnail">Sm</span>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="ujavascript:;">Sub Menu</a>--}}
                                        {{--<span class="icon-thumbnail">Sm</span>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="http://pages.revox.io/dashboard/2.2.0/docs/" target="_blank"><span class="title">Docs</span></a>--}}
                        {{--<span class="icon-thumbnail"><i class="pg-note"></i></span>--}}
                    {{--</li>--}}
                    {{--<li class="">--}}
                        {{--<a href="http://changelog.pages.revox.io/" target="_blank"><span class="title">Changelog</span></a>--}}
                        {{--<span class="icon-thumbnail">Cl</span>--}}
                    {{--</li>--}}
                <!-- Data list default -->
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- END SIDEBAR MENU -->
    </nav>
<!-- END SIDEBAR -->