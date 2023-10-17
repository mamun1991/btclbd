<?php 
    $optionRoles = $this->config->item('roles');
    $pkField = 'uid';
    $dataId = (isset($viewData->user_id)) ? $viewData->user_id : '';
    $dataFullname = (isset($viewData->user_fullname)) ? $viewData->user_fullname : '';
    $dataEmail = (isset($viewData->user_email)) ? $viewData->user_email : '';
    $dataUsername = (isset($viewData->username)) ? $viewData->username : '';
    $dataGroup = (isset($viewData->user_group)) ? $viewData->user_group : '';
    unset($optionRoles['-1']);
    $defaultOptionAccess = $dataGroup;
?>
<form action="<?=site_url($action);?>" method="post" enctype="multipart/form-data">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?=$pageTitle;?></h3>
        </div>
        <div class="card-body">
            <input type="hidden" name="<?=$pkField;?>" value="<?=$dataId;?>" />
            <div class="col-md-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            
            <div class="col-md-6 float-left">

                <div class="form-group mb-2">
                    <label class="mb-0">Select File CSV/XLSX</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file"  name="csv_file">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
        </div>
    </div>
</form>