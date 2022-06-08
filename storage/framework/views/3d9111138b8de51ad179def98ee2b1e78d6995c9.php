
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row mt-3 mr-auto ">
    <div class="col-6">
        <div class="card shadow-lg bg-white rounded">
            <div class="card-body">
                <form action="<?php echo e(route('admins.update',$admin->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(method_field('PUT')); ?>

                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="example-input2-group1"><?php echo e(trans('site.admin.name')); ?></label>
                        <div class="input-group">
                            <input type="text" id="example-input2-group1" name="name" class="form-control" value="<?php echo e($admin->name); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="text-muted mb-3"><?php echo e(trans('site.admin.image')); ?></p>
                        <input type="file" name="images" id="input-file-now" class="dropify" data-height="300" data-default-file="<?php echo e(asset('images/'.$admin->image)); ?>" />   
                    </div>
                    <div class="form-group">
                        <label for="example-input2-group1"><?php echo e(trans('site.admin.email')); ?></label>
                        <div class="input-group">
                            <input type="text" id="example-input2-group1" readonly name="email" class="form-control" value="<?php echo e($admin->email); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-input2-group1"><?php echo e(trans('site.admin.password')); ?></label>
                        <div class="input-group">
                            <input type="password" id="example-input2-group1" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('site.admin.role')); ?>  </label>
                        <div class="input-group">
                            <select class="form-control" name="role">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(in_array($role->id, $adminRoles) ? 'selected' : ''); ?> value = "<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                        <?php echo e(trans('site.button_update')); ?> </button>
                    <a href="<?php echo e(route('admins.index')); ?>"><button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button></a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow-lg bg-white rounded">
            <div class="card-body">
                <?php if(isset($QRImage)): ?>
                    <div class="panel-body text-center">
                        <p><?php echo e(trans('site.note_2fa1')); ?></p>
                        <p><?php echo e(trans('site.note_2fa2')); ?></p>
                        <p><?php echo e(trans('site.note_2fa')); ?> </p>
                        <div>
                            <img src="<?php echo e($QRImage); ?>">
                        </div>
                        <h2><?php echo e($admin->secret_code); ?></h2>
                        <div>
                            <form action="<?php echo e(route('admins.complete_2fa')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($admin->id); ?>">
                                <input type="hidden" name="google2fa_enable"
                                       value="<?php echo e($admin->google2fa_enable == 1 ? 0 : 1); ?>">
                                <?php if($admin->google2fa_enable == 1): ?>
                                    <button type="submit" class="btn btn-danger px-4 mt-2">
                                        <?php echo e(trans('site.disable_2fa')); ?></button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-primary px-4 mt-2">
                                        <?php echo e(trans('site.enable_2fa')); ?></button>
                                <?php endif; ?>
                                <a class="btn btn-warning ml-2 px-4 mt-2" href="<?php echo e(route('admins.reset_2fa',
                                $admin->id)); ?>">
                                    <?php echo e(trans('site.reset_2fa')); ?>

                                </a>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('admin/assets/plugins/dropify/js/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/pages/jquery.form-upload.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\phoenixCMS\resources\views/admin/admins/edit.blade.php ENDPATH**/ ?>