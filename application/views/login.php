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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <img class="align-content" src="<?php echo base_url(); ?>assets/ElaAdmin-master/images/pnm.png" alt="" style="width: 200px; height: 200px;">
                </div>
                <div class="login-form">
                    <form action="<?php echo base_url().'Login/auth'?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        </div>
                        <div class="col-md-12 mb-4" style="text-align: center; color: #E74C3C; font: bold;">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.matchHeight-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ElaAdmin-master/assets/js/main.js"></script>

</body>
</html>
