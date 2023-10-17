                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">General Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-6 float-left">
                            <div class="form-group mb-2">
                                <label class="mb-0">Web Name <span class="input-note-item mb-0">* Max 50 Karakter</span></label>
                                <input type="text" value="<?=$app_settings['name'];?>" name="app_name" class="form-control" maxlength="50" required />
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-0">Email Address <span class="input-note-item mb-0">*</span></label>
                                <input type="email" value="<?=$app_settings['email'];?>" name="app_email" class="form-control" maxlength="200" required />
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-0">Phone Number <span class="input-note-item mb-0">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" value="<?=$app_settings['phone_number'];?>" name="app_phone_number" class="form-control" required />
                                </div>
                            </div>

                            
                            <div class="form-group mb-2">
                                <label class="mb-0">Description <span class="input-note-item mb-0">*</span></label>
                                <textarea class="form-control" name="app_desc" required><?=$app_settings['desc'];?></textarea>
                            </div>

                        </div>

                        <div class="col-md-6 float-left">

                            <div class="form-group mb-2">
                                <label class="mb-0">Meta Tag <span class="input-note-item mb-0">*</span></label>
                                <textarea class="form-control" name="app_meta_tag" placeholder="Example: abc, def, ghi, jkl" required><?=$app_settings['meta_tag'];?></textarea>
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-0">Address <span class="input-note-item mb-0">*</span></label>
                                <textarea class="form-control" name="app_address"><?=$app_settings['address'];?></textarea>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-md-6 float-left">
                                    <label class="mb-0">Logo </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"  name="app_logo">
                                        </div>
                                    </div>
                                    <div class="preview-logo my-2">
                                        <div class="col-md-6">
                                            <img src="<?=$app_settings['logo'];?>" class="img-fluid" alt="<?=$app_settings['name'];?>" />
                                        </div>
                                    </div>
                                    <div class="preview-notes">
                                        <p><i class="fa fa-check"></i> Max screen size 512x512 Pixel</p>
                                        <p><i class="fa fa-check"></i> Max file size 3MB</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>