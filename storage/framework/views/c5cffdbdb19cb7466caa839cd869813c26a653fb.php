
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('categories.update', $categoryID->id)); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div>
                            <h4 class="mt-0 header-title"><?php echo e(trans('site.category.update')); ?></h4>
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
                        </div>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                            <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php echo e($k == 0 ? 'active show' : ''); ?>"
                                     id="category_detail_tab_<?php echo e($v->slug); ?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><?php echo e(trans('site.category.name',[],$v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input type="text" name="name[<?php echo e($v->slug); ?>]"
                                                           data-slug="slug_lang_<?php echo e($v->slug); ?>"
                                                           class="form-control name"
                                                           value="<?php echo e(old('name['.$v->slug.']', $categoryID->name[$v->slug] ?? null)); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><?php echo e(trans('site.category.slug',[],$v->slug)); ?></label>
                                                <input type="text" name="slug[<?php echo e($v->slug); ?>]"
                                                       id="slug_lang_<?php echo e($v->slug); ?>"
                                                       class="form-control"
                                                       value="<?php echo e($category->slug[$v->slug] ?? null); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label><?php echo e(trans('site.category.description',[],$v->slug)); ?></label>
                                                <div class="input-group">
                                                    <textarea name="description[<?php echo e($v->slug); ?>]" rows="7"
                                                              class="form-control editor">
                                                        <?php echo e(old('description['.$v->slug.']', $categoryID->description[$v->slug] ?? null)); ?>

                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label><?php echo e(trans('site.category.is_enabled')); ?></label>
                                        <select name="is_enabled"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="1" <?php echo e(($categoryID->is_enabled == 1) ? 'selected' : ''); ?>><?php echo e(trans('site.yes')); ?></option>
                                            <option value="0" <?php echo e(($categoryID->is_enabled == 0) ? 'selected' : ''); ?>><?php echo e(trans('site.no')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label><?php echo e(trans('site.category.categories')); ?></label>
                                        <select name="parent_id"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($category->id != $categoryID->id): ?>
                                                    <option value="<?php echo e($category->id); ?>" <?php echo e($categoryID->parent_id===$category->id ? 'selected': ''); ?>>
                                                        <?php echo e($category->translated_name); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                            <?php echo e(trans('site.button_update')); ?>

                        </button>
                        <a href="<?php echo e(route('categories.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2 px-4 mb-3 mt-2">
                                <i class="fas fa-window-close"></i>
                                <?php echo e(trans('site.reset')); ?>

                            </button>
                        </a>

                    </form>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('script'); ?>
            <script src="<?php echo e(asset('admin/assets/js/editor.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>