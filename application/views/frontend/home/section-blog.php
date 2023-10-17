<?php 
    $column = 3;
    $configApp = $this->config->item('app');
    $dirUpload = $configApp['dir_upload'];
    $dirUploadLink = substr($dirUpload, 2);
    function truncate_words($string, $words=20) {
        return preg_replace('/((\w+\W*){'.($words-1).'}(\w+))(.*)/', '${1}', $string);
    }
    //echo '<pre>'.print_r($this->general->getRateStyle(5),1).'</pre>';
?>

<!-- Testimonial Section Start -->
<section id="blogs" class="section">
    <div class="container">
        <div class="section-header">          
            <h2 class="section-title">Blogs</h2>
            <hr class="lines">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
         
                    <?php foreach($listBlogs as $row){?>
                    <?php 
                        $image = $this->config->item('no_image');
                        if($row->blog_image != '' && file_exists($dirUpload.$row->blog_image)){
                            $image = $row->blog_image;
                        }
                    ?>
                    <div class="col-sm-4 blogs-item">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="<?=base_url().$dirUploadLink.$image?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-12 py-3">
                                        <h6 class="mb-1 mt-1"><?=$row->blog_title?></h6>
                                        <p class="mb-1 date-published text-muted"><?=date('F Y', strtotime($row->date_add))?></p>
                                        <p class="card-text mb-auto"><?=truncate_words(strip_tags($row->blog_desc), 20);?> ...</p>
                                        <a href="#" class="continue-reading" data-app="<?=$row->blog_id;?>">Continue reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered news-dialog-content" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="news-header mb-0"></h5>
                <img class="news-image"/>
                <p class="news-content"></p>
            </div>  
        </div>
    </div>
</div>