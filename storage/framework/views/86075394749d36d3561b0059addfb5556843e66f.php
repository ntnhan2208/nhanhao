
<?php $__env->startSection('stylesheet'); ?>
    <link href="<?php echo e(asset('admin/assets/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="mt-0 header-title"><?php echo e(trans('site.product.add')); ?></h4>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($k == 0 ? 'active' : ''); ?>"
                                   data-toggle="pill"
                                   href="#product_detail_<?php echo e($v->slug); ?>">
                                    <?php echo e($v->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="tab-content detail-list pro-order-box" id="pills-tabContent">
                                    <?php $__currentLoopData = $adminLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane fade <?php echo e($k == 0 ? 'active show' : ''); ?>"
                                             id="product_detail_<?php echo e($v->slug); ?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label><?php echo e(trans('site.product.name',[],$v->slug)); ?></label>
                                                        <div class="input-group">
                                                            <input type="text"
                                                                   name="name[<?php echo e($v->slug); ?>]"
                                                                   data-slug="<?php echo e('slug-'.$v->id); ?>"
                                                                   class="form-control name"
                                                                   value="<?php echo e(old('name.'.$v->slug)); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label><?php echo e(trans('site.product.slug',[],$v->slug)); ?></label>
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
                                                        <label><?php echo e(trans('site.product.address',[],$v->slug)); ?></label>
                                                        <div class="input-group">
                                                            <input type="text"
                                                                   name="address[<?php echo e($v->slug); ?>]"
                                                                   class="form-control"
                                                                   value="<?php echo e(old('address.'.$v->slug)); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label><?php echo e(trans('site.product.description',[],$v->slug)); ?></label>
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label><?php echo e(trans('site.product.price')); ?></label>
                                            <div class="input-group">
                                                <input type="text" name="price"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo e(trans('site.product.acreage')); ?></label>
                                            <div class="input-group">
                                                <input type="text" name="acreage"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label><?php echo e(trans('site.product.is_enabled')); ?></label>
                                            <select name="is_enabled"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="0"><?php echo e(trans('site.no')); ?></option>
                                                <option value="1"><?php echo e(trans('site.yes')); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo e(trans('site.product.unit')); ?></label>
                                            <select name="unit"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                <?php $__currentLoopData = config('system.unit'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-3"><?php echo e(trans('site.product.provinces')); ?></label>
                                            <select id="province" name="province_id" class="select2 mb-3"
                                                    style="width: 100%"
                                                    data-placeholder="Choose">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($province->id); ?>">
                                                        <?php echo e($province->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-3"><?php echo e(trans('site.product.districts')); ?></label>
                                            <select class="select2 mb-3" id="district" name="district_id">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-3"><?php echo e(trans('site.product.wards')); ?></label>
                                            <select class="select2 mb-3" id="ward" name="ward_id">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-3"><?php echo e(trans('site.product.categories')); ?></label>
                                            <select name="categories"
                                                    class="select2 mb-3 select2-multiple"
                                                    style="width: 100%"
                                                    multiple="multiple"
                                                    data-placeholder="Choose">
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>">
                                                        <?php echo e($category->translated_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3"><?php echo e(trans('site.product.types')); ?></label>
                                            <select name="type_id"
                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                    style="width: 100%"
                                                    data-placeholder="Choose" id="type-option">
                                                <option></option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type->id); ?>">
                                                        <?php echo e($type->translated_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.product.image')); ?></label>
                                    <input type="file" name="file[]" id="input-file-now"
                                           class="dropify"
                                           multiple="multiple"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-lg-12" id="result">

                                </div>
                            </div>
                        </div>
                                <button type="submit" class="btn btn-primary px-4 mt-3 mb-3">
                                    <i class="mdi mdi-plus-circle-outline mr-2"></i>
                                    <?php echo e(trans('site.button_add')); ?>

                                </button>
                                <a href="<?php echo e(route('product.index')); ?>">
                                    <button type="button" class="btn btn-danger ml-2
                                    px-4 mb-3 mt-3"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?>

                                    </button>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#type-option").change(function () {
                var value = $("#type-option :selected").val();
                $.ajax({
                    url: "<?php echo e(route('sync_option')); ?>",
                    method: 'POST',
                    data: {
                        value: value,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $("#result").html(data);
                    },
                    error: function (data) {
                    }
                });
            });
            $('#province').on('change', function () {
                let province_id = this.value;
                $("#district").html('');
                $.ajax({
                    url: "<?php echo e(route('get_district')); ?>",
                    type: "POST",
                    data: {
                        province_id: province_id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#district').html('<option value=""></option>');
                        $.each(result.districts, function (key, value) {
                            $("#district").append('<option value=" ' + value.id + ' ">' + value.name + '</option>');
                        });
                        $('#ward').html('<option value=""></option>');
                    }
                });
            });
            $('#district').on('change', function () {
                let district_id = this.value;
                $("#ward").html('');
                $.ajax({
                    url: "<?php echo e(route('get_ward')); ?>",
                    type: "POST",
                    data: {
                        district_id: district_id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#ward').html('<option value=""></option>');
                        $.each(result.wards, function (key, value) {
                            $("#ward").append('<option value=" ' + value.id + ' ">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/product/add.blade.php ENDPATH**/ ?>