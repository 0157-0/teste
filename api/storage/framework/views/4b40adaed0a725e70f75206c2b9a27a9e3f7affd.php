<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title><?php echo $__env->yieldContent('title'); ?><?php echo e(config('constants.site_title', 'Moob Urban')); ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo e(config('constants.site_icon')); ?>">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/bootstrap4/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/themify-icons/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/jscrollpane/jquery.jscrollpane.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/waves/waves.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/switchery/dist/switchery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/DataTables/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/DataTables/Buttons/css/buttons.dataTables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css')); ?>">



    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/bootstrap-glyphicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/bootstrap-editable.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/dropify/dist/css/dropify.min.css')); ?>">
    <?php if(Config::get('app.locale')=='ar'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('main/assets/css/arabic_core.css')); ?>">
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('main/assets/css/core.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('main/assets/css/style_pagination.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('main/assets/css/style_dialog.css')); ?>">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .rating-outer span,
        .rating-symbol-background {
            color: #ffe000!important;
        }
        .rating-outer span,
        .rating-symbol-foreground {
            color: #ffe000!important;
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="fixed-sidebar fixed-header content-appear skin-default">

    <div class="wrapper">
        <div class="preloader"></div>
        <div class="site-overlay"></div>
        <?php
        $route_name = Route::currentRouteName();
        $allRouteDialog = config('guidelines.demo_mode_dialog.admin');
        $checkRouteDialog = isset($allRouteDialog[$route_name])?"true":"false";
        $tempVar = (Session::get($route_name))?Session::get($route_name):"false";
        if($checkRouteDialog =="true"){
        $dialog = $allRouteDialog[$route_name];
        }
        ?>

<?php if($checkRouteDialog =="true"): ?>
    <div id="demoModeDialog" class="demoModeDialogmodal">
        <div class="demoModeDialogmodal-content text-center">
            <span class="demoModeDialogclose">&times;</span>
            <div class="row demoModeDialogdis demoModeDialogdis1">
                <p> <?php echo $dialog; ?> </p>
           </div>
         </div>
    </div>
    <?php endif; ?>

        <?php echo $__env->make('admin.include.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('admin.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="site-content">

            <?php echo $__env->make('common.notify', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>

            <?php echo $__env->make('admin.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>

    <!-- Vendor JS -->
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/jquery/jquery-1.12.3.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/tether/js/tether.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/bootstrap4/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/detectmobilebrowser/detectmobilebrowser.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/jscrollpane/jquery.mousewheel.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/jscrollpane/mwheelIntent.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/jscrollpane/jquery.jscrollpane.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/jquery-fullscreen-plugin/jquery.fullscreen')); ?>-min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/waves/waves.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/js/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/Responsive/js/dataTables.responsi')); ?>ve.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/Responsive/js/responsive.bootstra')); ?>p4.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/Buttons/js/dataTables.buttons')); ?>.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/Buttons/js/buttons.bootstrap4')); ?>.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/JSZip/jszip.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/Buttons/js/buttons.html5.min.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('main/vendor/DataTables/Buttons/js/buttons.print.min.js')); ?>"></script>
    <script type="text/javascript" src= <?php if(($checkRouteDialog =="true") && (Setting::get('demo_mode', 0) == 1) && ($tempVar =="false")): ?>
    <?php echo e(Session::put($route_name,'true')); ?>

         <script type="text/javascript">
            var demoModeDialogmodal = document.getElementById('demoModeDialog');
            demoModeDialogmodal.style.display = "block";
            var demoModeDialogspan = document.getElementsByClassName("demoModeDialogclose")[0];
            demoModeDialogspan.onclick = function() 
            {
                demoModeDialogmodal.style.display = "none";
            }
            </script>
    <?php endif; ?> "<?php echo e(asset('main/vendor/DataTables/Buttons/js/buttons.colVis.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('main/vendor/switchery/dist/switchery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/dropify/dist/js/dropify.min.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/clockpicker/dist/jquery-clockpicker.min.js')); ?>"></script>    
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/moment/moment.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/vendor/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <!-- Neptune JS -->
    <script type="text/javascript" src="<?php echo e(asset('main/assets/js/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/assets/js/demo.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/assets/js/forms-pickers.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/assets/js/tables-datatable.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('main/assets/js/forms-upload.js')); ?>"></script>



    <?php echo $__env->yieldContent('scripts'); ?>

    <script type="text/javascript" src="<?php echo e(asset('asset/js/rating.js')); ?>"></script>    
    <script type="text/javascript">
        $('.rating').rating();
        
        //Mask
        $(function() {
            $('#currency_fixed').maskMoney();
            $('#currency_price').maskMoney();
            $('#currency_min_price').maskMoney();
            $('#currency_minute').maskMoney();
          });
    </script>
   
<!--    <?php if(Setting::get('demo_mode', 0) == 1): ?>
         Start of LiveChat (www.livechatinc.com) code 
            <script type="text/javascript">
            window.__lc = window.__lc || {};
            window.__lc.license = 8256261;
            (function() {
                var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
                lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
            })();
        </script>
         End of LiveChat code 
    <?php endif; ?>-->

    <?php if(($checkRouteDialog =="true") && (Setting::get('demo_mode', 0) == 1) && ($tempVar =="false")): ?>
    <?php echo e(Session::put($route_name,'true')); ?>

         <script type="text/javascript">
            var demoModeDialogmodal = document.getElementById('demoModeDialog');
            demoModeDialogmodal.style.display = "block";
            var demoModeDialogspan = document.getElementsByClassName("demoModeDialogclose")[0];
            demoModeDialogspan.onclick = function() 
            {
                demoModeDialogmodal.style.display = "none";
            }
            </script>
    <?php endif; ?> 
</body>
</html>