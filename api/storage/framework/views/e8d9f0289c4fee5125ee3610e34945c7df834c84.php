<?php $__env->startSection('title', 'Horários de Pico '); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-area py-1">
        <div class="container-fluid">
            
            <div class="box box-block bg-white">
                <?php if(Setting::get('demo_mode', 0) == 1): ?>
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : <?php echo app('translator')->getFromJson('admin.demomode'); ?>
                    </div>
                <?php endif; ?>
                <h5 class="mb-1"><?php echo app('translator')->getFromJson('admin.peakhour.title'); ?></h5>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('peak-hour-create')): ?>
                <a href="<?php echo e(route('admin.peakhour.create')); ?>" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('admin.peakhour.add_time'); ?></a>
                <?php endif; ?>

                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.peakhour.start_time'); ?> </th>
                            <th><?php echo app('translator')->getFromJson('admin.peakhour.end_time'); ?> </th>                           
                            <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $peakhour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $peak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e(date('h:i A', strtotime($peak->start_time))); ?></td>
                            <td><?php echo e(date('h:i A', strtotime($peak->end_time))); ?> </td>
                           
                            <td>
                                <form action="<?php echo e(route('admin.peakhour.destroy', $peak->id)); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="_method" value="DELETE">
                                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('peak-hour-edit')): ?>
                                    <a href="<?php echo e(route('admin.peakhour.edit', $peak->id)); ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('peak-hour-delete')): ?>
                                    <button class="btn btn-danger" onclick="return confirm('Você tem certeza?')"><i class="fa fa-trash"></i> Excluir</button>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('admin.peakhour.start_time'); ?> </th>
                            <th><?php echo app('translator')->getFromJson('admin.peakhour.end_time'); ?> </th>                           
                            <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>