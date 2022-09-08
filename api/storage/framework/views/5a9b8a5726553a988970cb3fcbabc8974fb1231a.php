<?php $__env->startSection('title', 'Add Admin '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(route('admin.sub-admins.index')); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.admins.Add_User'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.sub-admins.store')); ?>" method="POST" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(old('name')); ?>" name="name" required id="name" placeholder="<?php echo app('translator')->getFromJson('admin.name'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.email'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(old('email')); ?>" name="email" required id="name" placeholder="<?php echo app('translator')->getFromJson('admin.email'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.password'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" value="" name="password" required id="password" placeholder="<?php echo app('translator')->getFromJson('admin.password'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.password_confirmation'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" value="" name="password_confirmation" required id="password_confirmation" placeholder="<?php echo app('translator')->getFromJson('admin.password_confirmation'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permission" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.role'); ?></label>
                    <div class="col-xs-10">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->id>5): ?>
                                <label><input type="checkbox" value="<?php echo e($value->id); ?>" name="roles[]" id="role" /><?php echo e($value->name); ?></label>
                            <?php endif; ?>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-12 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.admins.Add_User'); ?></button>
                        <a href="<?php echo e(route('admin.sub-admins.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>