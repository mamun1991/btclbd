<?php 
    $viewEmployment = (isset($viewEmployment)) ? $viewEmployment : array();
    $viewEmployment1 = (isset($viewEmployment['viewEmployment1'])) ? $viewEmployment['viewEmployment1'] : array();
    $viewEmployment2 = (isset($viewEmployment['viewEmployment2'])) ? $viewEmployment['viewEmployment2'] : array();
    $viewEmployment3 = (isset($viewEmployment['viewEmployment3'])) ? $viewEmployment['viewEmployment3'] : array();
    $viewEmployment4 = (isset($viewEmployment['viewEmployment4'])) ? $viewEmployment['viewEmployment4'] : array();
?>
<div class="accordion" id="accordEmployment">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseEmployment" aria-expanded="true" aria-controls="collapseEmployment">
                    Employment
                </button>
            </h3>
        </div>

        <div id="collapseEmployment" class="collapse" aria-labelledby="headingOne" data-parent="#accordEmployment">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-employment1', $viewEmployment1);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-employment2', $viewEmployment2);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-employment3', $viewEmployment3);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/form-employment4', $viewEmployment4);?>
                </div>
                

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>