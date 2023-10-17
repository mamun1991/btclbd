<?php 
    $column = 3;
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $dirUploadLink = substr($dirUpload, 2);
    //echo '<pre>'.print_r($this->general->getRateStyle(5),1).'</pre>';
?>

<!-- testimonial Section Start -->
<div id="testimonial" class="section" data-stellar-background-ratio="0.1">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="touch-slider owl-carousel owl-theme">
                    <?php foreach($listTestimony as $row){?>
                    <?php 
                        $image = $this->config->item('no_image');
                        if($row->testimony_image != '' && file_exists($dirUpload.$row->testimony_image)){
                            $image = $row->testimony_image;
                        }
                    ?>
                    <div class="testimonial-item">
                        <div class="star-icon mb-3">
                            <?php $classStar = array('star-filled' => 'fa fa-star', 'star-half' => 'fa fa-star-half-alt')?>
                            <?=$this->general->getRateStyle($row->testimony_ratevalue, $classStar);?>
                        </div>
                        <img src="<?=base_url().$dirUploadLink.$image;?>" alt="<?=$row->testimony_title?>" />
                        <div class="testimonial-text">
                            <p><?=$row->testimony_desc;?></p>
                            <h3><?=$row->testimony_title?></h3>
                            
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>        
    </div>
</div>
<!-- testimonial Section Start -->