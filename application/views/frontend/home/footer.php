<?php 
    $linkFB = "#";
    $linkIG = "#";
    $linkTWT = "#";
    $linkLKN = "#";
    if($app_settings['link_fb'] != ''){
        $linkFB = $app_settings['link_fb'];
    }
    if($app_settings['link_ig'] != ''){
        $linkIG = $app_settings['link_ig'];
    }
    if($app_settings['link_twitter'] != ''){
        $linkTWT = $app_settings['link_twitter'];
    }
    if($app_settings['link_linkedin'] != ''){
        $linkLKN = $app_settings['link_linkedin'];
    }
    $bgColorFooter = ' style="background:#fff!important;" ';
    if($app_settings['colorbg_footer'] != ''){
        $bgColorFooter = ' style="background:'.$app_settings['colorbg_footer'].'!important;" ';
    }
?>

<!-- Footer Section Start -->
<footer id="footer" class="footer-area section-padding" <?=$bgColorFooter?> >
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="widget">
                        <div class="textwidget d-flex align-items-center">
                            <img src="<?=$app_settings['logo'];?>" alt="" class="footer-logo-img mr-2">
                            <p><?=$app_settings['desc'];?></p>
                        </div>
                        <div class="social-icon">
                            <a class="facebook" href="<?=$linkFB;?>"><i class="lni-facebook-filled"></i></a>
                            <a class="twitter" href="<?=$linkTWT;?>"><i class="lni-twitter-filled"></i></a>
                            <a class="instagram" href="<?=$linkIG;?>"><i class="lni-instagram-filled"></i></a>
                            <a class="linkedin" href="<?=$linkLKN;?>"><i class="lni-linkedin-filled"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="footer-titel py-2">Contact</h3>
                    <ul class="address">
                        <?php if($app_settings['address'] != ''){?>
                        <li class="mb-1">
                            <a href="#" class="d-flex">
                                <i class="lni-map-marker mr-2"></i>
                                <?=$app_settings['address'];?>
                            </a>
                        </li>
                        <?php }?>
                        <li class="mb-1">
                            <a href="#" class="d-flex">
                                <i class="lni-phone-handset mr-2"></i>
                                <?=$app_settings['phone_number'];?>
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="#" class="d-flex">
                                <i class="lni-envelope mr-2"></i>
                                <?=$app_settings['email'];?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>  
    </div> 
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="copyright-content">
                        <p>Copyright © <?=date('Y');?> <a rel="nofollow" href="<?=base_url()?>"><?=$app_settings['name'];?></a> All Right Reserved</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>   
</footer> 
<!-- Footer Section End -->