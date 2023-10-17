<?php 
    $configTheme = $this->config->item($themeName);
    $assets = $configTheme['dir_theme'].'/';
?>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="<?=base_url().$assets;?>js/jquery-min.js"></script>
<script src="<?=base_url().$assets;?>js/popper.min.js"></script>
<script src="<?=base_url().$assets;?>js/bootstrap.min.js"></script>
<script src="<?=base_url().$assets;?>js/jquery.mixitup.js"></script>
<script src="<?=base_url().$assets;?>js/nivo-lightbox.js"></script>
<script src="<?=base_url().$assets;?>js/owl.carousel.js"></script>    
<script src="<?=base_url().$assets;?>js/jquery.stellar.min.js"></script>    
<script src="<?=base_url().$assets;?>js/jquery.nav.js"></script>    
<script src="<?=base_url().$assets;?>js/scrolling-nav.js"></script>    
<script src="<?=base_url().$assets;?>js/jquery.easing.min.js"></script>    
<script src="<?=base_url().$assets;?>js/smoothscroll.js"></script>    
<script src="<?=base_url().$assets;?>js/jquery.slicknav.js"></script>     
<script src="<?=base_url().$assets;?>js/wow.js"></script>   
<script src="<?=base_url().$assets;?>js/jquery.vide.js"></script>
<script src="<?=base_url().$assets;?>js/jquery.counterup.min.js"></script>    
<script src="<?=base_url().$assets;?>js/jquery.magnific-popup.min.js"></script>    
<script src="<?=base_url().$assets;?>js/waypoints.min.js"></script>    
<script src="<?=base_url().$assets;?>js/form-validator.min.js"></script>
<script src="<?=base_url().$assets;?>js/contact-form-script.js"></script>   
<script src="<?=base_url().$assets;?>js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function showNews(isError, data){
            console.log("stat", isError);
            $('#newsModal').modal('show');
            $(document).on("shown.bs.modal", "#newsModal", function () {
                $(this).off("shown.bs.modal");
                if(isError){
                    $('.modal-body .news-header').html(data.msg);
                    $('.modal-body .news-content').html('');
                    $('.modal-body .news-image').attr('src', '');
                }
                else{
                    $('.modal-body .news-header').html(data.blog_title);
                    $('.modal-body .news-content').html(data.blog_desc);
                    $('.modal-body .news-image').attr('src', data.image);
                }
            });
            $(document).on("hidden.bs.modal", "#newsModal", function () {
                $('.modal-body .news-header').html('');
                $('.modal-body .news-content').html('');
            });

        }
        $('.continue-reading').on('click', function(ev){
            ev.preventDefault();
            var _id = $(this).attr('data-app');
            //$('#newsModal').modal('show');
            $.ajax({
                url: '<?=site_url('ajax/get_news')?>',
                data: {id: _id},
                type: 'POST',
                success: function(res){
                    console.log("res", res);
                    if(res.status){
                        showNews(false, res.data);
                    }
                    else{
                        showNews(true, res.data);
                    }
                },
                error: function(err){
                    console.log("ERROR", err);
                }
            });
        });
    });
</script>