<!DOCTYPE html>
<html>
<head>
	<title>Welcome | Codecrud</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <!--===============================================================================================-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toastr.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/sidebar-themes.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/logo.svg">
    <!--===============================================================================================-->
</head>

<body>

<div class="page-wrapper default-theme sidebar-bg bg1 toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <!-- sidebar-brand  -->
            <div class="sidebar-item sidebar-brand">
                <img style="height: 40px;" src="<?php echo base_url()?>assets/img/logo-bg.svg" alt="User picture">&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>controller_user/dashboard">CodeCrud</a>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                <div class="user-pic">
                    <?php foreach ($pp as $row) { ?>
                        <?php if(!empty($row->upload)): ?>
                            <img  style="height: 60px;" src="<?php echo base_url($row->upload); ?>" alt="user"><br><br>
                        <?php else: ?>
                            <img  style="height: 60px;" src="<?php echo base_url('upload/user.jpg'); ?>" alt="user"><br><br>
                        <?php endif ?>
                    <?php } ?>
                </div>
                <div class="user-info">
                    <span class="user-name"><?php echo ucfirst($this->session->userdata('username')); ?> </span>
                    <span class="user-role"></span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <?php foreach ($pp as $row) { 
                                if($row->status == 1) { 
                                   echo '<span>Active</span>';
                                }else{
                                    redirect(base_url() . 'controller_user/logout');
                                }
                        } ?>
                    </span>
                    <div class="dropdowns">
                        <span class="dropbtn">Profile 
                          <i class="fa fa-caret-down"></i>
                        </span>
                        <div class="dropdown-content">
                          <a href="<?php echo base_url()?>controller_user/editprofile">Edit Profile</a>
                          <a href="<?php echo base_url()?>controller_user/changepwd">Change Password</a>
                          <a href="<?php echo base_url()?>controller_user/logout">Logout</a>
                        </div>
                      </div> 
                </div>
            </div>
            <div class="sidebar-item sidebar-menu">
                <ul>
                    <li class="header-menu"> <span>General</span> </li>
                    <li class="sidebar-dropdown">
                        <a href="<?php echo base_url()?>controller_user/dashboard">
                            <i class="fa fa-tachometer-alt"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?php 
                                $query = $this->db->count_all('user');
                            ?>
                            <span class="menu-text">Users</span><span class="badge badge-pill badge-success notification"><?php echo $query; ?></span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="<?php echo base_url()?>controller_user/add">Add New Users</a></li>
                                <li><a href="<?php echo base_url()?>controller_user/list_all_user">List all Users</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-footer  -->
        <div class="sidebar-footer">
            <div>
                <a href="<?php echo base_url()?>controller_user/logout"> <i class="fa fa-power-off"></i> </a>
            </div>
            <div class="pinned-footer">
                <a href="#"> <i class="fas fa-ellipsis-h"></i> </a>
            </div>
        </div>
    </nav>

    <main class="page-content pt-2">
        <div id="overlay" class="overlay"></div>
        <div class="container-fluid toggles">
            <div class="row">
                <div class="form-group col-md-12">
                    <a id="toggle-sidebar" class="btn btn-secondary rounded-0" href="#">
                        <span><i class="fa fa-bars"></i></span>
                    </a>
                    <!-- <a id="pin-sidebar" class="btn btn-outline-secondary rounded-0" href="#">
                        <span>Pin Sidebar</span>
                    </a> -->
                </div>
            </div>
        </div>
