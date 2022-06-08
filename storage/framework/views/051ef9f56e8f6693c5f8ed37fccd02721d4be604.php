
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right"
                       href="<?php echo e(route('product.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.product.title')); ?></h4>
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
                                    <th data-priority="1"><?php echo e(trans('site.product.image')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.product.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.product.slug')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.product.price')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.product.acreage')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.product.address')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.product.is_enabled')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <img class="max-height-64"
                                                 src="<?php echo e(asset('images/'.head($product->images))); ?>" width="100"
                                                 height="120">
                                        </td>
                                        <td><?php echo e(Sanitize::getValueLangByLocale($product->name)); ?>  </td>
                                        <td><?php echo e(Sanitize::getValueLangByLocale($product->slug)); ?></td>
                                        <td><?php echo e($product->price_unit); ?></td>
                                        <td><?php echo e($product->acreage_m2); ?></td>
                                        <td>
                                            <li><?php echo e(optional($product->province)->translated_name); ?></li>
                                            <li><?php echo e(optional($product->district)->translated_name); ?></li>
                                            <li><?php echo e(optional($product->ward)->translated_name); ?></li>
                                        </td>
                                        <td>
                                            <?php if($product->is_enabled ): ?>
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatusSwitchStatus<?php echo e($product->id); ?>"
                                                           checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($product->id); ?>"></label>
                                                </div>
                                            <?php else: ?>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus<?php echo e($product->id); ?>">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($product->id); ?>"></label>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <form class="float-right"
                                                  action="<?php echo e(route('product.destroy', $product->id)); ?>"
                                                  method="POST"
                                                  onSubmit="if(!confirm('<?php echo e(trans('site.product.confirm')); ?>'))
												  {return false;}">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('product.edit', $product->id)); ?>">
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/product/index.blade.php ENDPATH**/ ?>