<?php $__env->startSection('title', 'Gerente de Disputa '); ?>

<?php $__env->startSection('content'); ?>
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
        <?php if(Setting::get('demo_mode', 0) == 1): ?>
        <div class="col-md-12" style="height:50px;color:red;">
                    ** Demo Mode : <?php echo app('translator')->getFromJson('admin.demomode'); ?>
                </div>
                <?php endif; ?>
            <h5 class="mb-1">
                <?php echo app('translator')->getFromJson('admin.dispute-manager.dispute_manager'); ?>
                <?php if(Setting::get('demo_mode', 0) == 1): ?>
                <span class="pull-right">(*personal information hidden in demo)</span>
                <?php endif; ?>
            </h5>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispute-manager-create')): ?>
            <a href="<?php echo e(route('admin.dispute-manager.create')); ?>" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('admin.dispute-manager.add_new_dispute_manager'); ?></a>
            <?php endif; ?>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.account-manager.full_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.mobile'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($account->name); ?></td>
                        <?php if(Setting::get('demo_mode', 0) == 1): ?>
                        <td><?php echo e(substr($account->email, 0, 3).'****'.substr($account->email, strpos($account->email, "@"))); ?></td>
                        <?php else: ?>
                        <td><?php echo e($account->email); ?></td>
                        <?php endif; ?>
                        <?php if(Setting::get('demo_mode', 0) == 1): ?>
                        <td>+919876543210</td>
                        <?php else: ?>
                        <td><?php echo e($account->mobile); ?></td>
                        <?php endif; ?>
                        <td>
                            <form action="<?php echo e(route('admin.dispute-manager.destroy', $account->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <a href="<?php echo e(route('admin.dispute-manager.edit', $account->id)); ?>" class="btn btn-info"><i class="fa fa-pencil"></i> <?php echo app('translator')->getFromJson('admin.edit'); ?></a>
                                <button class="btn btn-danger" onclick="return confirm('Voc?? tem certeza?')"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('admin.delete'); ?></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.account-manager.full_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.mobile'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>