
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('categories.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.category.title')); ?></h4>
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
                                    <th data-priority="1"><?php echo e(trans('site.category.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.category.slug')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.category.description')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.category.is_enabled')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e(Sanitize::getValueLangByLocale($category->name)); ?></td>
                                        <td><?php echo e(Sanitize::getValueLangByLocale($category->slug)); ?></td>
                                        <td><?php echo Sanitize::getValueLangByLocale($category->description); ?></td>
                                        <td>
                                            <?php if($category->is_enabled ): ?>
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatus<?php echo e($category->id); ?>" checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($category->id); ?>">
                                                    </label>
                                                </div>
                                            <?php else: ?>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus<?php echo e($category->id); ?>">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($category->id); ?>">
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="<?php echo e(route('categories.destroy',$category->id)); ?>"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.category.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('categories.edit',$category)); ?>">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if(count($category->children)): ?>
                                            <?php echo $__env->make('admin.categories.sub-categories',['children' => $category->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
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


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>