<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (isset($title_page)?$title_page:"Startmin - Bootstrap Admin Theme");?></title>
    <!-- file global -->
    <link href="<?php echo base_url().'css/global.css'?>" rel="stylesheet">
    <!-- Bootstrap Core CSS -->    
    <link href="<?php echo base_url().'css/backend/template/bootstrap.min.css'?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url().'css/backend/template/metisMenu.min.css'?>" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?php echo base_url().'css/backend/template/timeline.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'css/backend/template/startmin.css'?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url().'css/backend/template/morris.css'?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url().'css/font-awesome.min.css'?>" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->    
    <link href="<?php echo base_url().'css/backend/template/dataTables/dataTables.bootstrap.css'?>" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url().'css/backend/template/dataTables/dataTables.responsive.css'?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Startmin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <?php $this->load->view("template_backend/navigation_right"); ?>

        <!-- Sidebar -->
        <?php $this->load->view("template_backend/sidebar"); ?>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><?php echo (isset($title)?$title:"");?></h3>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <?php $this->load->view($content); ?>
        </div>
    </div>

</div>

<!-- jQuery -->
<script src="<?php echo base_url().'js/template/jquery.min.js'?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url().'js/template/bootstrap.min.js'?>"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url().'js/template/metisMenu.min.js'?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url().'js/template/startmin.js'?>"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url().'js/template/dataTables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'js/template/dataTables/dataTables.bootstrap.min.js'?>"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<!-- js global -->
<script src="<?php echo base_url().'js/global.js'?>"></script>
<!-- js page -->
<script src="<?php echo base_url().'js/backend/'.$js_load?>"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<input class="user_role" type="hidden" name="user_role" value="<?php echo (isset($role)?$role:'')?>">
<input id="base_url" type="hidden" value="<?php echo base_url();?>">

</body>
</html>
