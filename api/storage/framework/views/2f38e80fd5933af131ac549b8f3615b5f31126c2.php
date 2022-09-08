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
        <title>Noaccess</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo e(config('constants.site_icon')); ?>">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('main/vendor/bootstrap4/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/vendor/font-awesome/css/font-awesome.min.css')); ?>">

        <style type="text/css">
            body{
                background: white;
            }
            h2{

                color:#48208E;
                -webkit-background-clip: text;
                background-clip: text;
            }
            .errorhead{margin-top:55px;}
            .errorhead h2{text-align: center;font-size: 40vh;}
            .errorhead p{text-align: center;    font-size: 30px;}
            .perm{font-size: 22px!important;}
            .backhome{    border: none;
                          background: #48208E;
                          color: white;
                          padding: 12px;
                          text-align: center;
                          font-size: 20px;border-radius:100px;}
            .fuller{text-align: center;}
            .fa{margin-right: 10px;}
        </style>

    </head>



    <body>
        <div class="container-fluid fuller">

            <div class="errorhead ">
                <h2>403</h2>
                <p>Acesso Negado ou Proibido!</p>
                <p class="perm">Você não tem permissão para acessar esta página</p></div>
            <a href="" class=text-center">
                <button class="backhome"  onclick="history.back();" style="cursor: pointer;"><i class="fa fa-home"></i>Voltar para Home</button></a>
        </div>
    </body>
</html>