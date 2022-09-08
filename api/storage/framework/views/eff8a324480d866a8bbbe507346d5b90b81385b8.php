<?php $__env->startSection('title', 'Adicionar Disputa'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.dispute.add_dispute'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.dispute.store')); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>            	

                <div class="form-group row">
                    <label for="dispute_type" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.dispute.dispute_type'); ?></label>
                    <div class="col-xs-10">
                        <select name="dispute_type" class="form-control">
                            <option value="">Selecione</option>
                            <option value="user">Passageiro</option>
                            <option value="provider">Motorista</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dispute_name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.dispute.dispute_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" autocomplete="off"  type="text" value="<?php echo e(old('dispute_name')); ?>" name="dispute_name" required id="dispute_name" placeholder="<?php echo app('translator')->getFromJson('admin.dispute.dispute_name'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dispute_status" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.dispute.dispute_status'); ?></label>
                    <div class="col-xs-10">
                        <select name="dispute_status" class="form-control">
                            <option value="">Selecione</option>
                            <option value="active">Ativo</option>
                            <option value="inactive">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.dispute.add_dispute'); ?></button>
                        <a href="<?php echo e(route('admin.dispute.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>