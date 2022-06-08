
<?php $__env->startSection('content'); ?>
    <div class="row">
        <form class="container-fluid" action="<?php echo e(route('attributes.update',$attribute->id)); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-body">
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
                                                <label><?php echo e(trans('site.attribute.name', [], $v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input type="text" name="name[<?php echo e($v->slug); ?>]"
                                                           data-slug="slug_lang_<?php echo e($v->slug); ?>"
                                                           class="form-control name"
                                                           placeholder="<?php echo e(trans('site.attribute.name', [], $v->slug)); ?>"
                                                           value="<?php echo e(old('name['.$v->slug.']', $attribute->name[$v->slug] ?? null)); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute.slug', [], $v->slug)); ?></label>
                                                <input type="text" name="slug[<?php echo e($v->slug); ?>]"
                                                       id="slug_lang_<?php echo e($v->slug); ?>"
                                                       class="form-control"
                                                       placeholder="<?php echo e(trans('site.attribute.slug', [], $v->slug)); ?>"
                                                       value="<?php echo e($attribute->slug[$v->slug] ?? null); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute.display_name', [], $v->slug)); ?></label>
                                                <div class="input-group">
                                                    <input type="text" name="display_name[<?php echo e($v->slug); ?>]"
                                                           data-slug="slug_lang_<?php echo e($v->slug); ?>"
                                                           class="form-control name"
                                                           placeholder="<?php echo e(trans('site.attribute.display_name', [], $v->slug)); ?>"
                                                           value="<?php echo e($attribute->display_name[$v->slug] ?? null); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo e(trans('site.attribute.unit', [], $v->slug)); ?></label>
                                                <div class="input-group ">
                                                    <input name="unit[<?php echo e($v->slug); ?>]"
                                                           class="form-control"
                                                           placeholder="<?php echo e(trans('site.attribute.unit', [], $v->slug)); ?>"
                                                           value="<?php echo e($attribute->unit[$v->slug] ?? null); ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label><?php echo e(trans('site.attribute.type')); ?></label>
                                <div class="input-group">
                                    <select name="type" rows="7"
                                            class="form-control "
                                            id="attribute-option"
                                            value="<?php echo e($attribute->type); ?>">
                                        <?php $__currentLoopData = config('system.type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e($attribute->type == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php if(isset($attribute->options)): ?>
                                    <div id="kq">
                                    <div class="row">
                                        <div class="col-lg-12" id="attribute-option">
                                            <div class="">
                                                <fieldset>
                                                    <div class="repeater-custom-show-hide">
                                                        <div data-repeater-list="options">
                                                            <?php $__currentLoopData = $attribute->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div data-repeater-item="">
                                                                    <div class="form-group row  d-flex align-items-end">

                                                                        <div class="col-sm-8">
                                                                            <label class="control-label"><?php echo e(trans('site.attribute.option')); ?></label>
                                                                            <input type="text" name="value"
                                                                                   value="<?php echo e($option['value']); ?>"
                                                                                   class="form-control">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="float-right"><span
                                                                                        data-repeater-delete=""
                                                                                        class="btn btn-danger btn-sm">
                                                                    <span class="far fa-trash-alt mr-1"></span> <?php echo e(trans('site.button_remove')); ?>

                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div><!--end repeat-list-->

                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-4s">
                                                                <span data-repeater-create=""
                                                                      class="btn btn-secondary btn-md">
                                                                    <span class="fa fa-plus"></span> <?php echo e(trans('site.button_add')); ?>

                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <?php else: ?>
                                    <div id="kq">

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-blue btn-square waves-effect waves-light px-4 mt-3 mb-3">
                            <i class="mdi mdi-check-all mr-2"></i><?php echo e(trans('site.button_update')); ?></button>
                        <a href="<?php echo e(route('attributes.index')); ?>">
                            <button type="button"
                                    class="btn btn-danger ml-2 px-4 mb-3 mt-3"><i class="fas fa-window-close"></i>
                                <?php echo e(trans('site.reset')); ?>

                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('admin/assets/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/editor.js')); ?>"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/waves.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="<?php echo e(asset('admin/assets/plugins/repeater/jquery.repeater.min.js')); ?>"></script>
    <script src="../assets/pages/jquery.form-repeater.js"></script>
    <script src="../assets/js/app.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#attribute-option").change(function () {
                var value = $("#attribute-option :selected").val();
                // console.log(value);
                $.ajax({
                    url: "<?php echo e(route('add_option')); ?>",
                    method: 'POST',
                    data: {
                        value: value,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $("#kq").html(data);
                        $('.repeater-custom-show-hide').repeater({
                            show: function () {
                                $(this).slideDown();
                            },
                            hide: function (remove) {
                                if (confirm('Are you sure you want to remove this item?')) {
                                    $(this).slideUp(remove);
                                }
                            }
                        });
                    },
                    error: function (data) {
                    }
                });
            })
        });
    </script>
    <script>
        $('.repeater-custom-show-hide').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (remove) {
                if (confirm('Are you sure you want to remove this item?')) {
                    $(this).slideUp(remove);
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/attributes/edit.blade.php ENDPATH**/ ?>