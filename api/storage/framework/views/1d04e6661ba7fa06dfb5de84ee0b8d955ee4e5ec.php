<?php $__env->startSection('title', 'Request details '); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <h4><?php echo app('translator')->getFromJson('admin.request.request_details'); ?></h4>
                <a href="<?php echo e(route('fleet.requests.index')); ?>" class="btn btn-default pull-right">
                    <i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.Booking_ID'); ?> :</dt>
                            <dd class="col-sm-8"><?php echo e($request->booking_id); ?></dd>

                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?> :</dt>
                            <dd class="col-sm-8"><?php echo e($request->user->first_name); ?></dd>

                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?> :</dt>
                            <?php if($request->provider): ?>
                                <dd class="col-sm-8"><?php echo e($request->provider->first_name); ?></dd>
                            <?php else: ?>
                                <dd class="col-sm-8"><?php echo app('translator')->getFromJson('admin.request.provider_not_assigned'); ?></dd>
                            <?php endif; ?>

                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.total_distance'); ?> :</dt>
                            <dd class="col-sm-8"><?php echo e($request->distance ? $request->distance : '-'); ?><?php echo e($request->unit); ?></dd>

                            <?php if($request->status == 'SCHEDULED'): ?>
                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.ride_scheduled_time'); ?> :</dt>
                                <dd class="col-sm-8">
                                    <?php if($request->schedule_at != ""): ?>
                                        <?php echo e(date('jS \of F Y h:i:s A', strtotime($request->schedule_at))); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            <?php else: ?>
                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.ride_start_time'); ?> :</dt>
                                <dd class="col-sm-8">
                                    <?php if($request->started_at != ""): ?>
                                        <?php echo e(strftime('%A, %d de %B de %Y', strtotime($request->started_at))); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.ride_end_time'); ?> :</dt>
                                <dd class="col-sm-8">
                                    <?php if($request->finished_at != ""): ?>
                                        <?php echo e(date('jS \of F Y h:i:s A', strtotime($request->finished_at))); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </dd>
                            <?php endif; ?>

                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.pickup_address'); ?> :</dt>
                            <dd class="col-sm-8"><?php echo e($request->s_address ? $request->s_address : '-'); ?></dd>

                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.drop_address'); ?> :</dt>
                            <dd class="col-sm-8"><?php echo e($request->d_address ? $request->d_address : '-'); ?></dd>

                            <?php if($request->payment): ?>
                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.base_price'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->fixed)); ?></dd>
                                <?php if($request->service_type->calculator=='MIN'): ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.minutes_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->minute)); ?></dd>
                                <?php endif; ?>
                                <?php if($request->service_type->calculator=='HOUR'): ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.hours_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->hour)); ?></dd>
                                <?php endif; ?>
                                <?php if($request->service_type->calculator=='DISTANCE'): ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.distance_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->distance)); ?></dd>
                                <?php endif; ?>
                                <?php if($request->service_type->calculator=='DISTANCEMIN'): ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.minutes_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->minute)); ?></dd>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.distance_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->distance)); ?></dd>
                                <?php endif; ?>
                                <?php if($request->service_type->calculator=='DISTANCEHOUR'): ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.hours_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->hour)); ?></dd>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.distance_price'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->distance)); ?></dd>
                                <?php endif; ?>
                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.commission'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->commision)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.fleet_commission'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->fleet)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.discount_price'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->discount)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.peak_amount'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->peak_amount)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.peak_commission'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->peak_comm_amount)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.waiting_charge'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->waiting_amount)); ?></dd>

                                <dt class="col-sm-4"
                                    style="padding-right:0px;"><?php echo app('translator')->getFromJson('admin.request.waiting_commission'); ?> :
                                </dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->waiting_comm_amount)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.tax_price'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->tax)); ?></dd>

                            <!--  <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.surge_price'); ?> :</dt>
                        <dd class="col-sm-8"><?php echo e(currency($request->payment->surge)); ?></dd>
 -->
                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.tips'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->tips)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('user.ride.round_off'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->round_of)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.total_amount'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->total+$request->payment->tips)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.wallet_deduction'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->wallet)); ?></dd>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.payment_mode'); ?> :</dt>
                                <dd class="col-sm-8"><?php echo e($request->payment->payment_mode=="CASH"?'DINHEIRO':'CARTÃO'); ?></dd>
                                <?php if($request->payment->payment_mode=='CASH'): ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.cash_amount'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->cash)); ?></dd>
                                <?php else: ?>
                                    <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.card_amount'); ?> :</dt>
                                    <dd class="col-sm-8"><?php echo e(currency($request->payment->card)); ?></dd>
                                <?php endif; ?>

                                <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.provider_earnings'); ?>:</dt>
                                <dd class="col-sm-8"><?php echo e(currency($request->payment->provider_pay)); ?></dd>
                            <?php endif; ?>

                            <dt class="col-sm-4"><?php echo app('translator')->getFromJson('admin.request.ride_status'); ?> :</dt>
                            <dd class="col-sm-8">
                                <?php if($request->status == "COMPLETED"): ?>
                                    COMPLETO
                                <?php else: ?>
                                    <?php echo e($request->status); ?>

                                <?php endif; ?>
                            </dd>

                        </dl>
                    </div>
                    <div class="col-md-6">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style type="text/css">
        #map {
            height: 450px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        var map;
        var zoomLevel = 11;

        function initMap() {

            map = new google.maps.Map(document.getElementById('map'));

            var marker = new google.maps.Marker({
                map: map,
                icon: '/asset/img/marker-start.png',
                anchorPoint: new google.maps.Point(0, -29)
            });

            var markerSecond = new google.maps.Marker({
                map: map,
                icon: '/asset/img/marker-end.png',
                anchorPoint: new google.maps.Point(0, -29)
            });

            var bounds = new google.maps.LatLngBounds();

            source = new google.maps.LatLng(<?php echo e($request->s_latitude); ?>, <?php echo e($request->s_longitude); ?>);
            destination = new google.maps.LatLng(<?php echo e($request->d_latitude); ?>, <?php echo e($request->d_longitude); ?>);

            marker.setPosition(source);
            markerSecond.setPosition(destination);

            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true, preserveViewport: true});
            directionsDisplay.setMap(map);

            directionsService.route({
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            }, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    console.log(result);
                    directionsDisplay.setDirections(result);

                    marker.setPosition(result.routes[0].legs[0].start_location);
                    markerSecond.setPosition(result.routes[0].legs[0].end_location);
                }
            });

                    <?php if($request->provider && $request->status != 'COMPLETED'): ?>
            var markerProvider = new google.maps.Marker({
                    map: map,
                    icon: "/asset/img/marker-car.png",
                    anchorPoint: new google.maps.Point(0, -29)
                });

            provider = new google.maps.LatLng(<?php echo e($request->provider->latitude); ?>, <?php echo e($request->provider->longitude); ?>);
            markerProvider.setVisible(true);
            markerProvider.setPosition(provider);
            console.log('Provider Bounds', markerProvider.getPosition());
            bounds.extend(markerProvider.getPosition());
            <?php endif; ?>

            bounds.extend(marker.getPosition());
            bounds.extend(markerSecond.getPosition());
            map.fitBounds(bounds);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(Config::get('constants.map_key')); ?>&libraries=places&callback=initMap"
            async defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fleet.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>