<?php $__env->startSection('title', 'Provider Reviews '); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-area py-1">
        <div class="container-fluid">

            <div class="box box-block bg-white">
                <h5 class="mb-1"><?php echo app('translator')->getFromJson('admin.review.Provider_Reviews'); ?></h5>
                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.review.Request_ID'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.review.Rating'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Date_Time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.review.Comments'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $Reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($review->request_id); ?></td>
                            <?php if(isset($review->user)): ?>
                                <td><?php echo e($review->user->first_name); ?> <?php echo e($review->user->last_name); ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <td><?php echo e($review->provider->first_name); ?> <?php echo e($review->provider->last_name); ?></td>
                            <td>
                                <div className="rating-outer">
                                    <input type="hidden" value="<?php echo e($review->provider_rating); ?>" name="rating"
                                           class="rating" disabled="disabled"/>
                                </div>
                            </td>
                            <td><?php echo e($review->created_at); ?></td>
                            <td><?php echo e($review->provider_comment); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('admin.id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.review.Request_ID'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.review.Rating'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Date_Time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.review.Comments'); ?></th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>