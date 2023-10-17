<?php 
    $configTheme = $this->config->item($themeName);
    $assets = $configTheme['dir_theme'].'/';
?>
<!-- Bootstrap CSS -->
<link rel="icon" href="<?=$app_settings['logo'];?>" type="image/png" sizes="16x16">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/line-icons.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/owl.carousel.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/owl.theme.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/nivo-lightbox.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/magnific-popup.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/slicknav.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/animate.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/main.css">    
<link rel="stylesheet" href="<?=base_url().$assets;?>css/responsive.css">
<link rel="stylesheet" href="<?=base_url().$assets;?>css/style.css">
