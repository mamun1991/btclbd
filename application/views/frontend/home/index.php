<?php 
    $configTheme = $this->config->item($themeName);
    $cfgDirView = $configTheme['dir_view'].'/';
    $headerBGColor = '';
    $textColorMenu = '';
    $heroAreaBG = '';
    //echo '<pre>'.print_r($app_settings, 1).'</pre>';
    if($app_settings['intro_image'] != ''){
        $heroAreaBG = ' style="background:url('.$app_settings['intro_image'].') fixed no-repeat;background-size:cover;" ';
    }
    if($app_settings['colorbg_header'] != ''){
        $headerBGColor  = '<style>';
        $headerBGColor .= '.top-nav-collapse{';
        $headerBGColor .= 'background: '.$app_settings['colorbg_header'].'!important';
        $headerBGColor .= '}';
        $headerBGColor .= '</style>';
        echo $headerBGColor;
    }
    if($app_settings['colortext_header'] != ''){
        $headerBGColor  = '<style>';
        $headerBGColor .= '.top-nav-collapse .navbar-nav .nav-link{';
        $headerBGColor .= 'color: '.$app_settings['colortext_header'].'!important';
        $headerBGColor .= '}';
        $headerBGColor .= '</style>';
        echo $headerBGColor;
    }
?>

<!-- Header Section Start -->
<header id="hero-area" <?=$heroAreaBG;?>>    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo" >
        <?php $this->load->view($cfgDirView.'home/menu');?>

    </nav>
    <!-- Navbar End -->   
    <div class="container">      
    <div class="row justify-content-md-center">
        <div class="col-md-10">
        <div class="contents text-center">
            <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><?=$app_settings['intro_title'];?></h1>
            <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms"><?=$app_settings['intro_desc'];?></p>
            <?php if($app_settings['intro_link1_title'] != ''){?>
                <a href="<?=$app_settings['intro_link1_url'];?>" class="btn btn-common wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms"><?=$app_settings['intro_link1_title'];?></a>
            <?php }?>
            
        </div>
        </div>
    </div> 
    </div>           
</header>
<!-- Header Section End --> 

<?php if($app_settings['feat_services'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-services');?>
<?php }?>

<?php if($app_settings['feat_portofolio'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-portofolio');?>
<?php }?>


<?php if($app_settings['feat_pricing'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-pricing');?>
<?php }?>


<?php if($app_settings['feat_member'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-team');?>
<?php }?>

<?php if($app_settings['feat_blog'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-blog');?>
<?php }?>

<?php if($app_settings['feat_testimony'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-testimony');?>
<?php }?>

<?php if($app_settings['feat_contact'] == 1){?>
    <?php $this->load->view($cfgDirView.'home/section-contact');?>
<?php }?>

    
