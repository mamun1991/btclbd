
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?=$pageTitle;?></h3>
        </div>
        <div class="card-body">
            <div class="form-group form-group-feedback form-group-feedback-left">
                    <?php if ($this->session->flashdata('success')) { ?>
					    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
					<?php } ?>
					<?php if ($this->session->flashdata('error')) { ?>
					    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
					<?php } ?>
			</div>    

            <div class="row">
                <div class="col-md-12">
                <a href="<?=site_url($linkAdd);?>" class="btn bg-success"><b><i class="fa fa-plus"></i></b> Add</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="table table-responsive table-striped mt-3">
                <table class="table">
                    <thead class="table-header">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th width="100">Avatar</th>
                            <th width="200">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        
                        <?php foreach($listData as $row){?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$row->user_fullname;?></td>
                            <td><?=$row->username;?></td>
                            <td><?=$row->user_email;?></td>
                            <td>
                            <img src="<?=$row->avatar;?>" class="img-fluid" alt="<?=$row->user_fullname;?>">
                                
                            </td>
                            <td>
                                <a href="<?=site_url($linkEdit.$row->user_id);?>" class="btn btn-info"><b><i class="fa fa-pen"></i></b> Edit</a>
                                <?php if($row->user_group != 1){?>
                                <a href="<?=site_url($linkDelete.$row->user_id);?>" onclick="return confirm('Are you sure?');" class="btn btn-danger"><b><i class="fa fa-trash"></i></b> Delete</a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php $no++;?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    <!--Tampilkan pagination-->
                    <?php echo $pagination; ?>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        
    </div>
