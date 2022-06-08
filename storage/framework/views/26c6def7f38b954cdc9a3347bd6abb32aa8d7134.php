
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="page-title-box">
			<div class="float-right">
				<a class="btn btn-primary" href="<?php echo e(route('admins.create')); ?>"><?php echo e(trans('site.add')); ?></a>
			</div>
			<h4 class="page-title"><?php echo e(trans('site.admin.title')); ?></h4>
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
								<th data-priority="1" class="text-center">STT</th>
								<th data-priority="1"><?php echo e(trans('site.admin.image')); ?></th>
								<th data-priority="1"><?php echo e(trans('site.admin.name')); ?></th>
								<th data-priority="1"><?php echo e(trans('site.admin.email')); ?></th>
								<th data-priority="1"><?php echo e(trans('site.admin.role')); ?></th>
								<th data-priority="1"><?php echo e(trans('site.2fa')); ?></th>
								<th data-priority="1"></th>
							</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td class="text-center"><?php echo e($loop->iteration); ?></td>
										<td><img class="max-height-64" src="<?php echo e(\Sanitize::showImage('images/'.$admin->image)); ?>"></td>
										<td><?php echo e($admin->name); ?></td>
										<td><?php echo e($admin->email); ?></td>
										<td><?php echo e($admin->role_name); ?></td>
										<td>
											<?php if(!empty($admin->secret_code) && $admin->google2fa_enable == 1): ?>
												<a class="btn btn-xs btn-danger px-4 mt-2" href="<?php echo e(route('admins.disable_2fa',$admin->id)); ?>">
													<?php echo e(trans('site.disable_2fa')); ?>

												</a>
												<a class="btn btn-xs btn-warning px-4 mt-2" href="<?php echo e(route('admins.reset_2fa',$admin->id)); ?>">
													<?php echo e(trans('site.reset_2fa')); ?>

												</a>
											<?php else: ?>
												<form action="<?php echo e(route('admins.enable_2fa')); ?>" method="POST">
													<?php echo csrf_field(); ?>
													<input type="hidden" name="id" value="<?php echo e($admin->id); ?>">
													<button type="submit" class="btn btn-xs btn-primary px-4 mt-2">
														<?php echo e(trans('site.enable_2fa')); ?>

													</button>
												</form>
											<?php endif; ?>
										</td>
										<td class="text-right">
											<form class="float-right" action="<?php echo e(route('admins.destroy',$admin->id)); ?>"
												  method="POST" onSubmit="if(!confirm('<?php echo e(trans('site.admin.confirm')); ?>'))
												  {return false;}">
												<?php echo e(method_field('DELETE')); ?>

												<?php echo e(csrf_field()); ?>

												<button type="submit" class="btn btn-xs btn-danger"><i class="fas
												fa-trash"></i></button>
											</form>
											<div class="float-right">
												<a class="btn btn-xs btn-primary mr-3" href="<?php echo e(route('admins.edit',$admin->id)); ?>">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\phoenixCMS\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>