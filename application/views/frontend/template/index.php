<?php 
    $configTheme = $this->config->item($themeName);
    $cfgDirView = $configTheme['dir_view'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$pageTitle;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="<?=$app_settings['desc'];?>" itemprop="headline" />
        <meta name="keywords" content="<?=$app_settings['meta_tag'];?>" itemprop="keywords" />
        <meta name="thumbnailUrl" content="<?=$app_settings['logo'];?>" itemprop="thumbnailUrl" />
        <meta property="og:type" content="article" />
    	<meta property="og:site_name" content="<?=$app_settings['name'];?>" />
    	<meta property="og:title" content="<?=$pageTitle?>" />
    	<meta property="og:image" content="<?=$app_settings['logo'];?>" />
    	<meta property="og:description" content="<?=$app_settings['desc'];?>" />
    	<meta property="og:url" content="<?=base_url();?>" />
        <?php $this->load->view($cfgDirView.'/template/css');?>
    </head>
    <body>
        <?php $this->load->view($view);?>

        <!-- Go To Top Link -->
        <a href="#" class="back-to-top">
            <i class="lnr lnr-arrow-up"></i>
        </a>
        
        <div id="loader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>     
        <?php $this->load->view($cfgDirView.'/template/scripts');?>
    </body>
</html>
