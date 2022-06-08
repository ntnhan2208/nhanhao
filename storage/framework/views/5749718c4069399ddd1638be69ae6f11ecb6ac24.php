<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo e(trans('site.user_manager.login')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App css -->
    <link href="<?php echo e(asset('admin/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/css/icons.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/css/metisMenu.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/css/style.css')); ?>" rel="stylesheet" type="text/css"/>

</head>

<body class="account-body accountbg">

<!-- Log In page -->
<div class="row vh-100 ">
    <div class="col-12 align-self-center">
        <div class="auth-page">
            <div class="card auth-card shadow-lg">
                <div class="card-body">
                    <div class="px-3">
                        <div class="text-center auth-logo-text">
                            <h4 class="mt-0 mb-3 mt-3"><?php echo e(trans('site.user_manager.login')); ?></h4>
                        </div>
                        <?php if(count($errors)>0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($error); ?></span><br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal auth-form my-4" method="POST" action="<?php echo e(route('user.login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="phone"><?php echo e(trans('site.user_manager.phone')); ?></label>
                                <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-phone"></i>
                                            </span>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="<?php echo e(trans('site.user_manager.enter_phone_number')); ?>">
                                </div>
                            </div><!--end form-group-->

                            <div class="form-group">
                                <label for="userpassword"><?php echo e(trans('site.user_manager.password')); ?></label>
                                <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i>
                                            </span>
                                    <input type="password" name="password" class="form-control" id="userpassword"
                                           placeholder="<?php echo e(trans('site.user_manager.enter_password')); ?>">
                                </div>
                            </div><!--end form-group-->

                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-switch switch-success">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                               id="remember">
                                        <label class="custom-control-label text-muted"
                                               for="remember"><?php echo e(trans('site.user_manager.remember')); ?></label>
                                    </div>
                                </div><!--end col-->
                            </div><!--end form-group-->

                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-round btn-block waves-effect waves-light"
                                            type="submit"><?php echo e(trans('site.user_manager.login')); ?><i
                                                class="fas fa-sign-in-alt ml-1"></i></button>
                                </div><!--end col-->
                            </div> <!--end form-group-->
                        </form><!--end form-->
                    </div><!--end /div-->

                    <div class="m-3 text-center text-muted">
                        <a href="<?php echo e(route('user.reset')); ?>"
                           class="text-muted font-13"><?php echo e(trans('site.user_manager.forgot_password')); ?></a>
                    </div>
                    <div class="m-3 text-center text-muted">
                        <p class=""><?php echo e(trans('site.user_manager.have_no_account')); ?><a
                                    href="<?php echo e(route('user.register')); ?>"
                                    class="text-primary ml-2"><?php echo e(trans('site.user_manager.register')); ?></a></p>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end auth1-page-->
    </div><!--end col-->
</div><!--end row-->
<!-- End Log In page -->


<!-- jQuery  -->
<script src="<?php echo e(asset('admin/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/waves.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/jquery.slimscroll.min.js')); ?>"></script>

<!-- App js -->
<script src="<?php echo e(asset('admin/assets/js/app.js')); ?>"></script>

</body>
</html><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/web/auth1/login.blade.php ENDPATH**/ ?>