
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
                        <input type="text" name="jsc_exam" value="<?=$jsc_exam;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Roll</label>
                        <input type="text" name="jsc_roll" value="<?=$jsc_roll;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Board</label>
                        <textarea name="jsc_board" class="form-control" readonly><?=$jsc_board?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Year</label>
                        <input type="text" name="jsc_year" value="<?=$jsc_year;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type</label>
                        <input type="text" name="jsc_result_type" value="<?=$jsc_result_type;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Institute</label>
                        <input type="text" name="jsc_institute" value="<?=$jsc_institute;?>" class="form-control" readonly/>
                    </div>
                </div>
                
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type Text</label>
                        <textarea name="jsc_result_type_text" class="form-control" readonly><?=$jsc_result_type_text;?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result</label>
                        <textarea name="jsc_result" class="form-control" readonly><?=$jsc_result;?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>