
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/scss/_form-advanced.scss')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <form action="<?php echo e(route('attribute_groups.update',$attributeGroup->id)); ?>"
                  method="POST"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div>
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
                                                    <label><?php echo e(trans('site.attribute_group.name', [], $v->slug)); ?></label>
                                                    <div class="input-group">
                                                        <input type="text" name="name[<?php echo e($v->slug); ?>]"
                                                               data-slug="slug_lang_<?php echo e($v->slug); ?>"
                                                               class="form-control name"
                                                               placeholder="<?php echo e(trans('site.attribute_group.name', [], $v->slug)); ?>"
                                                               value="<?php echo Sanitize::getValueLangByLocale($attributeGroup->name); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(trans('site.attribute_group.display_name', [], $v->slug)); ?></label>
                                                    <div class="input-group">
                                                        <input type="text" name="display_name[<?php echo e($v->slug); ?>]"
                                                               class="form-control"
                                                               placeholder="<?php echo e(trans('site.attribute_group.display_name', [], $v->slug)); ?>"
                                                               value="<?php echo Sanitize::getValueLangByLocale($attributeGroup->display_name); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(trans('site.attribute_group.slug', [], $v->slug)); ?></label>
                                                    <input type="text" name="slug[<?php echo e($v->slug); ?>]"
                                                           id="slug_lang_<?php echo e($v->slug); ?>"
                                                           class="form-control"
                                                           placeholder="<?php echo e(trans('site.attribute_group.slug', [], $v->slug)); ?>"
                                                           value="<?php echo Sanitize::getValueLangByLocale($attributeGroup->slug); ?>"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(trans('site.attribute_group.description', [], $v->slug)); ?></label>
                                                    <div class="input-group">
                                                                            <textarea name="description[<?php echo e($v->slug); ?>]"
                                                                                      rows="4"
                                                                                      class="form-control"
                                                                                      placeholder="<?php echo e(trans('site.attribute_group.description', [], $v->slug)); ?>">
                                                                               <?php echo Sanitize::getValueLangByLocale($attributeGroup->description); ?>

                                                                            </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(trans('site.attribute_group.sort_order', [], $v->slug)); ?></label>
                                                    <input type="text" name="sort_order"
                                                           class="form-control"
                                                           value="<?php echo e($attributeGroup->sort_order); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <button type="submit"
                                            class="btn btn-blue btn-square waves-effect waves-light px-4 mt-3 mb-3">
                                        <i class="mdi mdi-check-all mr-2"></i><?php echo e(trans('site.button_update')); ?></button>
                                    <a href="<?php echo e(route('attribute_groups.index')); ?>">
                                        <button type="button"
                                                class="btn btn-danger ml-2 px-4 mb-3 mt-3"><i
                                                    class="fas fa-window-close"></i>
                                            <?php echo e(trans('site.reset')); ?>

                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-8">
            <form action="<?php echo e(route('sync_relationship',$attributeGroup->id)); ?>" method="POST"
                  enctype="multipart/form-data" id="myForm">
                <?php echo csrf_field(); ?>
                <div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="text-uppercase font-14"><?php echo e(trans('site.attribute_group.add_attribute')); ?></p>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <select id="attribute" name="attributes"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <?php $__currentLoopData = $allAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eachAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($eachAttribute->id); ?>"><?php echo e(Sanitize::getValueLangByLocale($eachAttribute->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <select id="filter_type" name="filter_type"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="none"><?php echo e(config('system.filter_type.'.'')); ?></option>
                                            <option value="select"><?php echo e(config('system.filter_type.'.'select')); ?></option>
                                            <option value="checkbox"><?php echo e(config('system.filter_type.'.'checkbox')); ?></option>
                                            <option value="radiobutton"><?php echo e(config('system.filter_type.'.'radiobutton')); ?></option>
                                            <option value="text"><?php echo e(config('system.filter_type.'.'text')); ?></option>
                                            <option value="number"><?php echo e(config('system.filter_type.'.'number')); ?></option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="text" name="sort_order_att" id="sort_order_att"
                                               class="form-control"
                                               value="0"
                                               placeholder="<?php echo e(trans('site.attribute_group.sort_order', [], $v->slug)); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <button id="add-attribute" class="btn btn-primary" type="button"><i
                                                    class="mdi mdi-plus-circle-outline mr-2"></i><?php echo e(trans('site.button_add')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="table1">
                                <table id="table2" class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th data-priority="1"><?php echo e(trans('site.attribute.name')); ?></th>
                                        <th data-priority="1"><?php echo e(trans('site.attribute.type')); ?></th>
                                        <th data-priority="1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(Sanitize::getValueLangByLocale($attribute->name)); ?></td>
                                            <td><?php echo e(config('system.type.'.$attribute->type)); ?></td>
                                            <td class="text-right">
                                                <a id="detach" class="btn btn-xs btn-danger"
                                                   href="<?php echo e(route('detach_relationship',[$attributeGroup->id,$attribute->id])); ?>"><i
                                                            class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p class="badge badge-soft-danger"><?php echo e(trans('site.attribute_group.danger')); ?></p>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $(document).on('click', 'button#add-attribute', function (e) {
                e.preventDefault();
                var attribute = $('#attribute option:selected').val();
                var filterType = $('#filter_type option:selected').val();
                var sortOrderAtt = $('#sort_order_att').val();
                // var myData = $('#myForm').serializeArray();
                var form = $(this).closest('form');
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    // data: myData,
                    data: {
                        attribute: attribute,
                        filterType: filterType,
                        sortOrderAtt: sortOrderAtt
                    },
                    success: function (data) {
                        $('#table1').load(' #table2');
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            })
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $(document).on('click', 'a#detach', function (e) {
                e.preventDefault();
                var a = $(this).closest('a');
                $.ajax({
                    url: a.attr('href'),
                    method: 'GET',
                    success: function (data) {
                        $('#table1').load(' #table2');
                    },
                    error: function (data) {
                    }
                });
            })
        });
    </script>
    <script src="<?php echo e(asset('admin/assets/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/editor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/attribute-groups/edit.blade.php ENDPATH**/ ?>