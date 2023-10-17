<?php 
    $column = 3;
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $dirUploadLink = substr($dirUpload, 2);
    //echo '<pre>'.print_r($listServices,1).'</pre>';
?>
<!-- Start Pricing Table Section -->
<div id="pricing" class="section pricing-section">
    <div class="container">
        <div class="section-header">          
            <h2 class="section-title">Pricing Table</h2>
            <hr class="lines">
        </div>

        <div class="row pricing-tables">
            
            <?php foreach($listPricing as $row){?>
            <?php 
                $buyLink = ($row->buy_link != '') ? $row->buy_link : "#";
            ?>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-table">
                    <div class="pricing-details">
                        <h2><?=$row->pricing_name;?></h2>
                        <span><?=$row->pricing_price;?></span>
                        <ul>
                            <?=$row->pricing_desc;?>
                        </ul>
                    </div>
                    <div class="plan-button">
                        <a href="<?=$buyLink;?>" class="btn btn-common">Buy Now</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- End Pricing Table Section -->