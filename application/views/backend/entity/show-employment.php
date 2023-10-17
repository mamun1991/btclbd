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
                    <?php $this->load->view('backend/entity/show-employment1', $viewEmployment['viewEmployment1']);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-employment2', $viewEmployment['viewEmployment2']);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-employment3', $viewEmployment['viewEmployment3']);?>
                </div>
                <div class="col-md-6 float-left">
                    <?php $this->load->view('backend/entity/show-employment4', $viewEmployment['viewEmployment4']);?>
                </div>
                

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>