<div class="accordion" id="accordPresent">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePresent" aria-expanded="true" aria-controls="collapsePresent">
                    Present
                </button>
            </h3>
        </div>

        <div id="collapsePresent" class="collapse" aria-labelledby="headingOne" data-parent="#accordPresent">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Careof</label>
                        <input type="text" name="present_careof" value="<?=$present_careof;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">District</label>
                        <input type="text" name="present_district" value="<?=$present_district;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Post Code</label>
                        <input type="text" name="present_postcode" value="<?=$present_postcode;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Post</label>
                        <input type="text" name="present_post" value="<?=$present_post;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Upazila</label>
                        <textarea name="present_upazila" class="form-control" readonly><?=$present_upazila;?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Village</label>
                        <textarea name="present_village" class="form-control" readonly><?=$present_village;?></textarea>
                    </div>
                </div>
                
                

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>