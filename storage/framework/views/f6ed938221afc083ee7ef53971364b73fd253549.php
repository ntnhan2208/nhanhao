
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('attributes.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.attribute.title')); ?></h4>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute.display_name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute.slug')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute.type')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute.unit')); ?></th>
                                    <th data-priority="1" style="width: 300px"></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Sanitize::getValueLangByLocale($attribute->name)); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Sanitize::getValueLangByLocale($attribute->display_name)); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Sanitize::getValueLangByLocale($attribute->slug)); ?>

                                        </td>
                                        <td>
                                            <?php echo e(config('system.type.'.$attribute->type)); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Sanitize::getValueLangByLocale($attribute->unit)); ?>

                                        </td>
                                        <td>
                                            <span><strong><?php echo e(trans('site.page.created_at')); ?>:</strong> <?php echo e($attribute->created_at); ?></span><br>
                                        </td>
                                        <td>
                                            <form class="float-right"
                                                  action="<?php echo e(route('attributes.destroy',$attribute->id)); ?>"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.language.confirm')); ?>')) {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right mr-3">
                                                <a href="<?php echo e(route('attributes.edit', $attribute->id)); ?>"
                                                   class="btn btn-xs btn-primary"><i class="far fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/attributes/index.blade.php ENDPATH**/ ?>