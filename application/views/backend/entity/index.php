
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
                            <th>Roll Number</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Position</th>
                            <th width="200">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        
                        <?php foreach($listData as $row){?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$row->roll_number;?></td>
                            <td><?=$row->fullname;?></td>
                            <td><?=$row->email;?></td>
                            <td><?=$row->mobile_number;?></td>
                            <td><?=$row->sector_name;?></td>
                            <td>
                                <a href="<?php echo site_url($linkEdit.$row->entity_id);?>" class="btn btn-sm btn-success btn-block"><b><i class="fa fa-pen"></i></b> Edit</a>
                                <a href="<?php echo site_url($linkShow.$row->entity_id);?>" class="btn btn-sm btn-block btn-info"><b><i class="fa fa-search"></i></b> View</a>
                                <a href="<?=site_url($linkDelete.$row->entity_id);?>" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-block btn-danger"><b><i class="fa fa-trash"></i></b> Delete</a>
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
