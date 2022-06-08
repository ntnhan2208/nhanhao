
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/scss/_form-advanced.scss')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <form action="<?php echo e(route('attribute_groups.store')); ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-body shadow-lg bg-white rounded">
                        <?php echo csrf_field(); ?>
                        <p class="text-uppercase font-14"><?php echo e(trans('site.main_content')); ?></p>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e($k == 0 ? 'active' : ''); ?>"
                                       id="blog_category_detail_tab_<?php echo e($v->slug); ?>"
                                       data-toggle="pill"
                                       href="#category_detail_tab_<?php echo e($v->slug); ?>">
                                        <?php echo e($v->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($k == 0 ? 'active show' : ''); ?>"
                                     id="category_detail_tab_<?php echo e($v->slug); ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute_group.name', [], $v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input type="text" name="name[<?php echo e($v->slug); ?>]"
                                                           data-slug="slug_lang_<?php echo e($v->slug); ?>"
                                                           class="form-control name"
                                                           placeholder="<?php echo e(trans('site.attribute_group.name', [], $v->slug)); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute_group.display_name', [], $v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input type="text" name="display_name[<?php echo e($v->slug); ?>]"
                                                           class="form-control"
                                                           placeholder="<?php echo e(trans('site.attribute_group.display_name', [], $v->slug)); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute_group.slug', [], $v->slug)); ?></label>
                                                <input type="text" name="slug[<?php echo e($v->slug); ?>]"
                                                       id="slug_lang_<?php echo e($v->slug); ?>"
                                                       class="form-control"
                                                       placeholder="<?php echo e(trans('site.attribute_group.slug', [], $v->slug)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute_group.sort_order', [], $v->slug)); ?></label>
                                                <input type="text" name="sort_order"
                                                       class="form-control"
                                                       value="0">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card-body shadow-lg bg-white rounded">
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute_group.description', [], $v->slug)); ?></label>
                                                <div class="input-group">
                                    <textarea name="description[<?php echo e($v->slug); ?>]" rows="4"
                                              class="form-control"
                                              placeholder="<?php echo e(trans('site.attribute_group.description', [], $v->slug)); ?>">
                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary px-4 mt-3 mb-3"><i class="mdi
                        mdi-plus-circle-outline mr-2"></i><?php echo e(trans('site.button_add')); ?></button>
                        <a href="<?php echo e(route('attribute_groups.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-3"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('admin/assets/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/editor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/attribute-groups/add.blade.php ENDPATH**/ ?>