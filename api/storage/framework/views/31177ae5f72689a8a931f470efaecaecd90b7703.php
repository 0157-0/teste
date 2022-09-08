<?php $__env->startSection('title', 'Atualizar Tipo de Serviço '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.service.Update_Service_Type'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.service.update', $service->id )); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group row">
                    <label for="promo_code" class="col-xs-2 col-form-label">Franquia</label>
                    <div class="col-xs-10">
                        <select name="fleet_id" class="form-control" required>
                            <option value="">Selecione a franquia</option>
                            <?php $__currentLoopData = $fleets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fleet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fleet->id); ?>"<?php echo e(!empty($service->fleet_id) && $fleet->id==$service->fleet_id?'selected':''); ?>><?php echo e($fleet->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Service_Name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($service->name); ?>" name="name" required id="name" placeholder="<?php echo app('translator')->getFromJson('admin.service.Service_Name'); ?>">
                    </div>
                </div>

                <div class="form-group row">

                    <label for="image" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                    <div class="col-xs-10">
                        <?php if(isset($service->image)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e($service->image); ?>">
                        <?php endif; ?>
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="image" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">

                    <label for="marker" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Service_marker_Image'); ?></label>
                    <div class="col-xs-10">
                        <?php if(isset($service->marker)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e($service->marker); ?>">
                        <?php endif; ?>
                        <input type="file" accept="image/*" name="marker" class="dropify form-control-file" id="marker" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="calculator" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Pricing_Logic'); ?></label>
                    <div class="col-xs-5">
                        <select class="form-control" id="calculator" name="calculator">
                            <option value="MIN" <?php if($service->calculator =='MIN'): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('servicetypes.MIN'); ?></option>
                            <option value="HOUR" <?php if($service->calculator =='HOUR'): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('servicetypes.HOUR'); ?></option>
                            <option value="DISTANCE" <?php if($service->calculator =='DISTANCE'): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('servicetypes.DISTANCE'); ?></option>
                            <option value="DISTANCEMIN" <?php if($service->calculator =='DISTANCEMIN'): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('servicetypes.DISTANCEMIN'); ?></option>
                            <option value="DISTANCEHOUR" <?php if($service->calculator =='DISTANCEHOUR'): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('servicetypes.DISTANCEHOUR'); ?></option>
                        </select>
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>Cálculo de Preço: <span id="changecal"></span></b></i></span>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="min_price" class="col-xs-2 col-form-label">Tarifa Mínima (<?php echo e(currency('')); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_min_price" data-thousands="." data-decimal="," value="<?php echo e($service->min_price); ?>" name="min_price" required id="min_price" placeholder="Tarifa mínima" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>TM (Valor cobrado em viagens curtas)</b></i></span>
                    </div>
                </div>

                <div class="form-group row" >
                    <label for="fixed" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.hourly_Price'); ?> (<?php echo e(currency('')); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e($service->hour); ?>" name="hour" id="hourly_price" placeholder="Definir preço por hora ( Apenas para DISTÂNCIA POR PREÇO )" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>PH (<?php echo app('translator')->getFromJson('admin.service.per_hour'); ?>), TH (<?php echo app('translator')->getFromJson('admin.service.total_hour'); ?>)</b></i></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fixed" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Base_Price'); ?> (<?php echo e(currency('')); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_fixed" data-thousands="." data-decimal="," value="<?php echo e($service->fixed); ?>" name="fixed" required id="fixed" placeholder="<?php echo app('translator')->getFromJson('admin.service.Base_Price'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>PB (<?php echo app('translator')->getFromJson('admin.service.Base_Price'); ?>)</b></i></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="distance" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Base_Distance'); ?> (<?php echo e(distance('')); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e($service->distance); ?>" name="distance" id="distance" placeholder="<?php echo app('translator')->getFromJson('admin.service.Base_Distance'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>DB (<?php echo app('translator')->getFromJson('admin.service.Base_Distance'); ?>) </b></i></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="minute" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.unit_time'); ?> (<?php echo e(currency()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_minute" data-thousands="." data-decimal="," value="<?php echo e($service->minute); ?>" name="minute" id="minute" placeholder="<?php echo app('translator')->getFromJson('admin.service.unit_time'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>PM (<?php echo app('translator')->getFromJson('admin.service.per_minute'); ?>), TM(<?php echo app('translator')->getFromJson('admin.service.total_minute'); ?>)</b></i></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.unit'); ?> (<?php echo e(distance()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_price" data-thousands="." data-decimal="," value="<?php echo e($service->price); ?>" name="price" id="price" placeholder="<?php echo app('translator')->getFromJson('admin.service.unit'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>P<?php echo e(config('constants.distance')); ?> (<?php echo app('translator')->getFromJson('admin.service.per'); ?> <?php echo e(config('constants.distance')); ?>), T<?php echo e(config('constants.distance')); ?> (<?php echo app('translator')->getFromJson('admin.service.total'); ?> <?php echo e(config('constants.distance')); ?>)</b></i></span>
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="capacity" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Seat_Capacity'); ?></label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e($service->capacity); ?>" name="capacity" required id="capacity" placeholder="<?php echo app('translator')->getFromJson('admin.service.Seat_Capacity'); ?>" min="1">
                    </div>
                </div>

                <div class="form-group row">
                     <label for="description" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;"><?php echo app('translator')->getFromJson('admin.service.peak_title'); ?></label>

                     <!-- Set Peak Time -->
                    <div class="col-xs-12">
                        <table class="table table-striped table-bordered dataTable" id="table-2">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('admin.service.peak_id'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('admin.service.peak_time'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('admin.service.peak_price'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $Peakhour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e(date('h:i A', strtotime($w->start_time))); ?> - <?php echo e(date('h:i A', strtotime($w->end_time))); ?></td>
                                        <td> <input type="text" id="peak_price" name="peak_price[<?php echo e($w->id); ?>][id]" value="<?php if($w->servicetimes): ?><?php echo e($w->servicetimes->min_price); ?><?php endif; ?>"  min="1">
                                        <input type="hidden" name="peak_price[<?php echo e($w->id); ?>][status]" value="<?php if($w->servicetimes): ?>1 <?php else: ?> 0 <?php endif; ?>"> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('admin.service.peak_id'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('admin.service.peak_time'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('admin.service.peak_price'); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>



                 <div class="form-group row">
                    <label for="" class="col-xs-12 col-form-label" style="color: black;font-size: 25px;"><?php echo app('translator')->getFromJson('admin.service.waiting_title'); ?></label>
                    <label for="waiting_free_mins" class="col-xs-5 col-form-label"><?php echo app('translator')->getFromJson('admin.service.waiting_wave'); ?></label>
                    <label for="waiting_min_charge" class="col-xs-5 col-form-label"><?php echo app('translator')->getFromJson('admin.service.waiting_charge'); ?></label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e($service->waiting_free_mins); ?>" name="waiting_free_mins" id="waiting_free_mins" placeholder="<?php echo app('translator')->getFromJson('admin.service.waiting_wave'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e($service->waiting_min_charge); ?>" name="waiting_min_charge" id="waiting_min_charge" placeholder="<?php echo app('translator')->getFromJson('admin.service.waiting_charge'); ?>" min="0">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-primary btn-block"><?php echo app('translator')->getFromJson('admin.service.Update_Service_Type'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    var cal='DISTANCE';
    priceInputs('<?php echo e($service->calculator); ?>');
    $("#calculator").on('change', function(){
        cal=$(this).val();
        priceInputs(cal);
    });

    function priceInputs(cal){
        if(cal=='MIN'){
            $("#hourly_price,#distance,#price").attr('value','');
            $("#minute").prop('disabled', false);
            $("#minute").prop('required', true);
            $("#hourly_price,#distance,#price").prop('disabled', true);
            $("#hourly_price,#distance,#price").prop('required', false);
            $("#changecal").text('PB + (TM*PM)');
        }
        else if(cal=='HOUR'){
            $("#minute,#distance,#price").attr('value','');
            $("#hourly_price").prop('disabled', false);
            $("#hourly_price").prop('required', true);
            $("#minute,#distance,#price").prop('disabled', true);
            $("#minute,#distance,#price").prop('required', false);
            $("#changecal").text('PB + (TH*PH)');
        }
        else if(cal=='DISTANCE'){
            $("#minute,#hourly_price").attr('value','');
            $("#price,#distance").prop('disabled', false);
            $("#price,#distance").prop('required', true);
            $("#minute,#hourly_price").prop('disabled', true);
            $("#minute,#hourly_price").prop('required', false);
            $("#changecal").text('PB + (T<?php echo e(config("constants.distance")); ?>-DB*P<?php echo e(config("constants.distance")); ?>)');
        }
        else if(cal=='DISTANCEMIN'){
            $("#hourly_price").attr('value','');
            $("#price,#distance,#minute").prop('disabled', false);
            $("#price,#distance,#minute").prop('required', true);
            $("#hourly_price").prop('disabled', true);
            $("#hourly_price").prop('required', false);
            $("#changecal").text('PB + (T<?php echo e(config("constants.distance")); ?>-DB*P<?php echo e(config("constants.distance")); ?>) + (TM*PM)');
        }
        else if(cal=='DISTANCEHOUR'){
            $("#minute").attr('value','');
            $("#price,#distance,#hourly_price").prop('disabled', false);
            $("#price,#distance,#hourly_price").prop('required', true);
            $("#minute").prop('disabled', true);
            $("#minute").prop('required', false);
            $("#changecal").text('PB + ((T<?php echo e(config("constants.distance")); ?>-DB)*P<?php echo e(config("constants.distance")); ?>) + (TH*PH)');
        }
        else{
            $("#minute,#hourly_price").attr('value','');
            $("#price,#distance").prop('disabled', false);
            $("#price,#distance").prop('required', true);
            $("#minute,#hourly_price").prop('disabled', true);
            $("#minute,#hourly_price").prop('required', false);
            $("#changecal").text('PB + (T<?php echo e(config("constants.distance")); ?>-DB*P<?php echo e(config("constants.distance")); ?>)');
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>