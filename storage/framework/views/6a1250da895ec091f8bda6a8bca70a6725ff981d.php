
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('admins.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.name')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       placeholder="<?php echo e(trans('site.admin.name')); ?>" value="<?php echo e(old('name')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.email')); ?> </label>
                            <div class="input-group">
                                <input type="text"  name="email" class="form-control" placeholder="<?php echo e(trans('site.admin.email')); ?>" value="<?php echo e(old('email')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-muted mb-3"><?php echo e(trans('site.admin.image')); ?></p>
                            <input type="file" name="images" id="input-file-now" class="dropify" />   
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.password')); ?>  </label>
                            <div class="input-group">
                                <input type="password"  name="password" class="form-control" placeholder="<?php echo e(trans('site.admin.password')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.role')); ?>  </label>
                            <div class="input-group">
                                <select class="form-control" name="role">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value = "<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="mdi
                        mdi-plus-circle-outline mr-2"></i><?php echo e(trans('site.button_add')); ?></button>
                        <a href="<?php echo e(route('admins.index')); ?>"><button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('admin/assets/plugins/dropify/js/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/pages/jquery.form-upload.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/admins/add.blade.php ENDPATH**/ ?>