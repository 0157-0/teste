<?php $__env->startSection('title', 'Adicionar Tipo de Serviço '); ?>

<?php $__env->startSection('content'); ?>
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.service.Add_Service_Type'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.service.store')); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>


                <div class="form-group row">
                    <label for="promo_code" class="col-xs-12 col-form-label">Franquia</label>
                    <div class="col-xs-10">
                        <select name="fleet_id" class="form-control" required>
                            <option value="">Selecione a franquia</option>
                            <?php $__currentLoopData = $fleets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fleet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fleet->id); ?>"><?php echo e($fleet->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Service_Name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(old('name')); ?>" name="name" required id="name" placeholder="<?php echo app('translator')->getFromJson('admin.service.Service_Name'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="picture" class="col-xs-12 col-form-label">
                    <?php echo app('translator')->getFromJson('admin.service.Service_Image'); ?></label>
                    <div class="col-xs-10">
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="marker" class="col-xs-12 col-form-label">
                    <?php echo app('translator')->getFromJson('admin.service.Service_marker_Image'); ?></label>
                    <div class="col-xs-10">
                        <input type="file" accept="image/*" name="marker" class="dropify form-control-file" id="marker" aria-describedby="fileHelp">
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="calculator" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Pricing_Logic'); ?></label>
                    <div class="col-xs-5">
                        <select class="form-control" id="calculator" name="calculator">
                            <option value="MIN"><?php echo app('translator')->getFromJson('servicetypes.MIN'); ?></option>
                            <option value="HOUR"><?php echo app('translator')->getFromJson('servicetypes.HOUR'); ?></option>
                            <option value="DISTANCE"><?php echo app('translator')->getFromJson('servicetypes.DISTANCE'); ?></option>
                            <option value="DISTANCEMIN"><?php echo app('translator')->getFromJson('servicetypes.DISTANCEMIN'); ?></option>
                            <option value="DISTANCEHOUR"><?php echo app('translator')->getFromJson('servicetypes.DISTANCEHOUR'); ?></option>
                        </select>
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>Cálculo de Preço: <span id="changecal"></span></b></i></span>
                    </div>
                </div>
                
                <!-- Min Price -->
                <div class="form-group row">
                    <label for="min_price" class="col-xs-12 col-form-label">Tarifa Mínima (<?php echo e(currency()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control price" type="text" id="currency_min_price" data-thousands="." data-decimal="," value="<?php echo e(old('min_price')); ?>" name="min_price" required id="min_price" placeholder="Tarifa mínima" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>TM (Valor cobrado em viagens curtas)</b></i></span>
                    </div>
                </div>

                <!-- Set Hour Price -->
                <div class="form-group row" id="hour_price">
                    <label for="fixed" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.hourly_Price'); ?> (<?php echo e(currency()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e(old('fixed')); ?>" name="hour"  id="hourly_price" placeholder="Definir preço por hora ( Apenas para DISTÂNCIA POR PREÇO )" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>PH (<?php echo app('translator')->getFromJson('admin.service.per_hour'); ?>), TH (<?php echo app('translator')->getFromJson('admin.service.total_hour'); ?>)</b></i></span>
                    </div>
                </div>

                <!-- Base fare -->
                <div class="form-group row">
                    <label for="fixed" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Base_Price'); ?> (<?php echo e(currency()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_fixed" data-thousands="." data-decimal="," value="<?php echo e(old('fixed')); ?>" name="fixed" required id="fixed" placeholder="<?php echo app('translator')->getFromJson('admin.service.Base_Price'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>PB (<?php echo app('translator')->getFromJson('admin.service.Base_Price'); ?>)</b></i></span>
                    </div>
                </div>
                <!-- Base distance -->
                <div class="form-group row">
                    <label for="distance" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Base_Distance'); ?> (<?php echo e(distance()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="number" value="<?php echo e(old('distance')); ?>" name="distance" required id="distance" placeholder="<?php echo app('translator')->getFromJson('admin.service.Base_Distance'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>DB (<?php echo app('translator')->getFromJson('admin.service.Base_Distance'); ?>) </b></i></span>
                    </div>
                </div>
                <!-- unit time pricing -->
                <div class="form-group row">
                    <label for="minute" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.unit_time'); ?></label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_minute" data-thousands="." data-decimal="," value="<?php echo e(old('minute')); ?>" name="minute" required id="minute" placeholder="<?php echo app('translator')->getFromJson('admin.service.unit_time'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>PM (<?php echo app('translator')->getFromJson('admin.service.per_minute'); ?>), TM(<?php echo app('translator')->getFromJson('admin.service.total_minute'); ?>)</b></i></span>
                    </div>
                </div>
                <!-- unit distance price -->
                <div class="form-group row">
                    <label for="price" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.unit'); ?>(<?php echo e(distance()); ?>)</label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" id="currency_price" data-thousands="." data-decimal="," value="<?php echo e(old('price')); ?>" name="price" required id="price" placeholder="<?php echo app('translator')->getFromJson('admin.service.unit'); ?>" min="0">
                    </div>
                    <div class="col-xs-5">
                        <span class="showcal"><i><b>P<?php echo e(config('constants.distance')); ?> (<?php echo app('translator')->getFromJson('admin.service.per'); ?> <?php echo e(config('constants.distance')); ?>), T<?php echo e(config('constants.distance')); ?> (<?php echo app('translator')->getFromJson('admin.service.total'); ?> <?php echo e(config('constants.distance')); ?>)</b></i></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="capacity" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.service.Seat_Capacity'); ?></label>
                    <div class="col-xs-5">
                        <input class="form-control" type="text" pattern="\d*" value="<?php echo e(old('capacity')); ?>" name="capacity" required id="capacity" placeholder="<?php echo app('translator')->getFromJson('admin.service.Seat_Capacity'); ?>" min="1" maxlength="9">
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
                                        <td> <input type="text" id="peak_price" name="peak_price[<?php echo e($w->id); ?>]"  min="1"> </td>
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



                 
                    
                </div>

                    </div>
                </div>
                
                <br>
                <div class="form-group row">
                    <div class="col-xs-10">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <button type="submit" class="btn btn-primary btn-block"><?php echo app('translator')->getFromJson('admin.auth.sign_in'); ?></button>
                            </div>
                        </div>
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
    priceInputs(cal);
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