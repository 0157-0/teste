<?php $__env->startSection('title', 'Update Profile '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.account.update_profile'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('fleet.profile.update')); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>


                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(Auth::guard('fleet')->user()->name); ?>" name="name" required id="name" placeholder="<?php echo app('translator')->getFromJson('admin.name'); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.email'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="<?php echo e(isset(Auth::guard('fleet')->user()->email) ? Auth::guard('fleet')->user()->email : ''); ?>" id="email" placeholder="<?php echo app('translator')->getFromJson('admin.email'); ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.company'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" required name="company" value="<?php echo e(isset(Auth::guard('fleet')->user()->company) ? Auth::guard('fleet')->user()->company : ''); ?>" id="company" placeholder="<?php echo app('translator')->getFromJson('admin.company'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.mobile'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" required name="mobile" value="<?php echo e(isset(Auth::guard('fleet')->user()->mobile) ? Auth::guard('fleet')->user()->mobile : ''); ?>" id="mobile" placeholder="<?php echo app('translator')->getFromJson('admin.mobile'); ?>">
                    </div>
                </div>

<!--                <div class="form-group row">
                    <label class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('user.profile.language'); ?></label>
                    <div class="col-xs-10">
                        <?php ($language=get_all_language()); ?>
                        <select class="form-control" name="language" id="language">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lkey=>$lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lkey); ?>" <?php if(Auth::user()->language==$lkey): ?> selected <?php endif; ?>><?php echo e($lang); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>    
                </div>-->

                <div class="form-group row">
                    <label for="logo" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.logo'); ?></label>
                    <div class="col-xs-10">
                        <?php if(isset(Auth::guard('fleet')->user()->logo)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e(img(Auth::guard('fleet')->user()->logo)); ?>">
                        <?php endif; ?>
                        <input type="file" accept="image/*" name="logo" class=" dropify form-control-file" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.account.update_profile'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>