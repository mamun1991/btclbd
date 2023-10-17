<?php 
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $configTheme = $this->config->item($themeName);
    $theme = $configTheme['dir_theme'].'/';

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
    $bgColorFooter = '';
    if($app_settings['colorbg_footer'] != ''){
        $bgColorFooter = ' style="background:'.$app_settings['colorbg_footer'].'!important;" ';
    }

    $textColorFooter = '';
    if($app_settings['colorbg_footer'] != ''){
        $textColorFooter = ' style="color:'.$app_settings['colortext_footer'].'!important;" ';
    }
?>
<!-- Contact Section Start -->
<section id="contact" class="section" data-stellar-background-ratio="-0.2" <?=$bgColorFooter;?> >      
    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger"> <?php echo '<pre>'.print_r($this->session->flashdata('error'), 1).'</pre>';//$this->session->flashdata('error') ?> </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">     
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="contact-us">
                        <h3 class="mb-3" <?=$textColorFooter?> >Contact With us</h3>
                        <div class="contact-address">
                            <a href="<?=(($app_settings['link_wa'] != '') ? $app_settings['link_wa'] : "#");?>" class="wa-link mb-4" <?=$textColorFooter?> >
                                <img src="<?=base_url().$theme.'img/btn-whatsapp-small.png'?>" />
                            </a>
                            <?php if($app_settings['address'] != ''){?>
                                <p <?=$textColorFooter?> ><?=$app_settings['address'];?></p>
                            <?php }?>
                            
                            <p class="phone" <?=$textColorFooter?> >Phone: <span <?=$textColorFooter?> ><?=$app_settings['phone_number'];?></span></p>
                            <p class="email" <?=$textColorFooter?> >E-mail: <span <?=$textColorFooter?> ><?=$app_settings['email'];?></span></p>
                        </div>
                        <div class="social-icons">
                            <ul>
                                <li class="facebook"><a href="<?=$linkFB;?>"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="<?=$linkTWT;?>"><i class="fa fa-twitter"></i></a></li>
                                <li class="linkedin"><a href="<?=$linkLKN;?>"><i class="fa fa-linkedin"></i></a></li>
                                <li class="instagram"><a href="<?=$linkIG;?>"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>     
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="contact-block">
                        <form id="contactForm" action="<?=$actionContact;?>" method="POST">
                            <input type="hidden" name="thmNm" value="mate" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>                                         
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject" id="subject" class="form-control" name="subject" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"> 
                                        <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                        <div class="clearfix"></div> 
                                    </div>
                                </div>
                            </div>            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>           
</section>
<!-- Contact Section End -->