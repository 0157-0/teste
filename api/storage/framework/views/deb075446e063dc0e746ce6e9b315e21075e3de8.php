<?php $__env->startSection('title', 'Tipos de Serviço '); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <?php if(Setting::get('demo_mode', 0) == 1): ?>
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : <?php echo app('translator')->getFromJson('admin.demomode'); ?>
                    </div>
                <?php endif; ?>
                <h5 class="mb-1">Tipos de Serviço</h5>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-types-create')): ?>
                    <a href="<?php echo e(route('admin.service.create')); ?>" style="margin-left: 1em;"
                       class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar Novo</a>
                <?php endif; ?>
                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Serviço</th>
                        <!-- <th>Provider Name</th> -->
                        <th>Capacidade</th>
                        <th>Tarifa Mínima</th>
                        <th>Preço Base</th>
                        <th>Distância Base</th>
                        <th>Preço Distância</th>
                        <th>Preço Tempo</th>
                        <th>Preço Hora</th>
                        <th>Cáuculo de Preço</th>
                        <th>Imagem</th>
                        <th>Marker Mapa</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $fleets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fleet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td colspan="12"><b><?php echo e($fleet->name); ?></b></td>
                        </tr>
                        <?php $__currentLoopData = $fleet->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($service->name); ?></td>
                            <!-- <td><?php echo e($service->provider_name); ?></td> -->
                                <td><?php echo e($service->capacity); ?></td>
                                <td><?php echo e(currency($service->min_price)); ?></td>
                                <td><?php echo e(currency($service->fixed)); ?></td>
                                <td><?php echo e(distance($service->distance)); ?></td>
                                <td><?php echo e(currency($service->price)); ?></td>
                                <td><?php echo e(currency($service->minute)); ?></td>
                                <?php if($service->calculator == 'DISTANCEHOUR' || $service->calculator == 'HOUR'): ?>
                                    <td><?php echo e(currency($service->hour)); ?></td>
                                <?php else: ?>
                                    <td>Não</td>
                                <?php endif; ?>
                                <td><?php echo app('translator')->getFromJson('servicetypes.'.$service->calculator); ?></td>
                                <td>
                                    <?php if($service->image): ?>
                                        <img src="<?php echo e($service->image); ?>" style="height: 50px" >
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($service->marker): ?>
                                        <img src="<?php echo e($service->marker); ?>" style="height: 50px" >
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('admin.service.destroy', $service->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-types-edit')): ?>
                                                <a href="<?php echo e(route('admin.service.edit', $service->id)); ?>" class="btn btn-info btn-block">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-types-delete')): ?>
                                                <button class="btn btn-danger btn-block" onclick="return confirm('Você tem certeza?')">
                                                    <i class="fa fa-trash"></i> Excluir
                                                </button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Serviço</th>
                        <!-- <th>Provider Name</th> -->
                        <th>Capacidade</th>
                        <th>Tarifa Mínima</th>
                        <th>Preço Base</th>
                        <th>Distância Base</th>
                        <th>Preço Distância</th>
                        <th>Preço Tempo</th>
                        <th>Preço Hora</th>
                        <th>Cáuculo de Preço</th>
                        <th>Imagem</th>
                        <th>Marker Mapa</th>
                        <th>Ação</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>