<?php $__env->startSection('title', 'Novo Motorista '); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('asset/css/intlTelInput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>

            <h5 style="margin-bottom: 2em;"><?php echo app('translator')->getFromJson('admin.provides.add_provider'); ?></h5>

            <form class="form-horizontal" action="<?php echo e(route('admin.provider.store')); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                
                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label">Estado</label>
                    <div class="col-xs-10">
                        <select name="" class="form-control" id="states" required>
                            <option value="">Selecione o Estado</option>
                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state->id); ?>"<?php echo e(!is_null($stateId) && $state->id == $stateId->id?' selected':''); ?>><?php echo e($state->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-xs-12 col-form-label">Cidade</label>
                    <div class="col-xs-10">
                        <select name="city_id" class="form-control" id="cities" required>
                            <option value="">Selecione a cidade</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="first_name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.first_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(old('first_name')); ?>" name="first_name" required id="first_name" placeholder="<?php echo app('translator')->getFromJson('admin.first_name'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.last_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(old('last_name')); ?>" name="last_name" required id="last_name" placeholder="<?php echo app('translator')->getFromJson('admin.last_name'); ?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="last_name" class="col-xs-12 col-form-label">CPF</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e(old('cpf')); ?>" name="cpf" required id="cpf" placeholder="CPF">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.email'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="email" required name="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="<?php echo app('translator')->getFromJson('admin.email'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.password'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password" id="password" placeholder="<?php echo app('translator')->getFromJson('admin.password'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.provides.password_confirmation'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="<?php echo app('translator')->getFromJson('admin.provides.password_confirmation'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="picture" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                    <div class="col-xs-10">
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

               <!-- <div class="form-group row">
                    <label for="country_code" class="col-xs-12 col-form-label">Código do País</label>
                    <div class="col-xs-10">
                        <input type="text" name="country_code" value="+55" style ="padding-bottom:5px;" class="country-name" id="country_code" >
                    </div>
                </div>-->
                <div class="form-group row">
                    <label for="mobile" class="col-xs-12 col-form-label"><?php echo app('translator')->getFromJson('admin.mobile'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="<?php echo e(old('mobile')); ?>" name="mobile" required id="mobile" placeholder="<?php echo app('translator')->getFromJson('admin.mobile'); ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="zipcode" class="col-xs-12 col-form-label"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.auth.sign_in'); ?></button>
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
                   $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
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