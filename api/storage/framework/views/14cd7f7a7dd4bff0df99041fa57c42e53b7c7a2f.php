

<div class="<?php echo e(config('constants.menu_skin', 'skin-1')); ?>">
    <div class="site-sidebar">
        <div class="custom-scroll custom-scroll-light">
            <ul class="sidebar-menu">
                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN|ACCOUNT')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.admin_dashboard'); ?></li>
                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.dashboard'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatcher-panel')): ?>
                <li>
                    <a href="<?php echo e(route('admin.dispatcher.index')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="fa fa-transgender-alt" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.dispatcher_panel'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispute-list')): ?>

                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-write" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.dispute_panel'); ?></span>
                    </a>
                    <ul>
                        <li><a href="<?php echo e(route('admin.dispute.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.dispute_type'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.userdisputes')); ?>"><?php echo app('translator')->getFromJson('admin.include.dispute_request'); ?></a></li>
                    </ul>
                </li>	

                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('heat-map')): ?>
                <li>
                    <a href="<?php echo e(route('admin.map.index')); ?>" class="waves-effect waves-light">
                            <span class="s-icon"><i class="ti-map-alt"></i></span>
                            <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.map'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.heatmap')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="ti-map"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.heat_map'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('god-eye')): ?>
                <li>
                    <a href="<?php echo e(route('admin.godseye')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="fa fa-eye"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.heatmap.godseye'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>	
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.members'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.roles'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?><li><a href="<?php echo e(route('admin.role.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.role_types'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sub-admin-list')): ?><li><a href="<?php echo e(route('admin.sub-admins.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.sub_admins'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.users'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?><li><a href="<?php echo e(route('admin.user.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_users'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?><li><a href="<?php echo e(route('admin.user.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_user'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('provider-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-server" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.providers'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('provider-list')): ?><li><a href="<?php echo e(route('admin.provider.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_providers'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('provider-create')): ?><li><a href="<?php echo e(route('admin.provider.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_provider'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/boss.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.fleet_owner'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-list')): ?><li><a href="<?php echo e(route('admin.fleet.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_fleets'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fleet-create')): ?><li><a href="<?php echo e(route('admin.fleet.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_fleet_owner'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatcher-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.dispatcher'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatcher-list')): ?><li><a href="<?php echo e(route('admin.dispatch-manager.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_dispatcher'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatcher-create')): ?><li><a href="<?php echo e(route('admin.dispatch-manager.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_dispatcher'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account-manager-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/account.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.account_manager'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account-manager-list')): ?><li><a href="<?php echo e(route('admin.account-manager.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_account_managers'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account-manager-create')): ?><li><a href="<?php echo e(route('admin.account-manager.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_account_manager'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispute-manager-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/account.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.dispute_manager'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispute-manager-list')): ?><li><a href="<?php echo e(route('admin.dispute-manager.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_dispute_managers'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispute-manager-create')): ?><li><a href="<?php echo e(route('admin.dispute-manager.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_dispute_manager'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>


                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.accounts'); ?></li>
                <?php endif; ?>	
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('statements')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-book" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.statements'); ?></span>
                    </a>
                    <ul>
                        <li><a href="<?php echo e(route('admin.ride.statement')); ?>"><?php echo app('translator')->getFromJson('admin.include.overall_ride_statments'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.ride.statement.provider')); ?>"><?php echo app('translator')->getFromJson('admin.include.provider_statement'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.ride.statement.user')); ?>"><?php echo app('translator')->getFromJson('admin.include.user_statement'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.ride.statement.fleet')); ?>"><?php echo app('translator')->getFromJson('admin.include.fleet_statement'); ?></a></li>
                        <!-- <li><a href="<?php echo e(route('admin.ride.statement.today')); ?>"><?php echo app('translator')->getFromJson('admin.include.daily_statement'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.ride.statement.monthly')); ?>"><?php echo app('translator')->getFromJson('admin.include.monthly_statement'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.ride.statement.yearly')); ?>"><?php echo app('translator')->getFromJson('admin.include.yearly_statement'); ?></a></li> -->
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settlements')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.transaction'); ?></span>
                    </a>
                    <ul>
                        <li><a href="<?php echo e(route('admin.providertransfer')); ?>"><?php echo app('translator')->getFromJson('admin.include.provider_request'); ?></a></li>
                        <!--<li><a href="<?php echo e(route('admin.fleettransfer')); ?>"><?php echo app('translator')->getFromJson('admin.include.fleet_request'); ?></a></li>-->
                        <li><a href="<?php echo e(route('admin.transactions')); ?>"><?php echo app('translator')->getFromJson('admin.include.all_transaction'); ?></a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.details'); ?></li>
                <?php endif; ?>	
                  

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ratings')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-star-half-o" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.ratings'); ?> &amp; <?php echo app('translator')->getFromJson('admin.include.reviews'); ?></span>
                    </a>
                    <ul>
                        <li><a href="<?php echo e(route('admin.user.review')); ?>"><?php echo app('translator')->getFromJson('admin.include.user_ratings'); ?></a></li>
                        <li><a href="<?php echo e(route('admin.provider.review')); ?>"><?php echo app('translator')->getFromJson('admin.include.provider_ratings'); ?></a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.rides'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ride-history')): ?>
                <li>
                    <a href="<?php echo e(route('admin.requests.index')); ?>" class="waves-effect  waves-light">
                        <span class="s-icon"><i class="fa fa-history" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.ride_history'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!--            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('schedule-rides')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.requests.scheduled')); ?>" class="waves-effect  waves-light">
                                    <span class="s-icon"><i class="ti-palette"></i></span>
                                    <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.scheduled_rides'); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>-->

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.offer'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('promocodes-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-layout-tab"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.promocodes'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('promocodes-list')): ?><li><a href="<?php echo e(route('admin.promocode.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_promocodes'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('promocodes-create')): ?><li><a href="<?php echo e(route('admin.promocode.create')); ?>">
                                <?php echo app('translator')->getFromJson('admin.include.add_new_promocode'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.general'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-types-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/support-service.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.service_types'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-types-list')): ?><li><a href="<?php echo e(route('admin.service.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_service_types'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-types-create')): ?><li><a href="<?php echo e(route('admin.service.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_service_type'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('peak-hour-list')): ?><li><a href="<?php echo e(route('admin.peakhour.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.peakhour'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('documents-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.documents'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('documents-list')): ?><li><a href="<?php echo e(route('admin.document.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_documents'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('documents-create')): ?><li><a href="<?php echo e(route('admin.document.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_document'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.notify'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-list')): ?><li><a href="<?php echo e(route('admin.notification.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_notifications'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-create')): ?><li><a href="<?php echo e(route('admin.notification.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_notification'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel-reasons-list')): ?>
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.reason'); ?></span>
                    </a>
                    <ul>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel-reasons-list')): ?><li><a href="<?php echo e(route('admin.reason.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_reasons'); ?></a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancel-reasons-create')): ?><li><a href="<?php echo e(route('admin.reason.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_reason'); ?></a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.payment_details'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment-history')): ?>
                <li>
                    <a href="<?php echo e(route('admin.payment')); ?>" class="waves-effect  waves-light">
                        <span class="s-icon"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.payment_history'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment-settings')): ?>
                <li>
                    <a href="<?php echo e(route('admin.settings.payment')); ?>" class="waves-effect  waves-light">
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/credit-card.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.payment_settings'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.settings'); ?></li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings')): ?>
                <li>
                    <a href="<?php echo e(route('admin.settings')); ?>" class="waves-effect  waves-light">
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/repairing-service.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.site_settings'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.others'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cms-pages')): ?>
                <li>
                    <a href="<?php echo e(route('admin.cmspages')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="ti-file"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.cms_pages'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help')): ?>
                <li>
                    <a href="<?php echo e(route('admin.help')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="ti-help"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.help'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('custom-push')): ?>
                <li>
                    <a href="<?php echo e(route('admin.push')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/push-icon.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.custom_push'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!--            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transalations')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.translation')); ?>" class="waves-effect waves-light">
                                    <span class="s-icon"><i class="ti-smallcap"></i></span>
                                    <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.translations'); ?></span>
                                </a>
                            </li>
                            <?php endif; ?>-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lost-item-list')): ?>
                <li>
                    <a href="<?php echo e(route('admin.lostitem.index')); ?>" class="waves-effect waves-light">
                        <span class="s-icon"><i class="ti-write"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.lostitem'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole('ADMIN')): ?>
                <li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.account'); ?></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account-settings')): ?>
                <li>
                    <a href="<?php echo e(route('admin.profile')); ?>" class="waves-effect  waves-light">
                        <span class="s-icon"><img src="<?php echo e(asset('asset/img/manager.png')); ?>"></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.account_settings'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change-password')): ?>
                <li>
                    <a href="<?php echo e(route('admin.password')); ?>" class="waves-effect  waves-light">
                        <span class="s-icon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.change_password'); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="compact-hide">
                    <a href="<?php echo e(url('/admin/logout')); ?>"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        <span class="s-icon"><i class="ti-power-off"></i></span>
                        <span class="s-text"><?php echo app('translator')->getFromJson('admin.include.logout'); ?></span>
                    </a>

                    <form id="logout-form" action="<?php echo e(url('/admin/logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>

            </ul>
        </div>
    </div>
</div>