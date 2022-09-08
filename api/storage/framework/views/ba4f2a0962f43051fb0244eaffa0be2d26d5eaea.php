<?php $__env->startSection('title', 'Update Provider '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(route('fleet.provider.index')); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.provides.update_provider'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('fleet.provider.update', $provider->id )); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group row">
                    <label for="first_name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.first_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->first_name); ?>" name="first_name" required id="first_name" placeholder="<?php echo app('translator')->getFromJson('admin.last_name'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.last_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->last_name); ?>" name="last_name" required id="last_name" placeholder="<?php echo app('translator')->getFromJson('admin.last_name'); ?>">
                    </div>
                </div>


                <div class="form-group row">
                    
                    <label for="picture" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                    <div class="col-xs-10">
                    <?php if(isset($provider->picture)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e($provider->picture); ?>">
                    <?php endif; ?>
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.mobile'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="<?php echo e($provider->mobile); ?>" name="mobile" required id="mobile" placeholder="<?php echo app('translator')->getFromJson('admin.mobile'); ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="zipcode" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.provides.update_provider'); ?></button>
                        <a href="<?php echo e(route('fleet.provider.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>