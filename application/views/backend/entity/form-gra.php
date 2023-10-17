
<div class="accordion" id="accordGra">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseGra" aria-expanded="true" aria-controls="collapseGra">
                    GRA
                </button>
            </h3>
        </div>

        <div id="collapseGra" class="collapse" aria-labelledby="headingOne" data-parent="#accordGra">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Exam</label>
                        <input type="text" name="gra_exam" value="<?=(isset($gra_exam)) ? $gra_exam : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Subject</label>
                        <input type="text" name="gra_subject" value="<?=(isset($gra_subject)) ? $gra_subject : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Institute</label>
                        <input type="text" name="gra_institute" value="<?=(isset($gra_institute)) ? $gra_institute : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Year</label>
                        <input type="number" name="gra_year" value="<?=(isset($gra_year)) ? $gra_year : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type</label>
                        <input type="number" name="gra_result_type" value="<?=(isset($gra_result_type)) ? $gra_result_type : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result EQ</label>
                        <input type="number" name="gra_result_eq" value="<?=(isset($gra_result_eq)) ? $gra_result_eq : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Duration</label>
                        <input type="number" name="gra_duration" value="<?=(isset($gra_duration)) ? $gra_duration : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type Text</label>
                        <textarea name="gra_result_type_text" class="form-control" ><?=(isset($gra_result_type_text)) ? $gra_result_type_text : '';?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result</label>
                        <textarea name="gra_result" class="form-control" ><?=(isset($gra_result)) ? $gra_result : '';?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>