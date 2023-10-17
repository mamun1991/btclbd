
<div class="accordion" id="accordMas">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseMas" aria-expanded="true" aria-controls="collapseMas">
                    MAS
                </button>
            </h3>
        </div>

        <div id="collapseMas" class="collapse" aria-labelledby="headingOne" data-parent="#accordMas">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Exam</label>
                        <input type="text" name="mas_exam" value="<?=$mas_exam;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Subject</label>
                        <input type="text" name="mas_subject" value="<?=$mas_subject;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Institute</label>
                        <input type="text" name="mas_institute" value="<?=$mas_institute;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Year</label>
                        <input type="text" name="mas_year" value="<?=$mas_year;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-4 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type</label>
                        <input type="text" name="mas_result_type" value="<?=$mas_result_type;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-4 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result EQ</label>
                        <input type="text" name="mas_result_eq" value="<?=$mas_result_eq;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-4 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Duration</label>
                        <input type="text" name="mas_duration" value="<?=$mas_duration;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result Type Text</label>
                        <textarea name="mas_result_type_text" class="form-control" readonly><?=$mas_result_type_text;?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Result</label>
                        <textarea name="mas_result" class="form-control" readonly><?=$mas_result;?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>