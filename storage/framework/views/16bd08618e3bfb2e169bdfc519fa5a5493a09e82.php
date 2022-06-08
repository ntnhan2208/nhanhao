
<?php $__env->startSection('content'); ?>
<div class="page-content pl-3">
    <div class="row mt-3 mr-auto ">
        <div class="col-6">
            <div class="card shadow-lg bg-white rounded">
                <div class="card-body">
                    <form action="<?php echo e(route('languages.update',$language)); ?>" method="POST">
                        <?php echo e(method_field('PUT')); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="example-input2-group1"><?php echo e(trans('site.language.name_lang')); ?></label>
                            <div class="input-group">
                                <input type="text" id="example-input2-group1" name="name" class="form-control" value="<?php echo e($language-> name); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-input2-group1"><?php echo e(trans('site.language.slug_lang')); ?></label>
                            <div class="input-group">
                                <input type="text" id="example-input2-group1" name="slug" class="form-control" value="<?php echo e($language-> slug); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-input2-group1"><?php echo e(trans('site.language.code_lang')); ?></label>
                            <div class="input-group">
                                <input type="text" id="example-input2-group1" name="code" class="form-control" value="<?php echo e($language-> code); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.flag_lang')); ?></label>
                            <div class="input-group">
                                <input type="text"  name="flag" class="form-control" value="<?php echo e($language->flag); ?>"
                                       placeholder="<?php echo e(trans('site
                                .language.flag_lang')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.status_lang')); ?></label>
                            <select name="status" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="1" <?php echo e(($language->status == 1) ? 'selected' : ''); ?>><?php echo e(trans('site.enable')); ?></option>
                                <option value="0" <?php echo e(($language->status == 0) ? 'selected' : ''); ?>><?php echo e(trans('site.disable')); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.language.default_lang')); ?></label>
                            <select name="default" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="1" <?php echo e(($language->default == 1) ? 'selected' : ''); ?>><?php echo e(trans('site.yes')); ?></option>
                                <option value="0" <?php echo e(($language->default == 0) ? 'selected' : ''); ?>><?php echo e(trans('site.no')); ?></option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                            <?php echo e(trans('site.button_update')); ?> </button>
                        <a href="<?php echo e(route('languages.index')); ?>"><button type="button" class="btn btn-danger ml-2
                        px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/language/edit.blade.php ENDPATH**/ ?>