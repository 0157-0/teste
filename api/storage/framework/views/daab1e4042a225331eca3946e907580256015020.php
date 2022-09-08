<?php $__env->startSection('title', 'Atualizar Perfil '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.account.update_profile'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.profile.update')); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>


                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(Auth::guard('admin')->user()->name); ?>" name="name" required id="name" placeholder=" <?php echo app('translator')->getFromJson('admin.name'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.email'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="<?php echo e(isset(Auth::guard('admin')->user()->email) ? Auth::guard('admin')->user()->email : ''); ?>" id="email" placeholder="<?php echo app('translator')->getFromJson('admin.email'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('user.profile.language'); ?></label>
                    <div class="col-xs-10">
                        <?php ($language=get_all_language()); ?>
                        <select class="form-control" name="language" id="language">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lkey=>$lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lkey); ?>" <?php if(Auth::user()->language==$lkey): ?> selected <?php endif; ?>><?php echo e($lang); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>    
                </div>
                <div class="form-group row">
                    <label for="picture" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                    <div class="col-xs-10">
                        <?php if(isset(Auth::guard('admin')->user()->picture)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e(Auth::guard('admin')->user()->picture); ?>">
                        <?php endif; ?>
                        <input type="file" accept="image/*" name="picture" class=" dropify form-control-file" aria-describedby="fileHelp">
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

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>