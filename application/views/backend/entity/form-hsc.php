
<div class="accordion" id="accordHsc">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseHsc" aria-expanded="true" aria-controls="collapseHsc">
                    HSC
                </button>
            </h3>
        </div>

        <div id="collapseHsc" class="collapse" aria-labelledby="headingOne" data-parent="#accordHsc">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Exam</label>
                        <input type="text" name="hsc_exam" value="<?=(isset($gra_exam)) ? $gra_exam : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Roll</label>
                        <input type="number" name="hsc_roll" value="<?=(isset($hsc_roll)) ? $hsc_roll : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Board</label>
                        <textarea name="hsc_board" class="form-control" ><?=(isset($hsc_board)) ? $hsc_board : ''?></textarea>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Group</label>
                        <input type="text" name="hsc_group" value="<?=(isset($hsc_group)) ? $hsc_group : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Year</label>
                        <input type="number" name="hsc_year" value="<?=(isset($hsc_year)) ? $hsc_year : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type</label>
                        <input type="number" name="hsc_result_type" value="<?=(isset($hsc_result_type)) ? $hsc_result_type : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result EQ</label>
                        <input type="number" name="hsc_result_eq" value="<?=(isset($hsc_result_eq)) ? $hsc_result_eq : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Verified</label>
                        <input type="number" name="hsc_verified" value="<?=(isset($hsc_verified)) ? $hsc_verified : '';?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type Text</label>
                        <textarea name="hsc_result_type_text" class="form-control" ><?=(isset($hsc_result_type_text)) ? $hsc_result_type_text : '';?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result</label>
                        <textarea name="hsc_result" class="form-control" ><?=(isset($hsc_result)) ? $hsc_result : '';?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>