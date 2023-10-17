<?php 
    $optionRoles = $this->config->item('roles');
    $pkField = 'uid';
    $dataId = (isset($viewData->user_id)) ? $viewData->user_id : '';
    $dataFullname = (isset($viewData->user_fullname)) ? $viewData->user_fullname : '';
    $dataEmail = (isset($viewData->user_email)) ? $viewData->user_email : '';
    $dataUsername = (isset($viewData->username)) ? $viewData->username : '';
    $dataGroup = (isset($viewData->user_group)) ? $viewData->user_group : '';
    unset($optionRoles['-1']);
    $defaultOptionAccess = $dataGroup;
?>
<form action="<?=site_url($action);?>" method="post" enctype="multipart/form-data">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?=$pageTitle;?></h3>
        </div>
        <div class="card-body">
            <input type="hidden" name="<?=$pkField;?>" value="<?=$dataId;?>" />
            <div class="col-md-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 float-left">
                <div class="form-group mb-2">
                    <label class="mb-0">Full Name</label>
                    <input type="text" name="user_fullname" value="<?=$dataFullname;?>" class="form-control" placeholder="Ex: Admin Website" required />
                </div>

                <div class="form-group mb-2">
                    <label class="mb-0">Email</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" value="<?=$dataEmail;?>" name="user_email" class="form-control" placeholder="Ex: admin@mail.com" required/>
                    </div>
                    
                </div>

                <div class="form-group mb-2">
                    <label class="mb-0">Role</label>
                    <select class="form-control" name="user_group" >
                        <?php foreach($optionRoles as $k => $v){?>
                            <?php 
                                    $string = "";
                                    if($k == $defaultOptionAccess) $string = "SELECTED"; 
                            ?>
                            <option value="<?= $k ?>" <?= $string ?>><?= $v ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="col-md-6 float-left">
                <div class="form-group mb-2">
                    <label class="mb-0">Username</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" value="<?=$dataUsername?>" name="username" class="form-control" placeholder="Ex: andijohan" required>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label class="mb-0">Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label class="mb-0">Avatar</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file"  name="user_avatar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="<?=site_url($back);?>" class="btn bg-orange"><i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>