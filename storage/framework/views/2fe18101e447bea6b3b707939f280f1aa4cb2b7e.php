
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <link href="<?php echo e(asset('admin/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-10">
            <div class="card mt-3">
                <div class="card-body ">
                    <h4 class="mt-0 header-title"><?php echo e(trans('site.location.update')); ?></h4>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($k == 0 ? 'active' : ''); ?>"
                                   data-toggle="pill"
                                   href="#location_detail_<?php echo e($v->slug); ?>">
                                    <?php echo e($v->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <form action="<?php echo e(route('locations.update', $province->id)); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="tab-content detail-list" id="pills-tabContent">
                            <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($k == 0 ? 'active show' : ''); ?>"
                                     id="location_detail_<?php echo e($v->slug); ?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><?php echo e(trans('site.location.name')); ?></label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           value="<?php echo e($province->translated_name); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><?php echo e(trans('site.location.gso_id')); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="gso_id"
                                               value="<?php echo e($province->gso_id); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label><?php echo e(trans('site.location.status')); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="status"
                                               value="<?php echo e($province->status); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><?php echo e(trans('site.location.district')); ?></label>
                            <div class="col-lg-12">
                                <?php $__currentLoopData = $districts->chunk(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xs-4 col-2 list-group-item">
                                                <input name="district_id[]" value="<?php echo e($district->id); ?>" id="district_id"
                                                       type="checkbox" <?php echo e($district->status ? 'checked' : ''); ?>>
                                                <?php echo e($district->name); ?>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mt-3 mb-3"><i class="mdi
                        mdi-plus-circle-outline mr-2"></i><?php echo e(trans('site.button_update')); ?></button>
                        <a href="<?php echo e(route('locations.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-3"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('admin/assets/plugins/dropify/js/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/pages/jquery.form-upload.init.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/editor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/location/edit.blade.php ENDPATH**/ ?>