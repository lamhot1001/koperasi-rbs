<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $this->load->get_section('judul_browser');?> - Siskop RBS</title>
    <link rel="shorcut icon" href="<?php echo base_url();?>icon.ico" type="image/x-icon" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!--bootstrap v4.0.0-alpha.6--> 
    <link href="<?php echo base_url()?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/component/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/layout/css/style.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/layout/css/colors/default.css" id="theme" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/component/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/layout/css/animate.css" rel="stylesheet">
  
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <a class="navbar-toggle hidden-sm hidden-md hidden-lg" href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="icon-grid"></i></a>
            
        <div class="top-left-part">
            <a class="logo" href="">
                <b><img src="<?php echo base_url(); ?>assets/layout/img/logo-nav.png"/></b><span class="hidden-xs">Koperasi - R B S</span>
            </a>
        </div>
        <!-- Icon Grip Collapse Navbar -->
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs"><i class="icon-grid"></i></a></li>
        </ul>
                
        <!-- Navbar Header Kanan-->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <!-- Calculator-->
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-fax"></i><div class=""><span class=""></span><span class="point"></span></div></a>
                <ul class="dropdown-menu animated bounceInDown">
                    <style>
                        .calculator_button{
                            border : 1px solid #303641;
                            width: 50px;
                            background-color: #5A606C;
                            color: #F5FAFC;
                            cursor:auto;
                            }
                        .calculator_button:hover{
                            border : 1px solid #303641;
                            background-color: #5A606C;
                            color: #F5FAFC;
                            }
                        .calculator_button:focus{
                            border : 1px solid #303641;
                            background-color: #5A606C;
                            color: #F5FAFC;
                            }
                    </style>
                    <form name="form1" onsubmit="return false">
                    <table style="">
                        <tr>
                            <td colspan="4"><input type="text" id="display" style="width:100%; border:0px; background-color:#303641;text-align: right;  font-size: 24px;  font-weight: 100;  color: #fff;" readonly placeholder="0" /></td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="button" class="btn btn-default calculator_button" style="width:100%;"  onclick="reset()">Clear</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(7)">7</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(8)" >8</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(9)" >9</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;+&quot;)">+</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(4)">4</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(5)" >5</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(6)" >6</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;-&quot;)" >-</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(1)">1</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(2)" >2</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(3)" >3</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;*&quot;)" >&times;</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(0)">0</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(&quot;.&quot;)" >.</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="equals()" >=</button></td>
                            <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;/&quot;)" >&divide;</button></td>
                        </tr>
                    </table>
                    </form>
                </ul>
            </li>
            
                <?php
                    if(!empty ($notif_view)){
                        echo $notif_view;
                    }
                ?>
            
                <!-- Profile Pic-->
                <li class="dropdown"><a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><img src="<?php echo base_url();?>assets/layout/img/avatar-admin.png" alt="avatar-admin" width="36" class="img-circle"><b class="hidden-xs"><?php echo $this->load->get_section('u_name');?></b></a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li><a href="javascript:void(0)"><i class="ti-user"></i>&nbsp;My Profile</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-key"></i>&nbsp;Ubah Password</a></li>
                    <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
                </ul>
                </li>
            </ul>
        </div>
    </nav>
    
    
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <?php $sub_view['level'] = $this->session->userdata('level'); ?>
            <?php $this->load->view('layout/sidebar_page',$sub_view); ?>
        </div>
    </div>
    
    <div id="page-wrapper">
       <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">
                        <?php echo $this->load->get_section('judul_utama'); ?>
                    <small><?php echo $this->load->get_section('judul_sub'); ?></small></h4>
                </div>
                
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-calendar"></i>&nbsp;<?php echo date('d F Y'); ?> &nbsp;
                            <i class="fa fa-clock-o"></i>&nbsp;<span class="jam"></span>
                        </li>
                    </ol>
                </div>
            </div>
           <!-- Row Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                      
                         <?php echo $output; ?>
                      
                    </div>
                </div>
            </div>     
        </div>
    </div>
    </div>
    
    <?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
    
    <script src="<?php echo base_url();?>assets/layout/js/calculator.js"></script>
    <script>
        function showPluginDetails() {
            var id = $('#pluginslist').val();
            $('.plugin-details').hide();
            $('#' + id).show();
            return;
        }
    </script>
    
    <script src="<?php echo base_url()?>assets/layout/js/jquery-1.11.0.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/component/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/component/sidebar-nav/dist/sidebar-nav.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/layout/js/jquery.slimscroll.js"></script>
    
    <script src="<?php echo base_url();?>assets/layout/js/custom.js"></script>
    
    <script src="<?php echo base_url()?>assets/layout/js/jqClock.min.js"></script>
    <!-- Waktu -->
	<script type="text/javascript">
    $(document).ready(function(){    
      $(".jam").clock({"format":"24","calendar":"false"});
    });    
    </script>
</body>
</html>