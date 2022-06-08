
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box">
                <div class="float-right">
                    <a class="btn btn-primary float-right" href="<?php echo e(route('type.create')); ?>"><?php echo e(trans('site.add')); ?></a>
                </div>
                <h4 class="page-title"><?php echo e(trans('site.type.title')); ?></h4>
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
                                    <th data-priority="1"><?php echo e(trans('site.type.name')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.type.slug')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.type.description')); ?></th>
                                    <th data-priority="1"><?php echo e(trans('site.type.is_enabled')); ?></th>
                                    <th data-priority="1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e(Sanitize::getValueLangByLocale($type->name)); ?>  </td>
                                        <td><?php echo e(Sanitize::getValueLangByLocale($type->slug)); ?></td>
                                        <td><?php echo Sanitize::getValueLangByLocale($type->description); ?></td>
                                        <td>
                                            <?php if($type->is_enabled ): ?>
                                                <div class="custom-control custom-switch switch-primary">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchStatus<?php echo e($type->id); ?>" checked>
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($type->id); ?>">
                                                    </label>
                                                </div>
                                            <?php else: ?>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customSwitchcustomSwitchStatus<?php echo e($type->id); ?>">
                                                    <label class="custom-control-label"
                                                           for="customSwitchStatus<?php echo e($type->id); ?>">
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <form class="float-right" action="<?php echo e(route('type.destroy', $type->id)); ?>"
                                                  method="POST">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <?php if(count($types)>1 || $type->products()->exists()==null ): ?>
                                                <button class="btn btn-xs btn-danger"
                                                        <?php if($type->products()->exists()!=null): ?>
                                                        data-toggle="modal"
                                                        type="button" data-target="#confirmDelete-<?php echo e($type->id); ?>"
                                                        <?php else: ?>
                                                        type="submit"
                                                        <?php endif; ?>>
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <?php endif; ?>
                                                <div class="modal fade" id="confirmDelete-<?php echo e($type->id); ?>"
                                                     role="dialog"
                                                     aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo e(trans('site.type.choose')); ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <select name="type_id"
                                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modalType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($modalType->id !== $type->id): ?>
                                                                            <option value="<?php echo e($modalType->id); ?>">
                                                                                <?php echo e(Sanitize::getValueLangByLocale($modalType->name)); ?>

                                                                            </option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    <?php echo e(trans('site.type.cancel_modal')); ?>

                                                                </button>
                                                                <button type="submit" class="btn btn-danger"
                                                                        id="confirm">
                                                                    <?php echo e(trans('site.type.delete_modal')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="float-right">
                                                <a class="btn btn-xs btn-primary mr-3"
                                                   href="<?php echo e(route('type.edit', $type->id)); ?>">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/type/index.blade.php ENDPATH**/ ?>