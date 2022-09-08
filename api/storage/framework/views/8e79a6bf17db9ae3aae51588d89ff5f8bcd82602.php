<?php $__env->startSection('title', 'Atualizar Cupom Promocional '); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/bootstrap-datetimepicker.min.css')); ?>">

    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i
                            class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

                <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.promocode.update_promocode'); ?></h5>

                <form class="form-horizontal" action="<?php echo e(route('admin.promocode.update', $promocode->id )); ?>"
                      method="POST" enctype="multipart/form-data" role="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PATCH">

                    <div class="form-group row">
                        <label for="promo_code" class="col-xs-2 col-form-label">Franquia</label>
                        <div class="col-xs-10">
                            <select name="fleet_id" class="form-control" required>
                                <option value="">Selecione a franquia</option>
                                <?php $__currentLoopData = $fleets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fleet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fleet->id); ?>"<?php echo e(!empty($promocode->fleet_id) && $fleet->id==$promocode->fleet_id?'selected':''); ?>><?php echo e($fleet->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="promo_code"
                               class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.promocode.promocode'); ?></label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" value="<?php echo e($promocode->promo_code); ?>"
                                   name="promo_code" required id="promo_code"
                                   placeholder="<?php echo app('translator')->getFromJson('admin.promocode.promocode'); ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="percentage"
                               class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.promocode.percentage'); ?></label>
                        <div class="col-xs-10">
                            <input class="form-control" type="number" value="<?php echo e($promocode->percentage); ?>"
                                   name="percentage" required id="percentage"
                                   placeholder="<?php echo app('translator')->getFromJson('admin.promocode.percentage'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="max_amount"
                               class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.promocode.max_amount'); ?></label>
                        <div class="col-xs-10">
                            <input type="number" class="form-control" name="max_amount" required id="max_amount"
                                   placeholder="<?php echo app('translator')->getFromJson('admin.promocode.max_amount'); ?>" value="<?php echo e($promocode->max_amount); ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="expiration"
                               class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.promocode.expiration'); ?></label>
                        <div class="col-xs-10">
                            <input class="form-control datetimepicker" type="text" value="<?php echo e($promocode->expiration); ?>"
                                   name="expiration" required id="expiration"
                                   placeholder="<?php echo app('translator')->getFromJson('admin.promocode.expiration'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="promo_description"
                               class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.promocode.promo_description'); ?></label>
                        <div class="col-xs-10">
                            <textarea id="promo_description" placeholder="Description" class="form-control"
                                      name="promo_description"><?php echo e($promocode->promo_description); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zipcode" class="col-xs-2 col-form-label"></label>
                        <div class="col-xs-10">
                            <button type="submit"
                                    class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.promocode.update_promocode'); ?></button>
                            <a href="<?php echo e(route('admin.promocode.index')); ?>"
                               class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
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
    $(function () {
        $('.datetimepicker').datetimepicker({minDate: moment(), format: 'YYYY-MM-DD HH:mm'});
    });
});

$("#percentage").on('keyup', function () {
    var per = $(this).val() || 0;
    var max = $("#max_amount").val() || 0;
    $("#promo_description").val(per + '% off! Valor máximo de desconto R$' + max);
});

$("#max_amount").on('keyup', function () {
    var max = $(this).val() || 0;
    var per = $("#percentage").val() || 0;
    $("#promo_description").val(per + '% off! Valor máximo de desconto R$' + max);
});

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>