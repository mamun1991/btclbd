<?php 
    $configApp = $this->config->item('app');
    $cfgDirView = $configApp['backend']['dir_view'];
    $cfgRoute = $configApp['backend']['base_route'];
    $themes = $configApp['backend']['dir_theme'];
    
    //echo base_url().$themes;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$app_settings['name'];?> - Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?=$app_settings['icon'];?>" type="image/png" sizes="16x16">
  <link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url().$themes;?>/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url().$themes;?>/css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="#">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <img src="<?=$app_settings['logo'];?>" alt="Logo"/>
                            </div>
                            <div class="col-md-12 text-center">
                                <?=$app_settings['name'];?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <?php if ($this->session->flashdata('success')) { ?>
					    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
					<?php } ?>
					<?php if ($this->session->flashdata('error')) { ?>
					    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
					<?php } ?>
				</div>
                <p class="login-box-msg">Please log in first</p>
                    <form action="<?=site_url($cfgRoute.'/login/dologin')?>" method="post" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <!-- <input type="checkbox" id="remember">
                                <label for="remember">Ingat Saya</label> -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <script src="<?=base_url().$themes;?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url().$themes;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url().$themes;?>/js/adminlte.min.js"></script>
</body>
</html>
