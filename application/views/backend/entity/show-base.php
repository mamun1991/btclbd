<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Data General</h3>
    </div>
    <div class="card-body">


        <div class="clearfix"></div>

        <div class="row mb-4">
            <div class="col-md-8 float-left">
                <div class="col-md-3 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Photo</label>
                        <img src="<?=$entityPhoto?>" class="img-fluid" style="width:100%;"/>
                    </div>
                </div>
                <div class="col-md-3 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Signature</label>
                        <img src="<?=$entitySignature?>" class="img-fluid" style="width:100%;"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Roll Number</label>
                <input type="text" name="roll_number" value="<?=$roll_number;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Full Name</label>
                <input type="text" name="fullname" value="<?=$fullname;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Name BN</label>
                <input type="text" name="name_bn" value="<?=$name_bn;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Father</label>
                <input type="text" name="father" value="<?=$father;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Father BN</label>
                <input type="text" name="father_bn" value="<?=$father_bn;?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Mother</label>
                <input type="text" name="mother" value="<?=$mother;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Mother BN</label>
                <input type="text" name="mother_bn" value="<?=$mother_bn;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">DOB</label>
                <input type="text" name="dob" value="<?=date('d F Y', strtotime($dob));?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Age As</label>
                <input type="text" name="age_as" value="<?=$age_as;?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Age Calculate Date</label>
                <input type="text" name="age_calculate_date" value="<?=date('d F Y', strtotime($age_calculate_date));?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Gender</label>
                <input type="text" name="gender" value="<?=$gender;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">NID</label>
                <input type="text" name="nid" value="<?=$nid;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">NID No</label>
                <input type="text" name="nid_id" value="<?=$nid_id;?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Breg</label>
                <input type="text" name="breg" value="<?=$breg;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Breg No</label>
                <input type="text" name="breg_id" value="<?=$breg_id;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Passport</label>
                <input type="text" name="passport" value="<?=$passport;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Passport No</label>
                <input type="text" name="passport_id" value="<?=$passport_id;?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Marital Status</label>
                <input type="text" name="marital" value="<?=$marital;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Spouse Name</label>
                <input type="text" name="spouse_name" value="<?=$spouse_name;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Nationality</label>
                <input type="text" name="nationality" value="<?=$nationality;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Religion</label>
                <input type="text" name="religion" value="<?=$religion;?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Mobile</label>
                <input type="text" name="mobile_number" value="<?=$mobile_number;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Email</label>
                <input type="text" name="email" value="<?=$email;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Quota</label>
                <input type="text" name="quota" value="<?=$quota;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Dep Status</label>
                <input type="text" name="dep_status" value="<?=$dep_status;?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Home District</label>
                <input type="text" name="home_district" value="<?=$home_district;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Same as Present</label>
                <input type="text" name="same_as_present" value="<?=$same_as_present;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Total Job Exp</label>
                <input type="text" name="total_job_exp" value="<?=$total_job_exp;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp 1</label>
                <textarea name="oth_exp1"  class="form-control" readonly><?=$oth_exp1;?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Ans 1</label>
                <textarea name="oth_exp_ans1" class="form-control" readonly><?=$oth_exp_ans1;?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Text 1</label>
                <textarea name="oth_exp_text1" class="form-control" readonly><?=$oth_exp_text1;?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp 2</label>
                <textarea name="oth_exp2" class="form-control" readonly><?=$oth_exp2;?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Ans 2</label>
                <textarea name="oth_exp_ans2" class="form-control" readonly><?=$oth_exp_ans2;?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Text 2</label>
                <textarea name="oth_exp_text2" class="form-control" readonly><?=$oth_exp_text2;?></textarea>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">IP Address</label>
                <input type="text" name="ip_address" value="<?=$ip_address;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Fee Status</label>
                <input type="text" name="fee_status" value="<?=$fee_status;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Fee Payment Time</label>
                <input type="text" name="fee_payment_time" value="<?=date('d F Y H:i', strtotime($fee_payment_time));?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">            
            <div class="form-group mb-2">
                <label class="mb-0">Position</label>
                <input type="text" name="sector_id" value="<?=$sector->sector_name;?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Screening</label>
                <input type="text" name="screening" value="<?=$screening;?>" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Created Time</label>
                <input type="text" name="created_time" value="<?=date('d F Y H:i', strtotime($created_time));?>" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Expired Time</label>
                <input type="text" name="expire_time" value="<?=date('d F Y H:i', strtotime($expire_time));?>" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Remarks</label>
                <input type="text" name="remarks" value="<?=$remarks;?>" class="form-control" readonly/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <!--Tampilkan pagination-->
            </div>
        </div>

    </div>
    <!-- /.card-body -->
    
</div>