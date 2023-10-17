<?php 
    $configApp = $this->config->item('app');
    $cfgDirView = $configApp['backend']['dir_view'];
    $cfgRoute = $configApp['backend']['base_route'];
    $themes = $configApp['backend']['dir_theme'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$app_settings['name'].' - '.$pageTitle;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view($cfgDirView.'template/css');?>
        <?php $this->load->view($cfgDirView.'template/scripts');?>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>


                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?=site_url($cfgRoute.'/logout');?>">
                            <i class="fas fa-power-off"></i> <span class="ml-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->


            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
                <!-- <a href="<?=site_url($cfgRoute.'/dashboard');?>" class="brand-link">
                    <img src="<?=$app_settings['logo'];?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><?=$app_settings['name'];?></span>
                </a> -->

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?=$this->session->userdata('avatar');?>" class="img-circle elevation-2" alt="<?=$this->session->userdata('fullname');?>">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?=$this->session->userdata('fullname');?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <?php $this->load->view($cfgDirView.'template/features');?>

                            <li class="nav-item">
                                <a href="<?=site_url($cfgRoute.'/upload_data')?>" class="nav-link">
                                    <i class="fa fa-upload nav-icon"></i>
                                    <p>Upload Data</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?=site_url($cfgRoute.'/entity')?>" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Entity</p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Reports <i class="right fas fa-angle-left"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?=site_url($cfgRoute.'/report_attendance')?>" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Attendance</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?=site_url($cfgRoute.'/report_admit')?>" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Admit Issue</p>
                                        </a>
                                    </li>
                                </ul>   
                            </li>

                            <li class="nav-item">
                                <a href="<?=site_url($cfgRoute.'/user')?>" class="nav-link">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=site_url($cfgRoute.'/settings')?>" class="nav-link">
                                    <i class="nav-icon fa fa-cog nav-icon"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <?php $this->load->view($view);?>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
            <footer class="main-footer">
                <strong>Copyright &copy; <?=date('Y')?> <a href="<?=base_url();?>"><?=$app_settings['name'];?></a>.</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        
    </body>
</html>
