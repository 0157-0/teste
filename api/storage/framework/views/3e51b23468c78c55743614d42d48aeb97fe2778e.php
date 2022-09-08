<?php $__env->startSection('title', 'Providers '); ?>

<?php $__env->startSection('content'); ?>
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">
                <?php echo app('translator')->getFromJson('admin.provides.providers'); ?>
            </h5>
            <form action="<?php echo e(route('fleet.provider.index')); ?>" method="get">
                <div class="row">
                    <div class="mb-1 col-md-3">
                        <input name="name" type="text" class="form-control" placeholder="Nome do Motorista" aria-label="Nome do Motorista" aria-describedby="basic-addon2">
                    </div>
                    <div class="col-md-4">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="A" class="radio"<?php echo e(request()->has('status')&&request()->get('status')=="A"?" checked":""); ?>> Regularizados
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="P" class="radio"<?php echo e(request()->has('status')&&request()->get('status')=="P"?" checked":""); ?>> Docs Pendentes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="F" class="radio"<?php echo e(request()->has('status')&&request()->get('status')=="F"?" checked":""); ?>> Falta Docs
                        </label>
                    </div>
                    <div class="mb-1 col-md-1">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </div>
                </div>
            </form>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('provider-create')): ?>
                <a href="<?php echo e(route('admin.provider.create')); ?>" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i><?php echo app('translator')->getFromJson('admin.provides.add_new_provider'); ?></a>
            <?php endif; ?>
            <br>
            <a href="<?php echo e(route('fleet.provider.create')); ?>" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('admin.provides.add_new_provider'); ?></a>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.full_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.mobile'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.users.Wallet_Amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.total_requests'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.accepted_requests'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.service_type'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.online'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php ($page = ($pagination->currentPage-1)*$pagination->perPage); ?>
                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($page++); ?>
                    <tr>
                        <td><?php echo e($page); ?></td>
                        <td><?php echo e($provider->first_name); ?> <?php echo e($provider->last_name); ?></td>
                        <?php if(Setting::get('demo_mode', 0) == 1): ?>
                        <td><?php echo e(substr($provider->email, 0, 3).'****'.substr($provider->email, strpos($provider->email, "@"))); ?></td>
                        <?php else: ?>
                        <td><?php echo e($provider->email); ?></td>
                        <?php endif; ?>
                        <?php if(Setting::get('demo_mode', 0) == 1): ?>
                        <td>+919876543210</td>
                        <?php else: ?>
                        <td><?php echo e($provider->mobile); ?></td>
                        <?php endif; ?>
                        <td>
                            <?php if($provider->wallet_balance < 0): ?>
                                <label style="cursor: default;" class="btn small btn-block btn-danger"><?php echo e(currency($provider->wallet_balance)); ?></label>
                            <?php elseif($provider->wallet_balance == 0): ?>
                                <label style="cursor: default;" class="btn small btn-block btn-warning"><?php echo e(currency($provider->wallet_balance)); ?></label>
                            <?php else: ?>
                                <label style="cursor: default;" class="btn small btn-block btn-success"><?php echo e(currency($provider->wallet_balance)); ?></label>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($provider->total_requests()); ?></td>
                        <td><?php echo e($provider->accepted_requests()); ?></td>
                        <td>
                            <?php if($provider->active_documents() == $total_documents && $provider->service != null): ?>
                                <a class="btn btn-success btn-block" href="<?php echo e(route('fleet.provider.document.index', $provider->id )); ?>">Verificado</a>
                            <?php else: ?>
                                <a class="btn btn-danger btn-block label-right" href="<?php echo e(route('fleet.provider.document.index', $provider->id )); ?>">Pendente <span class="btn-label"><?php echo e($provider->pending_documents()); ?></span></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($provider->service): ?>
                                <?php if($provider->service->status == 'active'): ?>
                                    <label class="btn btn-block btn-primary">Sim</label>
                                <?php else: ?>
                                    <label class="btn btn-block btn-warning">Não</label>
                                <?php endif; ?>
                            <?php else: ?>
                                <label class="btn btn-block btn-danger">N/A</label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="input-group-btn">
                                <?php if($provider->status == 'approved'): ?>
                                <a class="btn btn-danger btn-block" href="<?php echo e(route('fleet.provider.disapprove', $provider->id )); ?>">Desativar</a>
                                <?php else: ?>
                                <a class="btn btn-success btn-block" href="<?php echo e(route('fleet.provider.approve', $provider->id )); ?>">Aprovar</a>
                                <?php endif; ?>
                                <button type="button"
                                    class="btn btn-info btn-block dropdown-toggle"
                                    data-toggle="dropdown"><?php echo app('translator')->getFromJson('admin.action'); ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo e(route('fleet.provider.request', $provider->id)); ?>" class="btn btn-default"><i class="fa fa-search"></i> <?php echo app('translator')->getFromJson('admin.History'); ?></a>
                                    </li>
                                    <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                        <li>
                                            <a href="<?php echo e(route('fleet.provider.edit', $provider->id)); ?>" class="btn btn-default"><i class="fa fa-pencil"></i>  <?php echo app('translator')->getFromJson('admin.edit'); ?></a>
                                        </li>

                                    <li>
                                        <form action="<?php echo e(route('fleet.provider.destroy', $provider->id)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-default look-a-like" onclick="return confirm('Você tem certeza?')"><i class="fa fa-trash"></i> <?php echo app('translator')->getFromJson('admin.delete'); ?></button>
                                        </form>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.full_name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.mobile'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.users.Wallet_Amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.total_requests'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.accepted_requests'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.service_type'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.provides.online'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>
                <?php echo $__env->make('common.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>