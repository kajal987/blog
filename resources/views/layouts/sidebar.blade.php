@if(Auth::user()->isAdmin() == 'true')

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- search form -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->


            <ul class="sidebar-menu linkclass" data-widget="tree">
                <li>
                    <a href="{{ url('home') }}" >
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users') }}" >
                        <i class="fa fa-dashboard"></i> <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('post/create') }}" >
                        <i class="fa fa-dashboard"></i> <span>Post</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@else
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- search form -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->


            <ul class="sidebar-menu linkclass" data-widget="tree">

                <li>
                    <a href="{{ url('/userpost') }}" >
                        <i class="fa fa-dashboard"></i> <span>All Post</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

@endif
