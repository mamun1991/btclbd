<?php 

    
?>

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
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"  name="photo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Signature</label>
                        <img src="<?=$entitySignature?>" class="img-fluid" style="width:100%;"/>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"  name="signature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Roll Number</label>
                <input type="number" name="roll_number" value="<?=(isset($roll_number)) ? $roll_number : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Full Name</label>
                <input type="text" name="fullname" value="<?=(isset($fullname)) ? $fullname : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Name BN</label>
                <input type="text" name="name_bn" value="<?=(isset($name_bn)) ? $name_bn : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Father</label>
                <input type="text" name="father" value="<?=(isset($father)) ? $father : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Father BN</label>
                <input type="text" name="father_bn" value="<?=(isset($father_bn)) ? $father_bn : '';?>" class="form-control" />
            </div>
        </div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Mother</label>
                <input type="text" name="mother" value="<?=(isset($mother)) ? $mother : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Mother BN</label>
                <input type="text" name="mother_bn" value="<?=(isset($mother_bn)) ? $mother_bn : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">DOB</label>
                <input type="date" name="dob" value="<?=(isset($dob)) ? $dob : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Age As</label>
                <input type="text" name="age_as" value="<?=(isset($age_as)) ? $age_as : '';?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Age Calculate Date</label>
                <input type="date" name="age_calculate_date" value="<?=(isset($age_calculate_date)) ? $age_calculate_date : '';?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Gender</label>
                <select class="form-control" name="gender" >
                    <?php foreach($comboGender as $k => $v){?>
                        <?php 
                                $string = "";
                                if($k == $gender) $string = "SELECTED"; 
                        ?>
                        <option value="<?= $k ?>" <?= $string ?>><?= $v ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">NID</label>
                <input type="number" name="nid" value="<?=(isset($nid)) ? $nid : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">NID No</label>
                <input type="text" name="nid_id" value="<?=(isset($nid_id)) ? $nid_id : '';?>" class="form-control" />
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Breg</label>
                <input type="number" name="breg" value="<?=(isset($breg)) ? $breg : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Breg No</label>
                <input type="text" name="breg_id" value="<?=(isset($breg_id)) ? $breg_id : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Passport</label>
                <input type="number" name="passport" value="<?=(isset($passport)) ? $passport : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Passport No</label>
                <input type="text" name="passport_id" value="<?=(isset($passport_id)) ? $passport_id : '';?>" class="form-control" />
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Marital Status</label>
                <input type="text" name="marital" value="<?=(isset($marital)) ? $marital : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Spouse Name</label>
                <input type="text" name="spouse_name" value="<?=(isset($spouse_name)) ? $spouse_name : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Nationality</label>
                <input type="text" name="nationality" value="<?=(isset($nationality)) ? $nationality : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Religion</label>
                <input type="text" name="religion" value="<?=(isset($religion)) ? $religion : '';?>" class="form-control" />
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Mobile</label>
                <input type="text" name="mobile_number" value="<?=(isset($mobile_number)) ? $mobile_number : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Email</label>
                <input type="text" name="email" value="<?=(isset($email)) ? $email : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Quota</label>
                <input type="text" name="quota" value="<?=(isset($quota)) ? $quota : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Dep Status</label>
                <input type="text" name="dep_status" value="<?=(isset($dep_status)) ? $dep_status : '';?>" class="form-control" />
            </div>
        </div>


        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Home District</label>
                <input type="text" name="home_district" value="<?=(isset($home_district)) ? $home_district : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Same as Present</label>
                <input type="number" name="same_as_present" value="<?=(isset($same_as_present)) ? $same_as_present : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Total Job Exp</label>
                <input type="number" name="total_job_exp" value="<?=(isset($total_job_exp)) ? $total_job_exp : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp 1</label>
                <textarea name="oth_exp1"  class="form-control" ><?=(isset($oth_exp1)) ? $oth_exp1 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Ans 1</label>
                <textarea name="oth_exp_ans1" class="form-control" ><?=(isset($oth_exp_ans1)) ? $oth_exp_ans1 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Text 1</label>
                <textarea name="oth_exp_text1" class="form-control" ><?=(isset($oth_exp_text1)) ? $oth_exp_text1 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp 2</label>
                <textarea name="oth_exp2" class="form-control" ><?=(isset($oth_exp2)) ? $oth_exp2 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Ans 2</label>
                <textarea name="oth_exp_ans2" class="form-control" ><?=(isset($oth_exp_ans2)) ? $oth_exp_ans2 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-4 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Oth Exp Text 2</label>
                <textarea name="oth_exp_text2" class="form-control" ><?=(isset($oth_exp_text2)) ? $oth_exp_text2 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">IP Address</label>
                <input type="text" name="ip_address" value="<?=(isset($ip_address)) ? $ip_address : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Fee Status</label>
                <input type="number" name="fee_status" value="<?=(isset($fee_status)) ? $fee_status : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Fee Payment Time</label>
                <input type="text" name="fee_payment_time" value="<?=date('d F Y H:i', strtotime(((isset($fee_payment_time)) ? $fee_payment_time : '')));?>" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-3 float-left">            
            <div class="form-group mb-2">
                <label class="mb-0">Position</label>
                <select class="form-control" name="sector_id" >
                    <?php foreach($comboSector as $k => $v){?>
                        <?php 
                                $string = "";
                                if($k == $sector_id) $string = "SELECTED"; 
                        ?>
                        <option value="<?= $k ?>" <?= $string ?>><?= $v ?></option>
                    <?php }?>
                </select>
                
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Screening</label>
                <input type="number" name="screening" value="<?=(isset($screening)) ? $screening : '';?>" class="form-control" />
            </div>
        </div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Created Time</label>
                <input type="text" name="created_time" value="<?=date('d F Y H:i', strtotime(((isset($created_time)) ? $created_time : '')));?>" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Expired Time</label>
                <input type="text" name="expire_time" value="<?=date('d F Y H:i', strtotime(((isset($expire_time)) ? $expire_time : '')));?>" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-3 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Remarks</label>
                <input type="text" name="remarks" value="<?=(isset($remarks)) ? $remarks : '';?>" class="form-control" />
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