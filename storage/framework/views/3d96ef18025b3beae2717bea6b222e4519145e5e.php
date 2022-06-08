<div class="col-12">
    
    
    
    
    
    <div class="row">
        <h5>
            <?php echo e(trans('site.attribute.name')); ?>: <?php echo e(Sanitize::getValueLangByLocale($attribute->name)); ?>

        </h5>
    </div>
    <div class="row">
        <h5><?php echo e(trans('site.attribute.option')); ?>:</h5>
        <div class="col-12">
            <div class="form-check">
                <?php $__currentLoopData = $attribute->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input class="form-check-input" type="radio" id="attribute_radio"
                           name="attributes[<?php echo e($attribute->id); ?>][value]"
                           value="<?php echo e($option['value']); ?>"
                           <?php if(isset($values)): ?> <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($option['value']==$v): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>>
                    <label for="attribute_radio"><?php echo e($option['value']); ?></label><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/product/sub-types/radio.blade.php ENDPATH**/ ?>