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
    <title>Monitoring kWh Meter 3 Phase | Universitas Muslim Indonesia</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/Logo UMI.png">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.min1.js"></script>
    <script type="text/javascript">
        var refreshid = setInterval(function(){
            $("#chardatav3").load('chartdatav3.php');
            $("#chardataa3").load('chartdataa3.php');
            $("#chardatap3").load('chartdatap3.php');
            $("#chardatae3").load('chartdatae3.php');
            $("#chardatapf3").load('chartdatapf3.php');
            $("#chardataf3").load('chartdataf3.php');
        }, 5000); 
    </script>
    <script>
        $(document).ready(function(){
           setInterval(function(){
                $("#cekbiaya").load('cekbiaya.php');
            }, 1000) ;
        });
    </script>


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
                        <a href="chartR.php"><i class="menu-icon fa fa-bar-chart"></i>Dashboard R</a>
                        <a href="chartS.php"><i class="menu-icon fa fa-bar-chart"></i>Dashboard S</a>
                        <a href="chartT.php"><i class="menu-icon fa fa-bar-chart"></i>Dashboard T</a>
                    </li>
                    </script>
   
                    <h3 class="menu-title">Data Record</h3><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="tables-data.php"><i class="menu-icon fa fa-table"></i>Data R</a>
                        <a href="tables-s.php"><i class="menu-icon fa fa-table"></i>Data S</a>
                        <a href="tables-t.php"><i class="menu-icon fa fa-table"></i>Data T</a>
                        <a href="tables_rekap.php"><i class="menu-icon fa fa-table"></i>Data Rekap</a>
                        <a href="chart.php"><i class="menu-icon fa fa-bar-chart"></i>Chart Rekap</a>
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
           <h4><span><img src="images/Logo UMI.png" width="70" height="80"></span><span> | Monitoring kWh Meter 3 Phase </span></h4>
           <div class="header-menu" style="text-align: right;">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>  
                </div>
                <strong>Tanggal: <span id="tanggalwaktu"></strong>
         <div>
                    <script>
                    var dt = new Date();
                    document.getElementById("tanggalwaktu").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear());
                    </script>
                    </div>
                    
                    <strong> <a href="https://time.is/Makassar" id="time_is_link" rel="nofollow" style="font-size:20px"line-height: 10px></a> </strong>
                    <span id="Makassar_z42b" style="font-size:20px"></span>
                    <script src="//widget.time.is/t.js"></script>
                    <script>
                    time_is_widget.init({Makassar_z42b:{}});
                    </script>
                    
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Chart Data S</h1>
                    </div>
                    
                   
                    </div>
                    </div>

            <div class="col-sm-6 col-lg-2">
                              
            </div>
            <!--/.col-->
            <div class="content mt-6">
                <div class="animated fadeIn">
                    <div class="row align-items-center vh-100">
                        <form action="simpan.php" method="post">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                    <p class="card-title" style="text-align:left;"><b style="color:black;">Web Monitoring kWh Meter 3 Phase</b></p> <p class="card-title" style="text-align:right;"><b style="color:black;">Biaya = Rp.<span id ="cekbiaya"></span> KWh</b></p>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="content mt-4">
                                <div class="row align-items-left">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h4 class="card-header">
                                            <left> <span class="count">Tegangan (T)</span></left>
                                            </h4>
                                            <div class="card-body" id="chardatav3">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="content mt-6">
                                <div class="row align-items-left">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h4 class="card-header">
                                            <left> <span class="count">Arus (T)</span></left>
                                            </h4>
                                            <div class="card-body" id="chardataa3">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="content mt-6">
                                <div class="row align-items-left">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h4 class="card-header">
                                            <left> <span class="count">Daya (T)</span></left>
                                            </h4>
                                            <div class="card-body" id="chardatap3">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="content mt-6">
                                <div class="row align-items-left">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h4 class="card-header">
                                            <left> <span class="count">Energi (T)</span></left>
                                            </h4>
                                            <div class="card-body" id="chardatae3">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div> 
                            <div class="content mt-6">
                                <div class="row align-items-left">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h4 class="card-header">
                                            <left> <span class="count">CosPhi (T)</span></left>
                                            </h4>
                                            <div class="card-body" id="chardatapf3">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div> 
                            <div class="content mt-6">
                                <div class="row align-items-left">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h4 class="card-header">
                                            <left> <span class="count">Frekuensi (T)</span></left>
                                            </h4>
                                            <div class="card-body" id="chardataf3">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>    
                            <style>
                                 .submit {
                                    background-color: #20a8d8;
                                    margin-left: 30px;
                                    text-decoration-color: #ffffff;
                                    padding: 5px;
                                    border-radius: 5px;
                                }
                            </style>              
                         </div>
                    </div>
    
                                
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->    
       <!-- .content --> 
    </div><!-- /#right-panel -->

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


</body>
</html>
