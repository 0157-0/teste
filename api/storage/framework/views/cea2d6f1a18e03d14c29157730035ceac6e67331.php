<?php $__env->startSection('title', 'Editar Motorista '); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('asset/css/intlTelInput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.provides.update_provider'); ?> </h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.provider.update', $provider->id )); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PATCH">
                
              
              <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label">Estado</label>
                    <div class="col-xs-5">
                        <select name="" class="form-control" id="states" required>
                            <option value="">Selecione o Estado</option>
                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state->id); ?>"<?php echo e(!is_null($stateId) && $state->id == $stateId->id?' selected':''); ?>><?php echo e($state->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
              </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-2 col-form-label">Cidade</label>
                    <div class="col-xs-5">
                        <select name="city_id" class="form-control" id="cities" required>
                            <option value="">Selecione a cidade</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="first_name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.first_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->first_name); ?>" name="first_name" required id="first_name" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.last_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->last_name); ?>" name="last_name" required id="last_name" placeholder="Last Name">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="last_name" class="col-xs-2 col-form-label">CPF</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->cpf); ?>" name="cpf" required id="cpf" placeholder="CPF">
                    </div>
                </div>
                
                 <div class="form-group row">
                    <label for="last_name" class="col-xs-2 col-form-label">Sempre coloque / no final (exp: marcio.hamasaki1/)</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->link_picpay); ?>" name="link_picpay"  placeholder="Conta picpy">
                    </div>
                </div>
                
                 <div class="form-group row">
                    <label for="last_name" class="col-xs-2 col-form-label">Atenção coloque somente codigo do mercado pago (exp:3452340) </label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->link_mp); ?>" name="link_mp"  placeholder="Conta mercado pago">
                    </div>
                </div>

                <div class="form-group row">
                    
                    <label for="picture" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                    <div class="col-xs-10">
                    <?php if(isset($provider->avatar)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e(img($provider->avatar)); ?>">
                    <?php endif; ?>
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>
                
               <!-- <div class="form-group row">
                    <label for="country_code" class="col-xs-2 col-form-label">Código Referência</label>
                    <div class="col-xs-10">
                     <h2 class="bg-info">(<?php echo e($provider->referral_unique_id); ?>)</h2>
                  </div>
                </div>-->
              <div class="form-group row">
                    <label for="mobile" class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.mobile'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="<?php echo e($provider->mobile); ?>" name="mobile" required id="mobile" placeholder="Mobile">
                    </div>
              </div>
                
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.password'); ?></label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password" placeholder="<?php echo app('translator')->getFromJson('admin.password'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label"><?php echo app('translator')->getFromJson('admin.account-manager.password_confirmation'); ?></label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password_confirm" placeholder="<?php echo app('translator')->getFromJson('admin.account-manager.password_confirmation'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="zipcode" class="col-xs-2 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.provides.update_provider'); ?></button>
                        <a href="<?php echo e(route('admin.provider.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('asset/js/intlTelInput.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('asset/js/intlTelInput-jquery.min.js')); ?>"></script>
<script type="text/javascript">
       var input = document.querySelector("#country_code");

       var states = $('#states');
       var providerCity = "<?php echo e($provider->city_id); ?>";

       states.change(function () {
           var idEstado = $(this).val();
           $.get('/admin/cities/' + idEstado, function (cidades) {
               $('#cities').empty();
               $.each(cidades, function (key, value) {
                   $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
               });
           });
       });

       if(states.val() != null){
           $.get('/admin/cities/' + states.val(), function (cidades) {
               $('#cities').empty();
               $.each(cidades, function (key, value) {
                   if(value.id == providerCity){
                       $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
                   }else{
                       $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
                   }
               });
           });
       }

       window.intlTelInput(input,({
           // separateDialCode:true,
       }));
       $(".country-name").click(function(){
           var myVar = $(this).closest('.country').find(".dial-code").text();
           $('#country_code').val(myVar);
        });
		</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>