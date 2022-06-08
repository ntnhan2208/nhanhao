<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li class="{{ (request()->is('admin/home*')) ? 'mm-active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="ti-dashboard"></i>
                <span>{{ trans('site.dashboard') }}</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin/languages*')) ? 'mm-active' : '' }}">
            <a href="{{ route('languages.index') }}">
                <i class="ti-basketball"></i>
                <span>{{ trans('site.language.title') }}</span>
            </a>
        </li>
        <li class="{{ (request()->is('admin/admins*')) ? 'mm-active' : '' }}">
            <a href="{{ route('admins.index') }}">
                <i class="ti-user"></i>
                <span>{{ trans('site.admin.title') }}</span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="ti-key"></i><span>{{ trans('site.permission.manage')
            }}</span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <i class="ti-control-record"></i>{{ trans('site.role.name') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('permission.index') }}">
                        <i class="ti-control-record"></i>{{ trans('site.permission.name') }}
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
