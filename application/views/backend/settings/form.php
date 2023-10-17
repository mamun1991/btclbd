<?php 
    $configApp = $this->config->item('app');
    $cfgDirView = $configApp['backend']['dir_view'];
    $cfgRoute = $configApp['backend']['base_route'];
    $themes = $configApp['backend']['dir_theme'];
?>
<form action="<?=site_url($action);?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?=$pageTitle;?></h3>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>

            
            <div class="col-md-12">
                <?php $this->load->view($cfgDirView.'settings/panel-info');?>
            </div>

            
            <div class="clearfix"></div>

           
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>