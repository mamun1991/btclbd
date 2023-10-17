<?php 
    $column = 3;
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $dirUploadLink = substr($dirUpload, 2);
    //echo '<pre>'.print_r($listServices,1).'</pre>';
?>
<!-- Team section Start -->
<section id="team" class="section">
    <div class="container">
        <div class="section-header">          
            <h2 class="section-title">Our Team</h2>
            <hr class="lines">
        </div>
        <div class="row">
            <?php foreach($listTeam as $row){?>
            <?php 
                $image = $this->config->item('no_image');
                if($row->member_image != '' && file_exists($dirUpload.$row->member_image)){
                    $image = $row->member_image;
                }
                $linkFB = ($row->member_fb != '') ? $row->member_fb : "#";
                $linkTWT = ($row->member_twitter != '') ? $row->member_twitter : "#";
                $linkIG = ($row->member_ig != '') ? $row->member_ig : "#";
            ?>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="single-team">
                    <img src="<?=base_url().$dirUploadLink.$image;?>" alt="">
                    <div class="team-details">
                        <div class="team-inner">
                            <h4 class="team-title"><?=$row->member_name;?></h4>
                            <p><?=$row->member_position;?></p>
                            <ul class="social-list">
                                <li class="facebook"><a href<?=$linkFB;?>i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="<?=$linkTWT;?>"><i class="fa fa-twitter"></i></a></li>
                                <li class="instagram"><a href="<?=$linkIG;?>"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<!-- Team section End -->