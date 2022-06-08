<?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <td></td>
    <td><?php echo e(str_repeat("--",$child->depth).Sanitize::getValueLangByLocale($child->name)); ?></td>
    <td><?php echo e(Sanitize::getValueLangByLocale($child->slug)); ?></td>
    <td><?php echo Sanitize::getValueLangByLocale($child->description); ?></td>
    <td>
        <?php if($child->is_enabled ): ?>
            <div class="custom-control custom-switch switch-primary">
                <input type="checkbox" class="custom-control-input"
                       id="customSwitchStatus<?php echo e($child->id); ?>" checked>
                <label class="custom-control-label" for="customSwitchStatus<?php echo e($child->id); ?>"></label>
            </div>
        <?php else: ?>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitchcustomSwitchStatus<?php echo e($child->id); ?>">
                <label class="custom-control-label" for="customSwitchStatus<?php echo e($child->id); ?>"></label>
            </div>
        <?php endif; ?>
    </td>
    <td class="text-right">
        <form class="float-right" action="<?php echo e(route('categories.destroy',$category->id)); ?>"
              method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.category.confirm')); ?>'))
												  {return false;}">
            <?php echo e(method_field('DELETE')); ?>

            <?php echo e(csrf_field()); ?>

            <button type="submit" class="btn btn-xs btn-danger">
                <i class="fas fa-trash"></i>
            </button>
        </form>
        <div class="float-right">
            <a class="btn btn-xs btn-primary mr-3" href="<?php echo e(route('categories.edit',$child)); ?>">
                <i class="far fa-edit"></i>
            </a>
        </div>
    </td>

    <tr>
        <?php if(count($child->children)): ?>
            <?php echo $__env->make('admin.categories.sub-categories',['children' => $child->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/categories/sub-categories.blade.php ENDPATH**/ ?>