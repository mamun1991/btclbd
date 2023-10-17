
<div class="accordion" id="accordJsc">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseJsc" aria-expanded="true" aria-controls="collapseJsc">
                    JSC
                </button>
            </h3>
        </div>

        <div id="collapseJsc" class="collapse" aria-labelledby="headingOne" data-parent="#accordJsc">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Exam</label>
                        <input type="text" name="jsc_exam" value="<?=(isset($jsc_exam)) ? $jsc_exam : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Roll</label>
                        <input type="number" name="jsc_roll" value="<?=(isset($jsc_roll)) ? $jsc_roll : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Board</label>
                        <textarea name="jsc_board" class="form-control" ><?=(isset($jsc_board)) ? $jsc_board : ''?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Year</label>
                        <input type="number" name="jsc_year" value="<?=(isset($jsc_year)) ? $jsc_year : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type</label>
                        <input type="number" name="jsc_result_type" value="<?=(isset($jsc_result_type)) ? $jsc_result_type : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Institute</label>
                        <input type="text" name="jsc_institute" value="<?=(isset($jsc_institute)) ? $jsc_institute : '';?>" class="form-control" />
                    </div>
                </div>
                
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type Text</label>
                        <textarea name="jsc_result_type_text" class="form-control" ><?=(isset($jsc_result_type_text)) ? $jsc_result_type_text : '';?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result</label>
                        <textarea name="jsc_result" class="form-control" ><?=(isset($jsc_result)) ? $jsc_result : '';?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>