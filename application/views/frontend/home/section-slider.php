<!-- About Section start -->
<section id="slider" class="section-padding mt-5 bg-gray">
    <div class="container">
        <div class="row">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2000">
                <div class="carousel-inner">
                <?php 
                    $i = 0;
                    foreach($listSlider as $slider){
                        $active = '';
                        if($i == 0) $active = 'active';
                ?>
                    <div class="carousel-item <?=$active;?>">
                        <img class="d-block w-100" src="<?=base_url();?>upload/<?=$slider->slider_image?>" alt="<?=$slider->slider_title;?>">
                    </div>

                <?php $i++;}?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
