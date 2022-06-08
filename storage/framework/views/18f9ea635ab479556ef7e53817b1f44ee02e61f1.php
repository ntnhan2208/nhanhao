<div class="row">
    <div class="col-lg-12">
        <p class="text-uppercase font-14"><?php echo e(trans('site.product.attribute_value')); ?></p>
        <div class="form-group">
            <?php $__currentLoopData = $attributeGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $attributeGroup->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($values)): ?>
                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($v->type==$attribute->type): ?>
                                <div class="input-group">
                                    <?php echo $__env->make('admin.product.sub-types.'.$attribute->type,['values'=>$v], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <hr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="input-group">
                            <?php echo $__env->make('admin.product.sub-types.'.$attribute->type, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/product/attribute-type.blade.php ENDPATH**/ ?>