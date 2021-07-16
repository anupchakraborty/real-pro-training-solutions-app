@php
$usr = Auth::guard('admin')->user();
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ Route('admin.dashboard') }}" class="brand-link" style="text-align: center">
      <span class="brand-text font-weight-bold">Real Pro</span>
      <br/>
      <span class="brand-text">Training Solutions</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::To('backend/img/avatar04.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ Route('admin.dashboard') }}" class="d-block" style="text-transform: capitalize;">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if ($usr->can('dashboard.view'))
          <li class="nav-item has-treeview">
            <a href="{{ Route('admin.dashboard') }} " class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @endif

          @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
          <li class="nav-item has-treeview {{ Route::is('admin.roles.create')||Route::is('admin.roles.index')||Route::is('admin.roles.edit')||Route::is('admin.roles.show')?'menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>  Roles & Permissions  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @if ($usr->can('role.create')) --}}
              <li class="nav-item">
                <a href="{{ Route('admin.roles.create') }}" class="nav-link {{ Route::is('admin.roles.create')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Role</p>
                </a>
              </li>
              {{-- @endif
              @if ($usr->can('role.view')) --}}
              <li class="nav-item">
                <a href="{{ Route('admin.roles.index') }}" class="nav-link {{ Route::is('admin.roles.index')||Route::is('admin.roles.edit')?'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Roles</p>
                </a>
              </li>
              {{-- @endif --}}
            </ul>
          </li>
          @endif

          @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
          <li class="nav-item has-treeview {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>  Admins  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if ($usr->can('admin.create'))
              <li class="nav-item">
                <a href="{{ Route('admin.admins.create') }}" class="nav-link {{ Route::is('admin.admins.create')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Admin</p>
                </a>
              </li>
              @endif
              @if ($usr->can('admin.view'))
              <li class="nav-item">
                <a href="{{ Route('admin.admins.index') }}" class="nav-link {{ route::is('admin.admins.index')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Admin</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif
          @if ($usr->can('course.create') || $usr->can('course.view') ||  $usr->can('course.edit') ||  $usr->can('course.delete'))
          <li class="nav-item has-treeview {{ Route::is('admin.course.create') || Route::is('admin.course.index') || Route::is('admin.course.edit') || Route::is('admin.course.show') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>  Courses  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if ($usr->can('course.create'))
              <li class="nav-item">
                <a href="{{ Route('admin.course.create') }}" class="nav-link {{ Route::is('admin.course.create')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Course</p>
                </a>
              </li>
              @endif
              @if ($usr->can('course.view'))
              <li class="nav-item">
                <a href="{{ Route('admin.course.index') }}" class="nav-link {{ route::is('admin.course.index')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Course</p>
                </a>
              </li>
              @endif
              @if ($usr->can('course.create'))
              <li class="nav-item">
                <a href="{{ Route('admin.course.content.create') }}" class="nav-link {{ Route::is('admin.course.content.create')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Content</p>
                </a>
              </li>
              @endif
              @if ($usr->can('course.view'))
              <li class="nav-item">
                <a href="{{ Route('admin.course.content.index') }}" class="nav-link {{ route::is('admin.course.content.index')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Content</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview {{ Route::is('admin.users.create') || Route::is('admin.users.index') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>  User  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ route::is('admin.users.index')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                  <p>All User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.companyinfo.index') || Route::is('admin.companyinfo.edit') || Route::is('admin.companyinfo.update') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>  Company Info  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.companyinfo.index') }}" class="nav-link {{ route::is('admin.companyinfo.index')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                  <p>All Info</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
