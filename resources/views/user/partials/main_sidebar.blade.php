<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="public/placeholder.jpg" class="img-circle" alt="">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="javascript:void(0)" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            {{--<li class="active treeview menu-open">--}}
            <li>
                <a href="{{ route('home')  }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-user"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> List User</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-dollar"></i> <span>Post Management</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                   <li><a href="{{ route('post.create') }}"><i class="fa fa-circle-o"></i> New Post</a></li>
                    <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-circle-o"></i>Published</a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Recent Post</a></li>
                            <li><a href=""><i class="fa fa-circle-o"></i> Archive Post</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Draft</a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('post_draft.index') }}"><i class="fa fa-circle-o"></i> List Post</a></li>
                        </ul>
                    </li>                    
                    <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Trash</a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-circle-o"></i> List Post</a>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-user"></i> <span>Tag</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('tag.create') }}"><i class="fa fa-circle-o"></i> Add Tag</a></li>
                        <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> List Tag</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-user"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                        <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> List Category</a></li>
                    </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-euro"></i> <span>Salary Setup</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Group Salary</a></li>
                    <li class="treeview"><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Employee Salary</a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="fa fa-circle-o"></i> Create New Salary</a>
                            <li><a href=""><i class="fa fa-circle-o"></i> List All Salaries</a>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="header">ACCOUNT MANAGEMENT</li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-dollar"></i> <span>Administrators</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i> Add Administrator</a></li>
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> List Administrators</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-dollar"></i> <span>Role Management</span> <i class="fa fa-angle-left pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('role.create') }}"><i class="fa fa-circle-o"></i> Add New Role</a>
                        <li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o"></i> List Roles</a>
                    </ul>
                </a>                
            </li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-dollar"></i> <span>Permission Management</span> <i class="fa fa-angle-left pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('permission.create') }}"><i class="fa fa-circle-o"></i> Add New Permission</a>
                        <li><a href="{{ route('permission.index') }}"><i class="fa fa-circle-o"></i> List Permissions</a>
                    </ul>
                </a>                
            </li>

            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-user"></i> <span>My Account</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Change Password</a></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-circle-o"></i> Logout</a></li>
                        @include('auth.logout')
                </ul>
            </li>
            <li class="header">SETTINGS</li>
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-gears"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> System Settings</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>