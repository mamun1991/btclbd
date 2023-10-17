
<div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?=$pageTitle;?></h3>
        </div>
        <div class="card-body">
            <input type="hidden" id="qs" value="" />
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
                    <form method="get" action="<?=site_url($action)?>">
                        <div class="col-md-3 float-left">
                            <select class="form-control" name="s_id" >
                                <?php foreach($comboSector as $k => $v){?>
                                    <?php 
                                            $string = "";
                                            if($k == $this->input->get('s_id')) $string = "SELECTED"; 
                                    ?>
                                    <option value="<?= $k ?>" <?= $string ?>><?= $v ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-3 float-left">
                            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-filter"></i> Filter</button>
                            <!-- <a href="#" class="btn btn-md btn-info" id="btn-export"><i class="far fa-arrow-alt-circle-down"></i> Export</a> -->
                            <a href="<?=site_url($action.'/bulk_submit');?>" class="btn btn-md btn-info" id="btn-bulk"><i class="fas fa-file-export"></i> Bulk Submit</a>
                        </div>
                        
                    </form>
                <!-- <a href="<?php site_url($linkAdd);?>" class="btn bg-success"><b><i class="fa fa-plus"></i></b> Add</a> -->
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="table table-responsive table-striped mt-3">
                <table class="table">
                    <thead class="table-header">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Applicant's Information</th>
                            <th class="text-center" width="120">Photo</th>
                            <th class="text-center" width="120">Signature</th>
                            <th class="text-center">Submitted</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        
                        <?php foreach($listData as $row){?>
                        <tr>
                            <td class="text-center"><?=$no;?></td>
                            <td>
                                <strong>Roll No: <?=$row->roll_number;?></strong> <br/>
                                <strong>Name: <?=$row->fullname;?></strong><br/>
                                Post: <?=$row->sector_name;?><br/>
                            </td>
                            <td>
                                <img src="<?=$row->avatar;?>" class="img-fluid" alt="<?=$row->fullname;?>">
                            </td>
                            <td>
                                <?php if($row->signature != ''){?>
                                    <img src="<?=$row->signature;?>" class="img-fluid" alt="<?=$row->fullname;?>">
                                <?php }?>
                            </td>
                            <td>
                                <?php $submitted = $row->submit_issued; $badge = ($submitted != '') ? 'success' : 'danger';?>
                                <span class="badge badge-<?=$badge?>"><?=(($submitted != '') ? 'Submitted' : 'Not Submitted');?></span>
                                
                            </td>
                            <td><?=$row->remarks;?></td>
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


    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn-export').on('click', function(e){
                e.preventDefault();
                var c = '<?=site_url($action)?>';
                c = c + "/export";
                var sid = "<?=$this->input->get('s_id')?>";
                if(sid !== ""){
                    c = c + '?s_id=' + sid;
                }
                location.href = c;
            });
        });
    </script>