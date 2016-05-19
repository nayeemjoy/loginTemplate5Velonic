 <!-- Aside Start-->
<aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="#" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span href="{!!route('dashboard')!!}" class="nav-label">{!! Config::get('customConfig.names.siteName')!!}</span>

                </a>
            </div>
            <!-- / brand -->


            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">

                     <li class="{!! Menu::areActiveURLs(['dashboard', 'change-password']) !!}"><a href="#"><i class="ion-flask"></i> <span class="nav-label">Home</span></a>
                        <ul class="list-unstyled">

                            <li class="{!! Menu::isActiveRoute('dashboard') !!}">
                                <a href="{!!  URL::route( 'dashboard') !!}">Dashboard</a>
                            </li>

                            <!-- <li class="{!! Menu::isActiveURL('change-password') !!}">
                                <a href="{!!  URL::to( 'change-password') !!}">Password Change</a>
                            </li> -->
                        </ul>
                    </li>



                    @role('admin')
                    <li class="has-submenu"><a href="#"><!-- <i class="ion-compose"></i> --> <span class="nav-label">Manager</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{!! route('user.create') !!}">Create Manager</a></li>
                            <li><a href="{!! route('user.index') !!}">All Managers</a></li>

                        </ul>
                    </li>
                    @endrole
                    <li class="has-submenu"><a href="#"><!-- <i class="ion-stats-bars"></i> --> <span class="nav-label">Passport Receive</span><!-- <span class="badge bg-purple">1</span> --></a>
                        <ul class="list-unstyled">
                            <li><a href="{!! route('passportreceive.create') !!}">Create New</a></li>
                            <li><a href="{!! route('passportreceive.index') !!}">View All</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><!-- <i class="ion-stats-bars"></i> --> <span class="nav-label">Passport Making</span><!-- <span class="badge bg-purple">1</span> --></a>
                        <ul class="list-unstyled">
                            <li><a href="{!! route('passportmaking.create') !!}">Create New</a></li>
                            <li><a href="{!! route('passportmaking.index') !!}">View All</a></li>
                        </ul>
                    </li>

                    <!-- <li class="has-submenu"><a href="#"><i class="ion-grid"></i> <span class="nav-label">Data Tables</span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Basic Tables</a></li>
                            <li><a href="#">Data Table</a></li>

                        </ul>
                    </li>


                    <li class="has-submenu"><a href="#"><i class="ion-stats-bars"></i> <span class="nav-label">Charts</span><span class="badge bg-purple">1</span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">chart</a></li>
                            <li><a href="#">Morris</a></li>

                        </ul>
                    </li>


                    <li class="has-submenu"><a href="#"><i class="ion-email"></i> <span class="nav-label">Mail</span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Inbox</a></li>
                            <li><a href="#">Compose Mail</a></li>
                            <li><a href="#">View Mail</a></li>

                        </ul>
                    </li>


                    <li class="has-submenu"><a href="#"><i class="ion-location"></i> <span class="nav-label">Maps</span></a>
                        <ul class="list-unstyled">
                            <li><a href="gmap.html"> Google Map</a></li>
                            <li><a href="vector-map.html"> Vector Map</a></li>
                        </ul>
                    </li> -->

                </ul>
            </nav>



</aside>
        <!-- Aside Ends-->



