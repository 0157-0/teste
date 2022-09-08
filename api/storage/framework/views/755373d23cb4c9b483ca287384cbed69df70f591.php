<div class="site-sidebar">
	<div class="custom-scroll custom-scroll-light">
		<ul class="sidebar-menu">
			<li class="menu-title">Painel do Franqueado</li>
			<li>
				<a href="<?php echo e(route('fleet.dashboard')); ?>" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-anchor"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.dashboard'); ?></span>
				</a>
			</li>

			<li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.members'); ?></li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-car"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.providers'); ?></span>
				</a>
				<ul>
					<li><a href="<?php echo e(route('fleet.provider.index')); ?>"><?php echo app('translator')->getFromJson('admin.include.list_providers'); ?></a></li>
					<li><a href="<?php echo e(route('fleet.provider.create')); ?>"><?php echo app('translator')->getFromJson('admin.include.add_new_provider'); ?></a></li>
				</ul>
			</li>
			<li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.details'); ?></li>
			<li>
				<a href="<?php echo e(route('fleet.map.index')); ?>" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-map-alt"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.map'); ?></span>
				</a>
			</li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-view-grid"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.ratings'); ?> &amp; <?php echo app('translator')->getFromJson('admin.include.reviews'); ?></span>
				</a>
				<ul>
					<li><a href="<?php echo e(route('fleet.provider.review')); ?>"><?php echo app('translator')->getFromJson('admin.include.provider_ratings'); ?></a></li>
				</ul>
			</li>
			<li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.requests'); ?></li>
			<li>
				<a href="<?php echo e(route('fleet.requests.index')); ?>" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-infinite"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.request_history'); ?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo e(route('fleet.requests.scheduled')); ?>" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-palette"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.scheduled_rides'); ?></span>
				</a>
			</li>
			<li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.accounts'); ?></li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.statements'); ?></span>
				</a>
				<ul>
					<li><a href="<?php echo e(route('fleet.ride.statement')); ?>"><?php echo app('translator')->getFromJson('admin.include.overall_ride_statments'); ?></a></li>
					<li><a href="<?php echo e(route('fleet.ride.statement.provider')); ?>"><?php echo app('translator')->getFromJson('admin.include.provider_statement'); ?></a></li>
				</ul>
			</li>

			<li class="menu-title"><?php echo app('translator')->getFromJson('admin.include.account'); ?></li>
			<li>
				<a href="<?php echo e(route('fleet.profile')); ?>" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-user"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.account_settings'); ?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo e(route('fleet.password')); ?>" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-exchange-vertical"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.change_password'); ?></span>
				</a>
			</li>
			<li class="compact-hide">
				<a href="<?php echo e(url('/fleet/logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
					<span class="s-icon"><i class="ti-power-off"></i></span>
					<span class="s-text"><?php echo app('translator')->getFromJson('admin.include.logout'); ?></span>
                </a>

                <form id="logout-form" action="<?php echo e(url('/fleet/logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
			</li>

		</ul>
	</div>
</div>
