<!DOCTYPE html>
<?php
//session_start();
//
//if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] == null || $_SESSION['nombre'] == "") {
//    echo'<script type="text/javascript">
//                alert("Inicio de Sesion Requerido");
//                window.location="login.php"
//                </script>';
//}
////session_destroy(); //  window.location="login.php"
////$usuario = $_SESSION['id_usuario'];
//
//$nombre = $_SESSION['nombre'];
//$apellido = $_SESSION['apellido'];
 $fcha = date("Y-m-d");



?>
<html>


    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Sistema de Gestion de Taller</title>


        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">


        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">




        <script type="text/javascript"  charset="UTF-8"></script></head>
</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element" align=center> <span>
                                <img alt="image" class="img" src="img/logo2.png" width="120" height="120"/>
                            </span>


                        </div>
                        <div class="logo-element">
                            SCA
                        </div>
                    </li>


                    <li>
                        <a onclick="Clientes_Listar()"><i class="fa fa-laptop"></i> <span class="nav-label">Clientes </span></a>
                    </li>
                    
                
                    
                    <li>
                        <a onclick="Productos_Listar()"><i class="fa fa-laptop"></i> <span class="nav-label">Productos </span></a>
                    </li>
                    <li>
                        <a onclick="Ventas_Registrar()"><i class="fa fa-laptop"></i> <span class="nav-label">Alquiler </span></a>
                    </li>
        
                    
                <!--    <li>
                        <a onclick="facturas_listas()"><i class="fa fa-laptop"></i> <span class="nav-label">Facturas</span></a>
                    </li>-->
                                 <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Facturas</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a onclick="facturas_by_fecha()">Facturas por fecha</a></li>
                            <li><a onclick="facturas_Devolucion()">Facturas por usuario</a></li>
                            <!--<li><a onclick="Reporte_fecha()">Reporte por Fecha</a></li>-->
                            


                        </ul>
                    </li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>



                    <ul class="nav navbar-top-links navbar-right">

                        <li>
                            <span class="m-r-sm text-muted welcome-message"> 
<!--                                <label style="color: #ffffff" ><?php ?></label></span>-->
                        </li>


                        <li>
                            <a href="login.php">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>

                        </li>
                    </ul>

                </nav>

            </div>







            <div class="wrapper wrapper-content animated fadeInRight"  >



                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins"><!------------inicio caja--------------->


                            <div id="mostrarcontenido"  > <!-------------Inicio pintar --------------------->
                              
                                       <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-success float-right">Monthly</span>
                                <h5>Clientes</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">40 886,200</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-info float-right">Annual</span>
                                <h5>Orders</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">275,800</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>New orders</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-primary float-right">Today</span>
                                <h5>visits</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">106,120</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New visits</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-danger float-right">Low value</span>
                                <h5>User activity</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">80,600</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>In first month</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Orders</h5>
                                <div class="float-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">2,346</h2>
                                            <small>Total orders in period</small>
                                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">4,422</h2>
                                            <small>Orders in last month</small>
                                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">9,180</h2>
                                            <small>Monthly income from orders</small>
                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>


              
                </div>


                            </div><!-------------fin  pintar --------------------->




                        </div>  <!----------------fin caja ---------------->
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    Sistema de Control Acceso <strong>NORTCODING</strong> 2019.
                </div>
                <div>
                    <strong>Copyright</strong> NortCoding &copy; 2016-2019
                </div>
            </div>

    




        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/funciones.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>













    <script src="js/Ajax.js "></script>
    <script src="js/ViewManager.js "></script>
    <!-- Pon tus js aquí -->    <!-- jQuery library -->

    <!-- Latest compiled JavaScript -->


    <!-- Carga de datos inicial -->





</body>



<!--<script>   
    $(document).ready(function() {
          detalles(); 
            });
                     </script>-->



<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 03:04:35 GMT -->
</html>
