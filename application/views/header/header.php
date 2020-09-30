<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Whatsapp Gateway</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/ElaAdmin-master/images/pnm.png">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ElaAdmin-master/images/pnm.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/normalize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pixeden-stroke-7-icon/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/lib/datatable/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/lib/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/lib/chosen/chosen.min.css">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="<?php echo base_url(); ?>assets/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/jqvmap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/fullcalendar.min.css" rel="stylesheet" />

    <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/Croppie-master/croppie.css" />
    <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/Croppie-master/demo/demo.css" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
    <script src="<?php echo base_url(); ?>assets/jquery-3.5.1.min.js"></script>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                        foreach($menu as $menu2) {
                            if($menu2['url']!='#') {
                                $stringarr = explode('/', $menu2['url']);
                                $string = $stringarr[1];
                            }
                            if($menu2['hasSub']==false) {
                                echo "<li "; if($this->uri->segment(2)==$string){echo 'class="active"'; $this->session->set_userdata('active', true);} echo ">
                                        <a href='" .base_url($menu2['url']). "'><i class='" .$menu2['icon']. "'></i>" .$menu2['text']. "</a>";
                            } else {
                                if($this->session->userdata('active')==true) {
                                    echo "<li class='menu-item-has-children'>";
                                    $this->session->set_userdata($menu2['text'], true);
                                } else {
                                    echo "<li class='menu-item-has-children active dropdown'>";
                                }
                                echo "<a href='" .base_url($menu2['url']). "' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='" .$menu2['icon']. "'></i>" .$menu2['text']. "</a>
                                        <ul class='sub-menu children dropdown-menu'>";
                                        foreach($submenu as $submenu2) {
                                            if($menu2['text']==$submenu2['parent']) {
                                                echo "<li><a href='" .base_url($submenu2['url']). "'>" .$submenu2['text']. "</a></li>";
                                            }
                                        }
                                        echo "</ul>";
                            }
                        }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img class="mr-3" src="<?php echo base_url(); ?>assets/ElaAdmin-master/images/pnm3.png" alt="Logo">WA Gateway</a>
                    <a class="navbar-brand hidden" href="./"><img class="mr-3" src="<?php echo base_url(); ?>assets/ElaAdmin-master/images/pnm3.png" alt="Logo">WA Gateway</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" <?php if($this->session->userdata('logo')=='default.png'){echo "src='" .base_url(). "assets/Logo/default.png'";}else{echo "src='" .base_url(). "assets/Logo/" .$this->session->userdata('logo'). "'";}?>  alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="<?php echo base_url().'Login/logout'?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->