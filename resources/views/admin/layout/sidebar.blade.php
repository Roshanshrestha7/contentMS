<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >
            <li class="header">MAIN NAVIGATION</li>
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
                <a href="{{route('gallery.index')}}">
                    <i class="fa fa-envira"></i><span>Gallery</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>