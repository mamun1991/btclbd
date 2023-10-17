<?php 
    
    
?>
<form action="<?=site_url($action);?>" method="post" enctype="multipart/form-data">
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

            
            
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Start Roll Number</label>
                        <input type="number" name="start_roll_number" class="form-control" required/>
                    </div>
                </div>
                <div class="col-md-3 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">End Roll Number</label>
                        <input type="number" name="end_roll_number" class="form-control" required/>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            
            <div class="row" style="margin-top:30px;">
                <div class="col-3 float-left">
                    <div class="col-md-12 float-left">
                        <div class="checkbox">
                            <label>Written Exam Date</label>
                            <input type="date" name="written_exam_date" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-3 float-left">
                    <div class="col-md-12 float-left">
                        <div class="checkbox">
                            <label>Written Exam Time</label>
                            <input type="time" name="written_exam_time" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-3 float-left">
                    <div class="col-md-12 float-left">
                        <div class="checkbox">
                            <label>Written Exam Place</label>
                            <input type="text" name="written_exam_place" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3 float-left">
                    <div class="col-md-12 float-left">
                        <div class="checkbox">
                            <label>Written Exam Date</label>
                            <input type="date" name="physical_exam_date" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-3 float-left">
                    <div class="col-md-12 float-left">
                        <div class="checkbox">
                            <label>Written Exam Time</label>
                            <input type="time" name="physical_exam_time" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-3 float-left">
                    <div class="col-md-12 float-left">
                        <div class="checkbox">
                            <label>Written Exam Place</label>
                            <input type="text" name="physical_exam_place" class="form-control" />
                        </div>
                    </div>
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