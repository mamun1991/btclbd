<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            Type 3
        </h3>
    </div>

    <div class="card-body">

        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Type</label>
                <input type="text" name="employment_type3" value="<?=(isset($employment_type3)) ? $employment_type3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Organization</label>
                <input type="text" name="organization3" value="<?=(isset($organization3)) ? $organization3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Designation</label>
                <input type="text" name="designation3" value="<?=(isset($designation3)) ? $designation3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Office Address</label>
                <textarea name="office_address3" class="form-control" ><?=(isset($office_address3)) ? $office_address3 : '';?></textarea>
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Start Date</label>
                <input type="date" name="job_start_date3" value="<?=(isset($job_start_date3)) ? $job_start_date3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">End Date</label>
                <input type="date" name="job_end_date3" value="<?=(isset($job_end_date3)) ? $job_end_date3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Currently Working</label>
                <input type="text" name="currently_working3" value="<?=(isset($currently_working3)) ? $currently_working3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-6 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Duration</label>
                <input type="number" name="job_duration3" value="<?=(isset($job_duration3)) ? $job_duration3 : '';?>" class="form-control" />
            </div>
        </div>
        <div class="col-md-12 float-left">
            <div class="form-group mb-2">
                <label class="mb-0">Job Desc</label>
                <textarea name="job_description3" class="form-control" ><?=(isset($job_description3)) ? $job_description3 : '';?></textarea>
            </div>
        </div>

    </div>
</div>