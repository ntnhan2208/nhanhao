<div class="row">
    <div class="col-lg-12" id="attribute-option">
        <div class="">
            <fieldset>
                <div class="repeater-custom-show-hide">
                    <div data-repeater-list="options">
                        <div data-repeater-item="">
                            <div class="form-group row  d-flex align-items-end">
                                <div class="col-sm-8">
                                    <label class="control-label"><?php echo e(trans('site.attribute.option')); ?></label>
                                    <input type="text" name="value" value="" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <div class="float-right"><span
                                                data-repeater-delete=""
                                                class="btn btn-danger btn-sm">
                                            <span class="far fa-trash-alt mr-1"></span> <?php echo e(trans('site.button_remove')); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-4s">
                            <span data-repeater-create="" class="btn btn-secondary btn-md">
                                <span class="fa fa-plus"></span> <?php echo e(trans('site.button_add')); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/admin/attributes/option.blade.php ENDPATH**/ ?>