<!DOCTYPE html>
<html>
<head>
	<title>Codecrud</title>
	
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/sidebar-themes.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png" />
</head>

<body>

<div class="page-wrapper default-theme sidebar-bg bg1 toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <!-- sidebar-brand  -->
            <div class="sidebar-item sidebar-brand">
                <a href="<?php echo base_url()?>controller_user/dashboard">CodeCrud</a>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="<?php echo base_url()?>assets/img/user.jpg" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name"><?php echo ucfirst($this->session->userdata('username')); ?> </span>
                    <span class="user-role"></span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                            <span>Active</span>

                    </span>
                </div>
            </div>
            <div class=" sidebar-item sidebar-menu">
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
        <div class="container-fluid p-5">
            <div class="row">
                <div class="form-group col-md-12">
                    <a id="toggle-sidebar" class="btn btn-secondary rounded-0" href="#">
                        <span>Toggle Sidebar</span>
                    </a>
                    <a id="pin-sidebar" class="btn btn-outline-secondary rounded-0" href="#">
                        <span>Pin Sidebar</span>
                    </a>
                </div>
            </div>
        </div>