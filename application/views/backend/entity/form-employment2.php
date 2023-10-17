<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            Type 2
        </h3>
    </div>

    <div class="card-body">
        
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Type</label>
                <input type="text" name="employment_type2" value="<?=(isset($employment_type2)) ? $employment_type2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Organization</label>
                <input type="text" name="organization2" value="<?=(isset($organization2)) ? $organization2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Designation</label>
                <input type="text" name="designation2" value="<?=(isset($designation2)) ? $designation2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Office Address</label>
                <textarea name="office_address2" class="form-control" ><?=(isset($office_address2)) ? $office_address2 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Start Date</label>
                <input type="date" name="job_start_date2" value="<?=(isset($job_start_date2)) ? $job_start_date2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">End Date</label>
                <input type="date" name="job_end_date2" value="<?=(isset($job_end_date2)) ? $job_end_date2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Currently Working</label>
                <input type="text" name="currently_working2" value="<?=(isset($currently_working2)) ? $currently_working2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Duration</label>
                <input type="number" name="job_duration2" value="<?=(isset($job_duration2)) ? $job_duration2 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Job Desc</label>
                <textarea name="job_description2" class="form-control" ><?=(isset($job_description2)) ? $job_description2 : '';?></textarea>
            </div>
        </div>
        
    </div>
</div>