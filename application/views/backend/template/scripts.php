<?php 
    $configApp = $this->config->item('app');
    $cfgDirView = $configApp['backend']['dir_view'];
    $cfgRoute = $configApp['backend']['base_route'];
    $themes = $configApp['backend']['dir_theme'];
?>
<!-- jQuery -->
<script src="<?=base_url().$themes;?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url().$themes;?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url().$themes;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url().$themes;?>/plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url().$themes;?>/plugins/moment/moment.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url().$themes;?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url().$themes;?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url().$themes;?>/js/adminlte.js"></script>
<script src="<?=base_url().$themes;?>/js/custom.js"></script>
<script type="text/javascript">

var showPreview = function(input, img) {
  if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
      var reader = new FileReader();
      reader.onload = function(event) {
        $(img).attr('src', event.target.result);
      }
      reader.readAsDataURL(input.files[i]);
    }
  }
};

$(document).ready(function(){

  //bsCustomFileInput.init();
  $('.select2').select2();
  $('.custom-file-input').on('change', function(ev){
      var input = this;
      var url = input.value;
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      var fileName = ev.target.files[0].name;
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('.file-preview').attr('src', e.target.result);
          }
          $('.custom-file-label').html(fileName);
          reader.readAsDataURL(input.files[0]);
      }else{
          $('.file-preview').attr('src', '<?=base_url().$themes;?>/img/no-image.jpg');
      }
  });
  });
</script>