<?php $__env->startSection('title', 'Change Password '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
    	<div class="box box-block bg-white">

			<h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.account.change_password'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('fleet.password.update')); ?>" method="POST" role="form">
            	<?php echo e(csrf_field()); ?>


            	<div class="form-group row">
					<label for="old_password" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.account.old_password'); ?></label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="old_password" id="old_password" placeholder="<?php echo app('translator')->getFromJson('admin.account.old_password'); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="password" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.account.password'); ?></label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="password" id="password" placeholder="<?php echo app('translator')->getFromJson('admin.account.new_password'); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="password_confirmation" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.account.password_confirmation'); ?></label>
					<div class="col-xs-10">
						<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="<?php echo app('translator')->getFromJson('admin.account.retype_password'); ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="zipcode" class="col-xs-12 col-form-label"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.account.change_password'); ?></button>
					</div>
				</div>

			</form>
		</div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>