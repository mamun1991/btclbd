<?php 
    $cfgRoute = $this->config->item('route_backend');
    $featBlog = $app_settings['feat_blog'];
    $featContact = $app_settings['feat_contact'];
    $featServices = $app_settings['feat_services'];
    $featSlider = $app_settings['feat_slider'];
    $featMember = $app_settings['feat_member'];
    $featTestimony = $app_settings['feat_testimony'];
    $featPortofolio = $app_settings['feat_portofolio'];
?>

<?php if($featBlog == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'blog')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Blog</p>
        </a>
    </li>
<?php }?>

<?php if($featContact == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'contact')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Contact</p>
        </a>
    </li>
<?php }?>

<?php if($featServices == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'services')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Services</p>
        </a>
    </li>
<?php }?>

<?php if($featSlider == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'slider')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Image Slider</p>
        </a>
    </li>
<?php }?>

<?php if($featMember == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'team')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Team</p>
        </a>
    </li>
<?php }?>

<?php if($featTestimony == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'testimony')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Testimony</p>
        </a>
    </li>
<?php }?>

<?php if($featPortofolio == 1){?>
    <li class="nav-item">
        <a href="<?=site_url($cfgRoute.'portofolio')?>" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Portofolio</p>
        </a>
    </li>
<?php }?>
