

<?php $__env->startSection('title', 'Dashboard '); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="content-area py-1">
        
        <div class="col-md-12">
            <div class="box bg-white">
                <div class="box-block clearfix">
                    <h5 class="float-xs-left">Filtrar Franquia</h5>
                    <div class="float-xs-right">
                        <button class="btn btn-link btn-sm text-muted" type="button"><i
                                    class="ti-close"></i></button>
                    </div>
                </div>

                <div class="row" style="padding: 0 15px 20px 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php if(!is_null($fleetCities)): ?>
                                <select class="form-control col-md-6" name="" id="city">
                                    <option value="">Selecione a Cidade</option>

                                        <?php $__currentLoopData = $fleetCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cidade->city_id); ?>"<?php echo e(Request::has('city')&&Request::get('city')==$cidade->city_id? ' selected':''); ?>><?php echo e($cidade->city_name); ?> - <?php echo e($cidade->estate_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            <?php else: ?>
                                <p>Nehuma franquia cadastrada</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row row-md">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard-menus')): ?>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-danger tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-danger"></span><i class="fa fa-cab"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.Rides'); ?></h6>
                                <h1 class="mb-1">
                                    <?php if(!is_null($totalRides)): ?>
                                        <?php echo e($totalRides); ?>

                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-success tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-dollar"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.Revenue'); ?></h6>
                                <h1 class="mb-1"><?php echo e(currency($revenue)); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-primary tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-users"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.passengers'); ?></h6>
                                <h1 class="mb-1"><?php echo e($users); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-success tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-calendar"></i>
                            </div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1">KMS</h6>
                                <h1 class="mb-1"><?php echo e($km); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row row-md">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard-menus')): ?>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-primary tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-times"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.cancel_count'); ?></h6>
                                <h1 class="mb-1"><?php echo e($user_cancelled); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-danger tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-danger"></span><i class="fa fa-times"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.provider_cancel_count'); ?></h6>
                                <h1 class="mb-1"><?php echo e($provider_cancelled); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-success tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-user"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.providers'); ?></h6>
                                <h1 class="mb-1"><?php echo e($provider); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="box box-block bg-warning tile tile-1 mb-2">
                            <div class="t-icon right"><span class="bg-warning"></span><i class="fa fa-users"></i></div>
                            <div class="t-content">
                                <h6 class="text-uppercase mb-1"><?php echo app('translator')->getFromJson('admin.dashboard.fleets'); ?></h6>
                                <h1 class="mb-1"><?php echo e($fleet); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row row-md mb-2">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallet-summary')): ?>
                    <div class="col-md-4">
                        <div class="box bg-white">
                            <div class="box-block clearfix">
                                <h5 class="float-xs-left">Resumo Geral </h5>
                                <div class="float-xs-right">
                                </div>
                            </div>
                            <table class="table mb-md-0">
                                <tbody>
                                <?php ($total=$wallet['admin']); ?>
                                
                                
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.km'); ?></th>
                                    
                                    <td class="text-success">KM <?php echo e($km1[0]->distancia); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_admin_credit'); ?></th>
                                    
                                    <td class="text-success"><?php echo e(currency($wallet['admin'])); ?></td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_provider_credit'); ?></th>
                                    <?php if($wallet['provider_credit']): ?>
                                        <?php ($total=$total-$wallet['provider_credit'][0]['total_credit']); ?>
                                        <td class="text-success"><?php echo e(currency($wallet['provider_credit'][0]['total_credit'])); ?></td>
                                    <?php else: ?>
                                        <td class="text-success"><?php echo e(currency()); ?></td>
                                    <?php endif; ?>
                                </tr>

                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_provider_debit'); ?></th>
                                    <?php if($wallet['provider_debit']): ?>

                                        <td class="text-danger"><?php echo e(currency($wallet['provider_debit'][0]['total_debit'])); ?></td>
                                    <?php else: ?>
                                        <td class="text-danger"><?php echo e(currency()); ?></td>
                                    <?php endif; ?>
                                </tr>

                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_fleet_credit'); ?></th>
                                    <?php if($wallet['fleet_credit']): ?>
                                        <?php ($total=$total-($wallet['fleet_credit'][0]['total_credit'])); ?>
                                        <td class="text-success"><?php echo e(currency($wallet['fleet_credit'][0]['total_credit'])); ?></td>
                                    <?php else: ?>
                                        <td class="text-success"><?php echo e(currency()); ?></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_fleet_debit'); ?></th>
                                    <?php if($wallet['fleet_debit']): ?>
                                        <td class="text-danger"><?php echo e(currency($wallet['fleet_debit'][0]['total_debit'])); ?></td>
                                    <?php else: ?>
                                        <td class="text-danger"><?php echo e(currency()); ?></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_commission'); ?></th>
                                    <td class="text-success"><?php echo e(currency($wallet['admin_commission'])); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_peak_commission'); ?></th>
                                    <td class="text-success"><?php echo e(currency($wallet['peak_commission'])); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_waitining_commission'); ?></th>
                                    <td class="text-success"><?php echo e(currency($wallet['waiting_commission'])); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_discount'); ?></th>
                                    <td class="text-danger"><?php echo e(currency($wallet['admin_discount'])); ?></td>
                                </tr>
                                <tr>
                                    <?php ($total=$total-($wallet['admin_tax'])); ?>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_tax_amount'); ?></th>
                                    <td class="text-success"><?php echo e(currency($wallet['admin_tax'])); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_tips'); ?></th>
                                    <td class="text-danger"><?php echo e(currency($wallet['tips'])); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_referrals'); ?></th>
                                    <td class="text-danger"><?php echo e(currency($wallet['admin_referral'])); ?></td>
                                </tr>

                                <tr>
                                    <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_disputes'); ?></th>
                                    <td class="text-danger"><?php echo e(currency($wallet['admin_dispute'])); ?></td>
                                </tr>

                                <!--                             <tr>
                                <th scope="row text-right"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_total'); ?></th>
                                <td><?php echo e(currency($total)); ?></td>
                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recent-rides')): ?>
                    <div class="col-md-8">
                        <div class="box bg-white">
                            <div class="box-block clearfix">
                                <h5 class="float-xs-left"><?php echo app('translator')->getFromJson('admin.dashboard.Recent_Rides'); ?></h5>
                                <div class="float-xs-right">
                                    <button class="btn btn-link btn-sm text-muted" type="button"><i
                                                class="ti-close"></i></button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table mb-md-0">
                                        <tbody>
                                        <?php if(is_null($rides)): ?>
                                            <tr>
                                                <th>Selecione uma cidade</th>
                                            </tr>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $rides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><?php echo e($index + 1); ?></th>
                                                    <td><?php echo e($ride->user->first_name); ?> <?php echo e($ride->user->last_name); ?></td>
                                                    <td>
                                                        <a class="text-primary"
                                                           href="<?php echo e(route('admin.requests.show',$ride->id)); ?>"><span
                                                                    class="underline"><?php echo app('translator')->getFromJson('admin.dashboard.View_Ride_Details'); ?></span></a>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted"><?php echo e($ride->created_at->diffForHumans()); ?></span>
                                                    </td>
                                                    <td>
                                                        <?php if($ride->status == "COMPLETED"): ?>
                                                            <span class="tag tag-success">CONCLU??DA</span>
                                                        <?php elseif($ride->status == "CANCELLED"): ?>
                                                            <span class="tag tag-danger">CANCELADA</span>
                                                        <?php elseif($ride->status == "ARRIVED"): ?>
                                                            <span class="tag tag-info">EM ANDAMENTO</span>
                                                        <?php elseif($ride->status == "SEARCHING"): ?>
                                                            <span class="tag tag-info">PESQUISANDO</span>
                                                        <?php elseif($ride->status == "ACCEPTED"): ?>
                                                            <span class="tag tag-info">MOTORISTA A CAMINHO</span>
                                                        <?php elseif($ride->status == "STARTED"): ?>
                                                            <span class="tag tag-info">VIAGEM ACEITA</span>
                                                        <?php elseif($ride->status == "DROPPED"): ?>
                                                            <span class="tag tag-info">NO DESTINO</span>
                                                        <?php elseif($ride->status == "PICKEDUP"): ?>
                                                            <span class="tag tag-info">INICIADA</span>
                                                        <?php elseif($ride->status == "SCHEDULED"): ?>
                                                            <span class="tag tag-info">AGENDADA</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">

        var _registration = null;
        var rota = "<?php echo e(route('admin.dashboard')); ?>";

        $('#city').on("change", function () {
            if($(this).val() === ""){
                window.location.href = rota;
            }else{
               window.location.href = rota + "?city="+$(this).val(); 
            }
           
        });

        function registerServiceWorker() {
            return navigator.serviceWorker.register("<?php echo e(asset('js/service-worker.js')); ?>")
                .then(function (registration) {
                    _registration = registration;
                    return registration;
                })
                .catch(function (err) {
                    console.error('Unable to register service worker.', err);
                });
        }

        function askPermission() {
            return new Promise(function (resolve, reject) {
                const permissionResult = Notification.requestPermission(function (result) {
                    resolve(result);
                });

                if (permissionResult) {
                    permissionResult.then(resolve, reject);
                }
            })
                .then(function (permissionResult) {
                    if (permissionResult !== 'granted') {
                        throw new Error('We weren\'t granted permission.');
                    } else {
                        subscribeUserToPush();
                    }
                });
        }

        function urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding)
                .replace(/\-/g, '+')
                .replace(/_/g, '/');

            const rawData = window.atob(base64);
            //const rawData = new Blob([base64], {type: 'text/plain'})
            const outputArray = new Uint8Array(rawData.length);

            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        function getSWRegistration() {
            return new Promise(function (resolve, reject) {
                if (_registration != null) {
                    resolve(_registration);
                } else {
                    reject(Error("It broke"));
                }
            });
        }

        function subscribeUserToPush() {
            getSWRegistration()
                .then(function (registration) {
                    const subscribeOptions = {
                        userVisibleOnly: true,
                        applicationServerKey: urlBase64ToUint8Array('BCBsViMBVOOYATOaY4AjZOl1XCwiBqXbQtMcp4RXRmyfR927SqcCUt2SYwiF3iy3yxf3n60jVf8XF9vDE2ShVtM')
                    };
                    return registration.pushManager.subscribe(subscribeOptions);

                })
                .then(function (pushSubscription) {
                    sendSubscriptionToBackEnd(pushSubscription);
                    return pushSubscription;
                });
        }

        function sendSubscriptionToBackEnd(subscription) {
            $.ajax({
                url: "/save-subscription/<?php echo e(Auth::user()->id); ?>/admin",
                headers: {'Content-Type': 'application/json'},
                type: 'post',
                data: JSON.stringify(subscription),
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                }
            });
        }


        registerServiceWorker();

        askPermission();

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>