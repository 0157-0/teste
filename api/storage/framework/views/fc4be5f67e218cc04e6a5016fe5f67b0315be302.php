<?php $__env->startSection('title', 'Editar Expedidor '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.dispatcher.update_dispatcher'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.dispatch-manager.update', $dispatcher->id )); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.account-manager.full_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($dispatcher->name); ?>" name="name" required id="name" placeholder="Full Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.email'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($dispatcher->email); ?>" readonly="true" name="email" required id="email" placeholder="Full Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mobile" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.mobile'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control numbers" type="number" value="<?php echo e($dispatcher->mobile); ?>" name="mobile" required id="mobile" placeholder="Mobile">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">Senha</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">Repetir Senha</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password_confirm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.dispatcher.update_dispatcher'); ?></button>
                        <a href="<?php echo e(route('admin.dispatch-manager.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>