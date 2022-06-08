<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li class="<?php echo e((request()->is('admin/home*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="ti-dashboard"></i>
                <span><?php echo e(trans('site.dashboard')); ?></span>
            </a>
        </li>
        <li class="<?php echo e((request()->is('admin/languages*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('languages.index')); ?>">
                <i class="ti-basketball"></i>
                <span><?php echo e(trans('site.language.title')); ?></span>
            </a>
        </li>
        <li class="<?php echo e((request()->is('admin/admins*')) ? 'mm-active' : ''); ?>">
            <a href="<?php echo e(route('admins.index')); ?>">
                <i class="ti-user"></i>
                <span><?php echo e(trans('site.admin.title')); ?></span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);"><i class="ti-key"></i><span><?php echo e(trans('site.permission.manage')); ?></span><span
                        class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('role.index')); ?>">
                        <i class="ti-control-record"></i><?php echo e(trans('site.role.name')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('permission.index')); ?>">
                        <i class="ti-control-record"></i><?php echo e(trans('site.permission.name')); ?>

                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>