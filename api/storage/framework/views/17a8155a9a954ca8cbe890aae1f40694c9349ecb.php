<?php $__env->startSection('title', 'Histórico de Solicitações '); ?>

<?php $__env->startSection('content'); ?>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">Histórico de Solicitaçõe</h5>
            <?php if(count($requests) != 0): ?>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.request.Booking_ID'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Date_Time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Mode'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($request->booking_id); ?></td>
                        <td><?php echo e($request->user->first_name); ?> <?php echo e($request->user->last_name); ?></td>
                        <td>
                            <?php if($request->provider): ?>
                                <?php echo e($request->provider->first_name); ?> <?php echo e($request->provider->last_name); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($request->created_at->diffForHumans()); ?></td>
                        <td>
                            <?php if($request->status == "COMPLETED"): ?>
                                <span class="tag tag-success">CONCLUÍDA</span>
                            <?php elseif($request->status == "CANCELLED"): ?>
                                <span class="tag tag-danger">CANCELADA</span>
                            <?php elseif($request->status == "ARRIVED"): ?>
                                <span class="tag tag-info">EM ANDAMENTO</span>
                            <?php elseif($request->status == "SEARCHING"): ?>
                                <span class="tag tag-info">PESQUISANDO</span>
                            <?php elseif($request->status == "ACCEPTED"): ?>
                                <span class="tag tag-info">MOTORISTA A CAMINHO</span>
                            <?php elseif($request->status == "STARTED"): ?>
                                <span class="tag tag-info">VIAGEM INICIADA</span>
                            <?php elseif($request->status == "DROPPED"): ?>
                                <span class="tag tag-info">NO DESTINO</span>
                            <?php elseif($request->status == "PICKEDUP"): ?>
                                <span class="tag tag-info">INICIANDO</span>
                            <?php elseif($request->status == "SCHEDULED"): ?>
                                <span class="tag tag-info">AGENDADA</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->payment != ""): ?>
                                <?php echo e(currency($request->payment->total)); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->payment_mode == "CASH"): ?>
                                DINHEIRO
                            <?php elseif($request->payment_mode == "DEBIT_MACHINE"): ?>
                                DÉBITO MÁQUINA
                            <?php elseif($request->payment_mode == "VOUCHER"): ?>
                                VOUCHER
                            <?php elseif($request->payment_mode == "CARD"): ?>
                                CARTÃO
                            <?php else: ?>
                                $request->payment_mode
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->paid): ?>
                                Pago
                            <?php else: ?>
                                Não Pago
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Ação
                                </button>
                                <div class="dropdown-menu">
                                    <a href="<?php echo e(route('fleet.requests.show', $request->id)); ?>" class="dropdown-item">
                                        <i class="fa fa-search"></i> Mais detalhes
                                    </a>
                                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                        <form action="<?php echo e(route('fleet.requests.destroy', $request->id)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="submit" class="dropdown-item">
                                                <i class="fa fa-trash"></i> Excluir
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.request.Booking_ID'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Date_Time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Mode'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>
            <?php else: ?>
            <h6 class="no-result">No results found</h6>
            <?php endif; ?> 
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>