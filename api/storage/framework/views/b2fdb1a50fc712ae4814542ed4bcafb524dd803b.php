<?php $__env->startSection('title', 'Change Password '); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-9">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title"><?php echo app('translator')->getFromJson('user.profile.change_password'); ?></h4>
            </div>
        </div>
        <?php if(config('constants.demo_mode', 0) == 1): ?>
            <div class="alert alert-danger">
                 <?php echo app('translator')->getFromJson('admin.demomode'); ?>
            </div>
        <?php else: ?>
            <?php echo $__env->make('common.notify', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <div class="row no-margin edit-pro">
            <form action="<?php echo e(url('change/password')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('user.profile.old_password'); ?></label>
                        <input type="password" name="old_password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.profile.old_password'); ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('user.profile.password'); ?></label>
                        <input type="password" name="password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.profile.password'); ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('user.profile.confirm_password'); ?></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.profile.confirm_password'); ?>">
                    </div>
                  
                    <div>
                        <button type="submit" class="form-sub-btn big"><?php echo app('translator')->getFromJson('user.profile.change_password'); ?></button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>