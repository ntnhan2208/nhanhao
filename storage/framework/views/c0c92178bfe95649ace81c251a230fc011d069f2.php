<div class="col-12">
    
    
    
    
    
    <div class="row">
        <h5>
            <?php echo e(trans('site.attribute.name')); ?>: <?php echo e(Sanitize::getValueLangByLocale($attribute->name)); ?>

        </h5>
    </div>
    <div class="row">
        <h5><?php echo e(trans('site.attribute.option')); ?>:</h5>
        <div class="col-12">
            <div class="form-group">
                <select class="form-control" name="attributes[<?php echo e($attribute->id); ?>][value]">
                    <?php $__currentLoopData = $attribute-> options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option['value']); ?>"
                                <?php if(isset($values)): ?> <?php if($option['value']==$values->pivot->value): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($option['value']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

        </div>
    </div>
</div>

<?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/product/sub-types/select.blade.php ENDPATH**/ ?>