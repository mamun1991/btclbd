
<div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?=$pageTitle;?></h3>
        </div>
        <div class="card-body">
            <div class="form-group form-group-feedback form-group-feedback-left">
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
                    <?php $this->load->view('backend/entity/show-base', $viewEntity);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-present', $viewPresent);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-permanent', $viewPermanent);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-gra', $viewGRA);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-mas', $viewMAS);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 float-left">
                    <?php $this->load->view('backend/entity/show-ssc', $viewSSC);?>
                </div>
                <div class="col-md-4 float-left">
                    <?php $this->load->view('backend/entity/show-hsc', $viewHSC);?>
                </div>
                <div class="col-md-4 float-left">
                    <?php $this->load->view('backend/entity/show-jsc', $viewJSC);?>
                </div>
            </div>

            

            <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('backend/entity/show-employment', $viewEmployment);?>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col">
                    <!--Tampilkan pagination-->
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        
    </div>
