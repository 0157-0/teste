<?php $__env->startSection('title', 'Documentos do Motorista '); ?>

<?php $__env->startSection('content'); ?>
<!-- Alterado por Allan -->
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h4 class="mb-1"><?php echo app('translator')->getFromJson('admin.provides.type_allocation'); ?></h4>
            <h5>Motorista: <b><?php echo e($Provider->first_name); ?> <?php echo e($Provider->last_name); ?></b> </h5>
            <?php if($Provider->status == 'approved'): ?>
            <a style="margin-left: 1em;margin-top: -30px" class="btn btn-danger pull-right" href="<?php echo e(route('admin.provider.disapprove', $Provider->id )); ?>"><i class="fa fa-power-off"></i> Desativar Motorista</a>
            <?php else: ?>
            <a style="margin-left: 1em;margin-top: -30px" class="btn btn-success pull-right" href="<?php echo e(route('admin.provider.approve', $Provider->id )); ?>"><i class="fa fa-check"></i> Aprovar Motorista</a>
            <?php endif; ?>
            <a href="<?php echo e($backurl); ?>" style="margin-left: 1em;margin-top: -30px"
               class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>
            <div class="row">
                <div class="col-xs-12">
                    <?php if($ProviderService->count() > 0): ?>
                    <hr><h6>Serviços Atribuídos:  </h6>
                    <table class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('admin.provides.service_name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('admin.provides.service_number'); ?></th>
                                <th><?php echo app('translator')->getFromJson('admin.provides.service_model'); ?></th>
                                <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ProviderService; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($service->service_type->name); ?></td>
                                <td><?php echo e($service->service_number); ?></td>
                                <td><?php echo e($service->service_model); ?></td>
                                <td>
                                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                    <form action="<?php echo e(route('fleet.provider.document.service', [$Provider->id, $service->id])); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button class="btn btn-danger btn-large btn-block">Delete</a>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('admin.provides.service_name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('admin.provides.service_number'); ?></th>
                                <th><?php echo app('translator')->getFromJson('admin.provides.service_model'); ?></th>
                                <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php endif; ?>
                    <hr>
                </div>
                
                <div class="col-xs-12"><h3 style="margin-bottom: 5px; font-size: 15px;">Atualizar Serviço</h3></div>
                <form action="<?php echo e(route('admin.provider.document.store', $Provider->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" required name="method" value="update">
                    <div class="col-xs-3">
                        <select class="form-control input" name="service_type" required>
                            <?php $__empty_1 = true; $__currentLoopData = $ServiceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($Type->id); ?>"><?php echo e($Type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option>- <?php echo app('translator')->getFromJson('admin.service_select'); ?> -</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_number" class="form-control" placeholder="Número/Placa (jss-0000)">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_model" class="form-control" placeholder="Modelo (Siena Sedan - Branco)">
                    </div>
                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                    <div class="col-xs-3">
                        <button class="btn btn-primary btn-block" type="submit">Atualizar</button>
                    </div>
                    <?php endif; ?>
                </form>

                <br>

                <div class="col-xs-12" style="margin-top: 30px;"><h3 style="margin-bottom: 5px; font-size: 15px;">Adicionar Serviço</h3></div>
                <form action="<?php echo e(route('admin.provider.document.store', $Provider->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" required name="method" value="create">
                    <div class="col-xs-3">
                        <select class="form-control input" name="service_type" required>
                            <?php $__empty_1 = true; $__currentLoopData = $ServiceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($Type->id); ?>"><?php echo e($Type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <option>- <?php echo app('translator')->getFromJson('admin.service_select'); ?> -</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_number" class="form-control" placeholder="Número/Placa (jss-0000)">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_model" class="form-control" placeholder="Modelo (Siena Sedan - Branco)">
                    </div>
                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                    <div class="col-xs-3">
                        <button class="btn btn-success btn-block" type="submit">Adicionar</button>
                    </div>
                    <?php endif; ?>
                </form>
                
            </div>
        </div>

        <div class="box box-block bg-white">
            <h5 class="mb-1">
                <?php echo app('translator')->getFromJson('admin.provides.provider_documents'); ?>
                <?php if($Provider->status != 'approved'): ?>
                    <?php if($Provider->documents->count() >= 1 && $Provider->documents->last()->status == "ACTIVE"): ?>
                        <a class="btn btn-success btn-block"
                           href="<?php echo e(route('fleet.provider.approve', $Provider->id )); ?>">Aprovar</a>
                    <?php endif; ?>
                <?php endif; ?>
            </h5>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.document_type'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $Provider->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Index => $Document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($Index + 1); ?></td>
                        <td><?php if($Document->document): ?><?php echo e($Document->document->name); ?><?php endif; ?></td>
                        <td><?php if($Document->status == "ACTIVE"): ?><?php echo e("APROVADO"); ?><?php else: ?> <?php echo e("AVALIAÇÃO PENDENTE"); ?> <?php endif; ?></td>
                        <td>
                            <div class="input-group-btn">
                                <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                <a href="<?php echo e(route('fleet.provider.document.edit', [$Provider->id, $Document->id])); ?>"><span class="btn btn-success btn-large"><?php echo app('translator')->getFromJson('admin.view'); ?></span></a>
                                <button class="btn btn-danger btn-large doc-delete" id="<?php echo e($Document->id); ?>"><?php echo app('translator')->getFromJson('admin.delete'); ?></button>
                                <form action="<?php echo e(route('fleet.provider.document.destroy', [$Provider->id, $Document->id])); ?>" method="POST" id="form_delete_<?php echo e($Document->id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.document_type'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    $(".doc-delete").on('click', function(){
        var doc_id=$(this).attr('id');
        $("#form_delete_"+doc_id).submit();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>