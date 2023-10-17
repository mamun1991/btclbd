<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a href="<?=base_url();?>" class="navbar-brand"><img class="img-fulid" src="<?=$app_settings['logo'];?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lnr lnr-menu"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="main-navbar">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#hero-area">Home</a>
            </li>
            <?php if($app_settings['feat_services'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">Services</a>
                </li>
            <?php }?>
            
            <?php if($app_settings['feat_portofolio'] == 1){?>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#portfolios">Works</a>
            </li>
            <?php }?>

            <?php if($app_settings['feat_pricing'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#pricing">Pricing</a>
                </li>
            <?php }?>

            <?php if($app_settings['feat_member'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#team">Team</a>
                </li>
            <?php }?>

            <?php if($app_settings['feat_blog'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#blogs">Blogs</a>
                </li>
            <?php }?>

            <?php if($app_settings['feat_testimony'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#testimonial">Testimonial</a>
                </li>
            <?php }?>
            
            <?php if($app_settings['feat_contact'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                </li>
            <?php }?>
        </ul>
    </div>
</div>

<!-- Mobile Menu Start -->
<ul class="mobile-menu">
    <li>
        <a class="page-scroll" href="#hero-area">Home</a>
    </li>
    <?php if($app_settings['feat_services'] == 1){?>
        <li>
            <a class="page-scroll" href="#services">Services</a>
        </li>
    <?php }?>

    <?php if($app_settings['feat_portofolio'] == 1){?>
        <li>
            <a class="page-scroll" href="#portfolios">Works</a>
        </li>
    <?php }?>

    <?php if($app_settings['feat_pricing'] == 1){?>
        <li>
            <a class="page-scroll" href="#pricing">Pricing</a>
        </li>
    <?php }?>

    <?php if($app_settings['feat_member'] == 1){?>
        <li>
            <a class="page-scroll" href="#team">Team</a>
        </li>
    <?php }?>

    <?php if($app_settings['feat_blog'] == 1){?>
        <li>
            <a class="page-scroll" href="#blog">Blog</a>
        </li>
    <?php }?>

    <?php if($app_settings['feat_testimony'] == 1){?>
        <li>
            <a class="page-scroll" href="#testimonial">Testimonial</a>
        </li>
    <?php }?>
    
    <?php if($app_settings['feat_contact'] == 1){?>
        <li>
            <a class="page-scroll" href="#contact">Contact</a>
        </li>
    <?php }?>
</ul>