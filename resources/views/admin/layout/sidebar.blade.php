<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset(Auth::user()->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::check())
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>Home</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

                <li>
                    <a href="{{route('page.index')}}">
                        <i class="fa fa-file"></i><span>Page</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('notice.index')}}">
                        <i class="fa fa-info"></i><span>Notice</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>

                <li>
                    <a href="{{route('event.index')}}">
                        <i class="fa fa-calendar"></i><span>Event</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('gallery.index')}}">
                        <i class="fa fa-envira"></i><span>Gallery</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href=" {{route('contact.index')}} ">
                        <i class="fa fa-envelope"></i><span>Message</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href=" {{route('subscribe.index')}} ">
                        <i class="fa fa-angellist"></i><span>Subscribers</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href=" {{route('newsletter.index')}} ">
                        <i class="fa fa-newspaper-o"></i><span>Newsletters</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    @if(Auth::user()->admin)
                        <a href="{{route('user.index')}}">
                            <i class="fa fa-user"></i><span>User</span>
                            <span class="pull-right-container"></span>
                        </a>

                    @endif
                </li>
                <li>
                    <a href="{{route('user.edit',['id'=> Auth::user()->id])}}">
                        <i class="fa fa-address-card"></i><span>My Profile</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>


            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>