<?php $__env->startSection('title', 'Frotas '); ?>

<?php $__env->startSection('content'); ?>
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <?php if(Setting::get('demo_mode', 0) == 1): ?>
        <div class="col-md-12" style="hSetting::get('demo_mode', 0) == height:50px;color:red;">
                    ** Demo Mode : <?php echo app('translator')->getFromJson('admin.demomode'); ?>
                </div>
                <?php endif; ?>
            <h5 class="mb-1">
                <?php echo app('translator')->getFromJson('admin.fleet.fleet_owners'); ?>
                <?php if(config('constants.demo_mode', 1) == 1): ?>
                <span class="pull-right">(*personal information hidden in demo)</span>
                <?php endif; ?>
            </h5>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-create')): ?>
            <a href="<?php echo e(route('admin.fleet.create')); ?>" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('admin.fleet.add_new_fleet_owner'); ?></a>
            <?php endif; ?>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th>Nome da Franquia</th>
                        <th><?php echo app('translator')->getFromJson('admin.fleet.company_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.city'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.mobile'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.picture'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $fleets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $fleet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($fleet->name); ?></td>
                        <td><?php echo e($fleet->company); ?></td>
                        <td><?php echo e(isset($fleet->city) ? $fleet->city->title : ''); ?></td>
                        <td><?php echo e($fleet->mobile); ?></td>
                        <td><img src="<?php echo e(img($fleet->logo)); ?>" style="height: 100px;"></td>
                        <td>
                            <form action="<?php echo e(route('admin.fleet.destroy', $fleet->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-providers')): ?>
                                <a href="<?php echo e(route('admin.provider.index')); ?>?fleet=<?php echo e($fleet->id); ?>" class="btn btn-info"> <?php echo app('translator')->getFromJson('admin.fleet.show_provider'); ?></a>
                                <?php endif; ?>

                                <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-edit')): ?>
                                 <a href="<?php echo e(route('admin.fleet.edit', $fleet->id)); ?>" class="btn btn-info"><i class="fa fa-pencil"></i> <?php echo app('translator')->getFromJson('admin.edit'); ?></a>
                                 <?php endif; ?>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-delete')): ?>
                                <button class="btn btn-danger" onclick="return confirm('Você tem certeza?')"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('admin.delete'); ?></button>
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
                        <th>Nome da Franquia</th>
                        <th><?php echo app('translator')->getFromJson('admin.fleet.company_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.city'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.mobile'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.picture'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>