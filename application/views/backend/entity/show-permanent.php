<div class="accordion" id="accordPermanent">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePermanent" aria-expanded="true" aria-controls="collapsePermanent">
                    Permanent
                </button>
            </h3>
        </div>

        <div id="collapsePermanent" class="collapse" aria-labelledby="headingOne" data-parent="#accordPermanent">
            <div class="card-body">


                <div class="clearfix"></div>

                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Careof</label>
                        <input type="text" name="permanent_careof" value="<?=$permanent_careof;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">District</label>
                        <input type="text" name="permanent_district" value="<?=$permanent_district;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Post Code</label>
                        <input type="text" name="permanent_postcode" value="<?=$permanent_postcode;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Post</label>
                        <input type="text" name="permanent_post" value="<?=$permanent_post;?>" class="form-control" readonly/>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Upazila</label>
                        <textarea name="permanent_upazilla" class="form-control" readonly><?=$permanent_upazilla;?></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group mb-2">
                        <label class="mb-0">Village</label>
                        <textarea name="permanent_village" class="form-control" readonly><?=$permanent_village;?></textarea>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        
    </div>
</div>