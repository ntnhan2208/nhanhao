
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="mt-0 header-title"><?php echo e(trans('site.type.add')); ?></h4>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($k == 0 ? 'active' : ''); ?>"
                                   data-toggle="pill"
                                   href="#type_detail_<?php echo e($v->slug); ?>">
                                    <?php echo e($v->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <form action="<?php echo e(route('type.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($k == 0 ? 'active show' : ''); ?>"
                                     id="type_detail_<?php echo e($v->slug); ?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><?php echo e(trans('site.type.name',[],$v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input type="text"
                                                           name="name[<?php echo e($v->slug); ?>]"
                                                           data-slug="<?php echo e('slug-'.$v->id); ?>"
                                                           class="form-control name"
                                                           value="<?php echo e(old('name.'.$v->slug)); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><?php echo e(trans('site.type.slug',[],$v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input name="slug[<?php echo e($v->slug); ?>]" type="text"
                                                           id="<?php echo e('slug-'.$v->id); ?>"
                                                           class="form-control"
                                                           value="<?php echo e(old('slug.'.$v->slug)); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label><?php echo e(trans('site.type.description',[],$v->slug)); ?></label>
                                                <div class="input-group">
                                                    <textarea name="description[<?php echo e($v->slug); ?>]"
                                                              class="form-control editor"
                                                              cols="30" rows="5">
                                                        <?php echo e(old('description.'.$v->slug)); ?>

                                                    </textarea>
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
                                    <label><?php echo e(trans('site.type.is_enabled')); ?></label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="0"><?php echo e(trans('site.no')); ?></option>
                                        <option value="1"><?php echo e(trans('site.yes')); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="mb-3"><?php echo e(trans('site.type.attribute_group')); ?></label>
                                    <select name="attribute_group_id[]" class="select2 mb-3 select2-multiple"
                                            style="width: 100%"
                                            multiple="multiple" data-placeholder="Choose">
                                        <?php $__currentLoopData = $attributeGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($attributeGroup->id); ?>"><?php echo e(Sanitize::getValueLangByLocale($attributeGroup->name)); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mt-3 mb-3"><i class="mdi
                            mdi-plus-circle-outline mr-2"></i><?php echo e(trans('site.button_add')); ?></button>
                        <a href="<?php echo e(route('type.index')); ?>">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/type/add.blade.php ENDPATH**/ ?>