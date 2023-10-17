
<div class="accordion" id="accordSsc">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseSsc" aria-expanded="true" aria-controls="collapseSsc">
                    SSC
                </button>
            </h3>
        </div>

        <div id="collapseSsc" class="collapse" aria-labelledby="headingOne" data-parent="#accordSsc">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Exam</label>
                        <input type="text" name="ssc_exam" value="<?=(isset($ssc_exam)) ? $ssc_exam : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Roll</label>
                        <input type="number" name="ssc_roll" value="<?=(isset($ssc_roll)) ? $ssc_roll : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Board</label>
                        <textarea name="ssc_board" class="form-control" ><?=(isset($ssc_board)) ? $ssc_board : ''?></textarea>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Group</label>
                        <input type="text" name="ssc_group" value="<?=(isset($ssc_group)) ? $ssc_group : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Year</label>
                        <input type="number" name="ssc_year" value="<?=(isset($ssc_year)) ? $ssc_year : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type</label>
                        <input type="number" name="ssc_result_type" value="<?=(isset($ssc_result_type)) ? $ssc_result_type : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result EQ</label>
                        <input type="number" name="ssc_result_eq" value="<?=(isset($ssc_result_eq)) ? $ssc_result_eq : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Verified</label>
                        <input type="number" name="ssc_verified" value="<?=(isset($ssc_verified)) ? $ssc_verified : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type Text</label>
                        <textarea name="ssc_result_type_text" class="form-control" ><?=(isset($ssc_result_type_text)) ? $ssc_result_type_text : '';?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result</label>
                        <textarea name="ssc_result" class="form-control" ><?=(isset($ssc_result)) ? $ssc_result : '';?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>