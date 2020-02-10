<!DOCTYPE html>
<html>


    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/png" href="img/logo2.png">

        <title>Sistema de gestión de alquileres</title>


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
                <ul class="nav metismenu" id="side-menu" style="font-size: medium; ">
                    <li class="nav-header" style="padding: 10px">
                        <div class="dropdown profile-element" align=center> <span>
                                <img alt="image" class="img" src="img/logo2.png"  height="130" />
                            </span>


                        </div>
                        <div class="logo-element" style="color: gray">
                            CRISOL
                        </div>
                    </li>
                    
                    
<!--                   <li class="active">
                    <a href="#" aria-expanded="true"><i class="fa fa-sitemap"></i> <span class="nav-label">Ordenes</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                                  <li>
                        <a onclick="Salida_listar()"><i class="fa fa-truck"></i> <span class="nav-label">Orden de Salida </span></a>
                          </li>
                        <li class="">
                            <a href="#" aria-expanded="false">Buscar <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" aria-expanded="false" style="height: 0px;">
                                 <li>
                        <a onclick="facturas_by_fecha()"><i class="fa fa-fax"></i> <span class="nav-label">Buscar Fecha</span></a>
                    </li>
                                 <li>
                        <a onclick="facturas_by_cc()"><i class="fa fa-fax"></i> <span class="nav-label">Buscar CC</span></a>
                    </li>

                            </ul>
                        </li>
                       
                    </ul>
                </li> -->
                    
                    
                    
                    
                    
                    

                   <li class="">
                    <a href="#" aria-expanded="false"><i class="fa fa-edit"></i> <span class="nav-label">Ordenes</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                         <li>
                        <a onclick="Salida_Registrar()"><i class="fa fa-truck"></i> <span class="nav-label">Orden de Salida </span></a>
                          </li>
        
                          <li>
                        <a onclick="facturas_by_fecha()"><i class="fa fa-fax"></i> <span class="nav-label">Buscar</span></a>
                    </li>
                                      
                    </ul>
                   </li > 
                    
                    
<!--                                      <li>
                        <a onclick="facturas_by_fecha()"><i class="fa fa-truck"></i> <span class="nav-label">Orden de Salida </span></a>
                          </li>-->
                    <li>
                        <a onclick="Clientes_Listar()"><i class="fa fa-users"></i> <span class="nav-label">Clientes </span></a>
                    </li>
                    
                
                    
                    <li>
                        <a onclick="Productos_Listar()"><i class="fa fa-wrench"></i> <span class="nav-label">Productos </span></a>
                    </li>
                    
<!--                    <li>
                        <a onclick="Salida_Registrar()"><i class="fa fa-truck"></i> <span class="nav-label">Orden de Salida </span></a>
                    </li>
                    -->
<!--                    <li>
                        <a onclick="facturas_by_fecha()"><i class="fa fa-fax"></i> <span class="nav-label">Facturas </span></a>
                    </li>-->
        <li class="">
                    <a href="#" aria-expanded="false"><i class="fa fa-edit"></i> <span class="nav-label">Conductor</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                           <li>
                        <a onclick="Conductor_list()"><i class="fa fa-fax"></i> <span class="nav-label">Consultar </span></a>
                    </li>
        
                          <li>
                        <a onclick="devoluciones()"><i class="fa fa-truck"></i> <span class="nav-label">Pagos </span></a>
                          </li>
                                      
                    </ul>
                </li>
                
                

                    
<!--                  <li>
                        <a onclick="facturas_by_fecha()"><i class="fa fa-laptop"></i> <span class="nav-label">Facturas</span></a>
                    </li>-->

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>



                    <!--<ul class="nav navbar-top-links navbar-right">

                        <li>
                            <span class="m-r-sm text-muted welcome-message"> 
                                <label style="color: #ffffff" ><?php ?></label></span>
                        </li>


                        <li>
                            <a href="login.php">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>

                        </li>
                    </ul>-->

                </nav>

            </div>







            <div class="wrapper wrapper-content animated fadeInRight"  >



                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins"><!------------inicio caja--------------->


                            <div id="mostrarcontenido"  > <!-------------Inicio pintar --------------------->
   
                            </div><!-------------fin  pintar --------------------->




                        </div>  <!----------------fin caja ---------------->
                    </div>
                </div>
            </div>
            <div class="footer" style="color: black">
                <div class="pull-right">
                    Sistema Gestion de Alquiler <strong>NORTCODING</strong> 2020.
                </div>
                <div>
                    <strong>Copyright</strong> NortCoding &copy; 2016-2020
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
    <script type="text/javascript">
        $(document).ready(function() {
            facturas_by_fecha();
        });
    </script>




</body>
</html>
