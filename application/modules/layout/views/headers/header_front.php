<!DOCTYPE html>
<html lang="en">
    <head>
        <!--=============================================== 
        Template Design By WpFreeware Team.
        Author URI : http://www.wpfreeware.com/
        ====================================================-->

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>-- Training --</title>

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/icon" href=""/>

        <!-- CSS
        ================================================== -->       
        <!-- Bootstrap css file-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font awesome css file-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/frontend/css/jquery-ui.css">
        <link href="<?= base_url(); ?>assets/frontend/css/font-awesome.min.css" rel="stylesheet">
        <!-- Superslide css file-->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/superslides.css">
        <!-- Slick slider css file -->
        <!-- SmartAdmin RTL Support  -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
        <link href="<?= base_url(); ?>assets/frontend/css/slick.css" rel="stylesheet"> 
        <!-- Circle counter cdn css file -->
        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
        <!-- smooth animate css file -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
        <!-- preloader -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/queryLoader.css" type="text/css" />
        <!-- gallery slider css -->
        <link type="text/css" media="all" rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/jquery.tosrus.all.css" />    
        <!-- Default Theme css file -->
        <link id="switcher" href="<?= base_url(); ?>assets/frontend/css/themes/default-theme.css" rel="stylesheet">
        <!-- Main structure css file -->
        <link href="<?= base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">
       
        <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
        <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
 
    </head>
    <body>    
        <!-- SCROLL TOP BUTTON -->
        <a class="scrollToTop" href="#"></a>
        <!-- END SCROLL TOP BUTTON -->
    
        <!--=========== BEGIN HEADER SECTION ================-->
        <header id="header">
          <!-- BEGIN MENU -->
            <div class="menu_area">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
                    <div class="navbar-header">
                        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- LOGO -->
                        <!-- TEXT BASED LOGO -->
                        <!-- <a class="navbar-brand" href="#">Training</a>               -->
                        <!-- IMG BASED LOGO  -->
                        <!-- <a class="navbar-brand" href="index.html"> -->
                            
                            <img src="<?= base_url(); ?>assets/frontend/img/ilc.jpeg" alt="logo" class="img-responsive" style="width: 90px; height: 60px; margin-top: 6px;">             
                        <!-- </a> -->
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                            <li><a href="<?= site_url(); ?>">Beranda</a></li>
                            <li><a href="<?= site_url('training'); ?>">Pelatihan</a></li>
                            <li><a href="<?= site_url('event'); ?>">Events</a></li>
                        </ul>           
                    </div><!--/.nav-collapse -->
                </div>     
            </nav>  
        </div>
          <!-- END MENU -->    
    </header>
    <!--=========== END HEADER SECTION ================--> 
