<?php 
    $configApp = $this->config->item('app');
    $cfgDirView = $configApp['backend']['dir_view'];
    $cfgRoute = $configApp['backend']['base_route'];
    $themes = $configApp['backend']['dir_theme'];
?>
<link rel="icon" href="<?=$app_settings['logo'];?>" type="image/png" sizes="16x16">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/css/adminlte.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?=base_url().$themes;?>/css/custom.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">