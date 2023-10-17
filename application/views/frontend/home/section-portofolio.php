<?php 
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $configTheme = $this->config->item($themeName);
    $theme = $configTheme['dir_theme'].'/';
    $dirUploadLink = substr($dirUpload, 2);
?>
<!-- Portfolio Section -->
<section id="portfolios" class="section">
    <!-- Container Starts -->
    <div class="container">
        <div class="section-header">          
            <h2 class="section-title">Our Portfolio</h2>
            <hr class="lines">
        </div>

        <!-- Portfolio Recent Projects -->
        <div id="portfolio" class="row">
            <?php 
                foreach($listPortofolio as $row){
                    $img = "&nbsp;";
                    $imgFile = "";
                    if($row->portofolio_image != ''){
                        $img = '<img src="'.base_url().$dirUploadLink.$row->portofolio_image.'" />';    
                        $imgFile = base_url().$dirUploadLink.$row->portofolio_image;
                    }
            ?>

            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 development print">
                <div class="portfolio-item">
                    <div class="shot-item">
                        <?=$img;?>
                        <a class="overlay lightbox" href="<?=$imgFile;?>">
                            <i class="lnr lnr-eye item-icon"></i>
                        </a>
                    </div>               
                </div>
            </div>
            <?php }?>
            
        </div>
    </div>
    <!-- Container Ends -->
</section>
<!-- Portfolio Section Ends --> 