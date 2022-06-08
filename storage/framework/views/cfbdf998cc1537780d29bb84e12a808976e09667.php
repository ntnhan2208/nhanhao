
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="page-title-box">
			<div class="float-right">
				<a class="btn btn-primary float-right" href="<?php echo e(route('languages.create')); ?>"><?php echo e(trans('site.add')); ?></a>
			</div>
			<h4 class="page-title"><?php echo e(trans('site.language.title')); ?></h4>
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
									<th data-priority="1"><?php echo e(trans('site.language.name')); ?></th>
									<th data-priority="1"><?php echo e(trans('site.language.code')); ?></th>
									<th data-priority="1"><?php echo e(trans('site.language.default')); ?></th>
									<th data-priority="1"></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<th><?php echo e($loop->iteration); ?></th>
										<td><?php echo e($language->name); ?></td>
										<td><?php echo e($language->code); ?></td>
										<td>
											<?php if($language->default): ?>
												<div class="custom-control custom-switch switch-primary">
													<input type="checkbox" class="custom-control-input"
														   id="customSwitchStatus<?php echo e($loop->iteration); ?>" checked>
													<label class="custom-control-label" for="customSwitchStatus<?php echo e($loop->iteration); ?>"></label>
												</div>
											<?php else: ?>
												<div class="custom-control custom-switch">
													<input type="checkbox" class="custom-control-input" id="customSwitchcustomSwitchStatus<?php echo e($loop->iteration); ?>">
													<label class="custom-control-label" for="customSwitchStatus<?php echo e($loop->iteration); ?>"></label>
												</div>
											<?php endif; ?>
										</td>
										<td class="text-right">
											<form class="float-right" action="/admin/languages/<?php echo e($language-> id); ?>"
												  method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.language.confirm')); ?>'))
												  {return false;}">
												<?php echo e(method_field('DELETE')); ?>

												<?php echo e(csrf_field()); ?>

												<button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
											</form>
											<div class="float-right">
												<a class="btn btn-xs btn-primary mr-3" href="<?php echo e(route('languages.edit',$language)); ?>">
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\phoenixCMS\resources\views/admin/language/index.blade.php ENDPATH**/ ?>