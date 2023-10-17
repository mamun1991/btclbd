<?php 
    
    $pkField = 'entity_id';
    $dataId = (isset($viewEntity->entity_id)) ? $viewEntity->entity_id : '';
    $viewEntity = (isset($viewEntity)) ? $viewEntity : '';
    $viewPresent = (isset($viewPresent)) ? $viewPresent : '';
    $viewPermanent = (isset($viewPermanent)) ? $viewPermanent : '';
    $viewGRA = (isset($viewGRA)) ? $viewGRA : '';
    $viewMAS = (isset($viewMAS)) ? $viewMAS : '';
    $viewJSC = (isset($viewJSC)) ? $viewJSC : '';
    $viewSSC = (isset($viewSSC)) ? $viewSSC : '';
    $viewHSC = (isset($viewHSC)) ? $viewHSC : '';
    $viewEmployment = (isset($viewEmployment)) ? $viewEmployment : '';
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

            
            
            <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('backend/entity/form-base', $viewEntity);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-present', $viewPresent);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-permanent', $viewPermanent);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-gra', $viewGRA);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-mas', $viewMAS);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 float-left">
                    <?php $this->load->view('backend/entity/form-ssc', $viewSSC);?>
                </div>
                <div class="col-md-4 float-left">
                    <?php $this->load->view('backend/entity/form-hsc', $viewHSC);?>
                </div>
                <div class="col-md-4 float-left">
                    <?php $this->load->view('backend/entity/form-jsc', $viewJSC);?>
                </div>
            </div>

            

            <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('backend/entity/form-employment', $viewEmployment);?>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="<?=site_url($back);?>" class="btn bg-orange"><i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>