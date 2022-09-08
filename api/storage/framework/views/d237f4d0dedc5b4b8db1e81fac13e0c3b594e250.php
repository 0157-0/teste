<?php $__env->startSection('title', 'Adicionar Notificação '); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/bootstrap-datetimepicker.min.css')); ?>">
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.notification.add'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.notification.store')); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>            	

                <div class="form-group row">
                    <label for="notify_type" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.notification.notify_type'); ?></label>
                    <div class="col-xs-10">
                        <select name="notify_type" class="form-control">
                            <option value="all">Todos</option>
                            <option value="user">Passageiros</option>
                            <option value="provider">Motoristas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="picture" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.notification.notify_image'); ?></label>
                    <div class="col-xs-10">
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="notify_desc" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.notification.notify_desc'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" autocomplete="off"  type="text" value="<?php echo e(old('description')); ?>" name="description" required id="description" placeholder="<?php echo app('translator')->getFromJson('admin.notification.notify_desc'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="expiry_date" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.notification.notify_expiry'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control datetimepicker" autocomplete="off"  type="text" value="<?php echo e(old('expiry_date')); ?>" name="expiry_date" required id="expiry_date" placeholder="<?php echo app('translator')->getFromJson('admin.notification.notify_expiry'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="notify_status" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.notification.notify_status'); ?></label>
                    <div class="col-xs-10">
                        <select name="status" class="form-control">
                            <option value="active">Ativo</option>
                            <option value="inactive">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.notification.add'); ?></button>
                        <a href="<?php echo e(route('admin.notification.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('asset/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('asset/js/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    //your code here
    $(function () {
        $('.datetimepicker').datetimepicker({defaultDate: moment(), minDate: moment(), format: 'YYYY-MM-DD HH:mm'});
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>