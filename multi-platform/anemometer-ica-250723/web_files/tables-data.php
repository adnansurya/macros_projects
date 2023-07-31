<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monitoring Kecepatan Angin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/Logo UMI.png">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.dataTables.min.css">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  
</head>

<body>






    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div>
                 </div>
                <a class="navbar-brand" href="index1.php">Welcome, Admin</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index1.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <h3 class="menu-title">Data Table</h3><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="tables-data.php"><i class="menu-icon fa fa-table"></i>Table</a>
                    </li>
                    <h3 class="menu-title">Cetak Data</h3><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="laporanexcel.php"><i class="menu-icon fa fa-print"></i>Cetak data ke EXCEL</a>
                        <a href="laporan-cetak.php"target="_blank"><i class="menu-icon fa fa-print"></i>Cetak data ke PDF</a>
                    </li>



                    <li class="menu-item-has">
                        <a href="logout.php"><i class="menu-icon fa fa-sign-out"></i> Log Out </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
           <h4>Data Table</h4>
           <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>  
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data</h1>
                    </div>
                </div>
            </div>
            
            
            
        </div>

            <div class="col-sm-6 col-lg-3">
                              
            </div>
            <!--/.col-->
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
    
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Web Monitoring Kecepatan Angin</strong>
                        
                                </div>


                                <div class="card-body">
                                    <table id="datar" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <td>No.</td>
                                                <td>Tanggal</td>
                                                <td>Jam</td>
                                                <td>Kecepatan</td>
                                            </tr>
                                        </thead>
                                    <tbody>
                                       <?php
                                        error_reporting(0);
                                            include "koneksi.php";
                                            $no = 1;  
                                            $query = $_POST['query'];
                                            if($query){
                                                $data = mysqli_query($konek,"select * from tb_sensor WHERE tanggal LIKE'".$query."' ");
                                            }else{
                                                $data = mysqli_query($konek,"select * from tb_sensor");
                                            }
                                            while($d = mysqli_fetch_array($data)){
                                        ?>
                                            <tr>
                                                <td><?php echo $d['id'];?></td>
                                                <td><?php echo $d['tanggal'];?></td>
                                                <td><?php echo $d['jam'];?></td>
                                                <td><?php echo $d['kecepatan'];?> m/s</td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                <script>
                                $(document).ready(function() {
                                $('#datar').DataTable( {
                                    scrollY:        450,
                                    scrollX:        true,
                                    scrollCollapse: true,
                                    paging:         true,
                                    fixedHeader:           
                                    {
                                        header: true,
                                        footer: true,
                                    },
                                    dom: 'Blfrtip',
                                    buttons: [
                                        {
                                        extend:'copy',
                                        text:'Copy'
                                        },
                                        {
                                        extend:'csv', 
                                        },
                                        {
                                        extend:'excel',
                                        },
                                        {
                                        extend:'pdf', 
                                        },
                                        {
                                        extend:'print',
                                        }, 
                                         ],
                                        } );
                                    } );
                                </script>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->    
       <!-- .content --> 
    </div>
</body>
<!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
