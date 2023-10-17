<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            Type 1
        </h3>
    </div>

    <div class="card-body">

        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Type</label>
                <input type="text" name="employment_type1" value="<?=(isset($employment_type1)) ? $employment_type1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Organization</label>
                <input type="text" name="organization1" value="<?=(isset($organization1)) ? $organization1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Designation</label>
                <input type="text" name="designation1" value="<?=(isset($designation1)) ? $designation1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Office Address</label>
                <textarea name="office_address1" class="form-control" ><?=(isset($office_address1)) ? $office_address1 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Start Date</label>
                <input type="date" name="job_start_date1" value="<?=(isset($job_start_date1)) ? $job_start_date1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">End Date</label>
                <input type="date" name="job_end_date1" value="<?=(isset($job_end_date1)) ? $job_end_date1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Currently Working</label>
                <input type="text" name="currently_working1" value="<?=(isset($currently_working1)) ? $currently_working1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Duration</label>
                <input type="number" name="job_duration1" value="<?=(isset($job_duration1)) ? $job_duration1 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Job Desc</label>
                <textarea name="job_description1" class="form-control" ><?=(isset($job_description1)) ? $job_description1 : '';?></textarea>
            </div>
        </div>

    </div>
</div>