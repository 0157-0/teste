<?php $__env->startSection('title', 'Alterar Senha do Motorista'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-block bg-white">
                        <h5 style="margin-bottom: 2em;">Alteração de Senha</h5>
                        <form class="form-horizontal"  action="<?php echo e(route('admin.provider.password',['id'=>$provider->id])); ?>" method="POST" role="form">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Senha:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Repetir Senha:</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Atualizar Senha</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>