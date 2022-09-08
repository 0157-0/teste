<?php $__env->startSection('title', 'Provider Details '); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
            	<h4><?php echo app('translator')->getFromJson('admin.provides.Provider_Details'); ?></h4>
            	<div class="row">
            		<div class="col-md-12">
						<div class="box bg-white user-1">
						<?php $background = asset('admin/assets/img/photos-1/4.jpg'); ?>
							<div class="u-img img-cover" style="background-image: url(<?php echo e($background); ?>);"></div>
							<div class="u-content">
								<div class="avatar box-64">
									<img class="b-a-radius-circle shadow-white" src="<?php echo e(img($provider->picture)); ?>" alt="">
									<i class="status bg-success bottom right"></i>
								</div>
								<p class="text-muted">
									<?php if($provider->status == "approved"): ?>
										<span class="tag tag-success">Aprovado</span>
									<?php else: ?>
										<span class="tag tag-danger">Não Aprovado</span>
									<?php endif; ?>
								</p>
								<h5><a class="text-black" href="#"><?php echo e($provider->first_name); ?> <?php echo e($provider->last_name); ?></a></h5>
								<p class="text-muted">Email : <?php echo e($provider->email); ?></p>
								<p class="text-muted">Celular : <?php echo e($provider->mobile); ?></p>
								<p class="text-muted">Sexo : <?php echo e($provider->gender=="MALE" ? 'MASCULINO':'FEMININO'); ?></p>
								<p class="text-muted">Endereço : <?php echo e($provider->address); ?></p>
								<p class="text-muted">
									<?php if($provider->is_activated == 1): ?>
										<span class="tag tag-warning">Ativo</span>
									<?php else: ?>
										<span class="tag tag-warning">Inativo</span>
									<?php endif; ?>
								</p>
								<a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Voltar</a>
							</div>
						</div>
					</div>
            	</div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>