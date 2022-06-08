
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('attribute_groups.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.attribute_group.title')); ?></h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute_group.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute_group.display_name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.attribute_group.sort_order')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $attributeGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo Sanitize::getValueLangByLocale($attributeGroup->name); ?></td>
                                        <td><?php echo Sanitize::getValueLangByLocale($attributeGroup->display_name); ?></td>
                                        <td><?php echo e(($attributeGroup->sort_order)); ?></td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="<?php echo e(route('attribute_groups.destroy',$attributeGroup)); ?>}"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.attribute_group.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('attribute_groups.edit',$attributeGroup)); ?>">
                                                    <i class="far fa-edit"></i>
                                                </a>
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/attribute-groups/index.blade.php ENDPATH**/ ?>