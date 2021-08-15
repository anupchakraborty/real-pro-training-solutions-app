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
              <i class="nav-icon fas fa-user-secret"></i>
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
              <i class="nav-icon fab fa-cloudscale"></i>
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
          <li class="nav-item has-treeview {{ Route::is('admin.course.content.quiz.create') || Route::is('admin.course.content.quiz.index') || Route::is('admin.course.content.quiz.edit') || Route::is('admin.course.content.quiz.show') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-cloudscale"></i>
              <p>  Quiz  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('admin.course.content.quiz.create') }}" class="nav-link {{ route::is('admin.course.content.quiz.create')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Quiz</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('admin.course.content.quiz.index') }}" class="nav-link {{ route::is('admin.course.content.quiz.index')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Quiz</p>
                </a>
              </li>
              <li class="nav-item has-treeview {{ Route::is('admin.course.content.question.create') || Route::is('admin.course.content.question.index') || Route::is('admin.course.content.question.edit') || Route::is('admin.course.content.question.show') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fab fa-cloudscale"></i>
                  <p>  Question  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ Route('admin.course.content.question.create') }}" class="nav-link {{ route::is('admin.course.content.question.create')  ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create Question</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ Route('admin.course.content.question.index') }}" class="nav-link {{ route::is('admin.course.content.question.index')  ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Question</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.orders.create') || Route::is('admin.orders.index') || Route::is('admin.orders.edit') || Route::is('admin.orders.show') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-cloudscale"></i>
              <p>  Orders  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('admin.orders.index') }}" class="nav-link {{ route::is('admin.orders.index')  ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.sliders.index') || Route::is('admin.sliders.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>  Sliders  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ route::is('admin.sliders.index')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                  <p>All Slider</p>
                </a>
              </li>
            </ul>
          </li>
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
          <li class="nav-item has-treeview {{ Route::is('admin.comments.index') || Route::is('admin.comments.destory') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
              <p>  Comments  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.comments.index') }}" class="nav-link {{ route::is('admin.comments.index')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                  <p>All Comments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.companyinfo.index') || Route::is('admin.companyinfo.edit') || Route::is('admin.companyinfo.update') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
              <p>  Company Info  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.about.index') }}" class="nav-link {{ Route::is('admin.about.index')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-circle"></i>
                  <p>About Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.companyinfo.index') }}" class="nav-link {{ Route::is('admin.companyinfo.index')  ? 'active' : '' }}">
                    <i class="nav-icon fas fa-circle"></i>
                  <p>All Info</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @if ($usr->can('app_setting.socialite')) --}}
            <li class="nav-item has-treeview {{ Route::is('admin.socialite.index') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>App Settings <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                {{-- @if ($usr->can('app_setting.socialite')) --}}
                  <li class="nav-item">
                    <a href="{{ route('admin.socialite.index') }}" class="nav-link {{ route::is('admin.socialite.index')  ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Socialite</p>
                    </a>
                  </li>
                {{-- @endif --}}
              </ul>
            </li>
          {{-- @endif --}}
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
