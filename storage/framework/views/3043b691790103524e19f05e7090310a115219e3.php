
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('languages.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.name_lang')); ?></label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       value="<?php echo e(old('name')); ?>"
                                       placeholder="<?php echo e(trans('site.language.name_lang')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.slug_lang')); ?></label>
                            <div class="input-group">
                                <input type="text"  name="slug" class="form-control" value="<?php echo e(old('slug')); ?>"  placeholder="<?php echo e(trans('site.language.slug_lang')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.code_lang')); ?></label>
                            <div class="input-group">
                                <input type="text"  name="code" class="form-control" value="<?php echo e(old('code')); ?>" placeholder="<?php echo e(trans('site.language.code_lang')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.flag_lang')); ?></label>
                            <div class="input-group">
                                <input type="text"  name="flag" class="form-control" value="<?php echo e(old('flag')); ?>" placeholder="<?php echo e(trans('site.language.flag_lang')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.status_lang')); ?></label>
                            <select name="status" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="1" ><?php echo e(trans('site.enable')); ?></option>
                                <option value="0" ><?php echo e(trans('site.disable')); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.default_lang')); ?></label>
                            <select name="default" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="0" ><?php echo e(trans('site.no')); ?></option>
                                <option value="1" ><?php echo e(trans('site.yes')); ?></option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mt-3 mb-3"><i class="mdi
                        mdi-plus-circle-outline mr-2"></i><?php echo e(trans('site.button_add')); ?></button>
                        <a href="<?php echo e(route('languages.index')); ?>"><button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-3"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\phoenixCMS\resources\views/admin/language/add.blade.php ENDPATH**/ ?>