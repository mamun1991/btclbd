<?php 
    $column = 3;
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $dirUploadLink = substr($dirUpload, 2);
    //echo '<pre>'.print_r($listServices,1).'</pre>';
?>
<!-- Services Section Start -->
<section id="services" class="section">
    <div class="container">
        <div class="section-header">          
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Our Services</h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
        </div>
        <div class="row">
            <?php foreach($listServices as $row){?>
            <?php 
                $icon = "&nbsp;";
                if($row->services_icon != ''){
                    $icon = '<img src="'.base_url().$dirUploadLink.$row->services_icon.'" />';    
                }
            ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
                    <div class="icon">
                        <?=$icon;?>
                    </div>
                    <h4><?=$row->services_title;?></h4>
                    <p><?=$row->services_desc?></p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<!-- Services Section End -->