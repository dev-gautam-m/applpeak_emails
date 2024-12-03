<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('email_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/servers*") ? "menu-open" : "" }} {{ request()->is("admin/email-templates*") ? "menu-open" : "" }} {{ request()->is("admin/contact-groups*") ? "menu-open" : "" }} {{ request()->is("admin/contacts*") ? "menu-open" : "" }} {{ request()->is("admin/email-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/servers*") ? "active" : "" }} {{ request()->is("admin/email-templates*") ? "active" : "" }} {{ request()->is("admin/contact-groups*") ? "active" : "" }} {{ request()->is("admin/contacts*") ? "active" : "" }} {{ request()->is("admin/email-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-envelope">

                            </i>
                            <p>
                                {{ trans('cruds.email.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('server_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.servers.index") }}" class="nav-link {{ request()->is("admin/servers") || request()->is("admin/servers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.server.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('email_template_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.email-templates.index") }}" class="nav-link {{ request()->is("admin/email-templates") || request()->is("admin/email-templates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-thermometer">

                                        </i>
                                        <p>
                                            {{ trans('cruds.emailTemplate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contact_group_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contact-groups.index") }}" class="nav-link {{ request()->is("admin/contact-groups") || request()->is("admin/contact-groups/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-object-group">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactGroup.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('email_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.email-logs.index") }}" class="nav-link {{ request()->is("admin/email-logs") || request()->is("admin/email-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-archive">

                                        </i>
                                        <p>
                                            {{ trans('cruds.emailLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>