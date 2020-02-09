<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Gestion de Taller</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
          <title>Auto Service</title>

</head>

<body class="gray-bg">
     

    <div class="middle-box text-center loginscreen animated fadeInDown" >
        <div class="ibox " style="background-color: blue">
            <div class="ibox-content text-center p-md">
                  <div >
           
             <div class="dropdown profile-element" align=center> <span>
                                    <img alt="image" class="img" src="img/logo2.png" width="100%" height="100%"/>
                                </span>
                          <br>
                          <br>
<!--                          <span  style="color: #233646 ;  text-shadow: 2px 2px 2px blue;"class="nav-label"><h2><b>Taller Full Service</b></h2></span>-->

                            </div>
            <h3>Bienvenido</h3>
            <h3>Administrador</h3>
            <br>
            <form role="form" method="post" action="../front/index.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="documento" name="documento" placeholder="Cedula" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Iniciar Sesion</button>

               
            </form>
            <hr style="background-color: brown">
            <section >
    <!-- all for your comfort blocks -->
    <div class="row login-links">
                                    <div class="col-md-3 col-sm-3 col-xs-3">

        </div>    
                                            <div class="col-md-3 col-sm-3 col-xs-3">

                                        <a href="login_Adm.php" ><i  style="font-size: 40px" class="fa fa-user-o" aria-hidden="true"></i></a>

        </div>    
                                    <div class="col-md-3 col-sm-3 col-xs-3">

                                 <a href="login.php" ><i  style="font-size: 40px" class="fa fa-bus" aria-hidden="true"></i></a>

        </div>     
                                    <div class="col-md-3 col-sm-3 col-xs-3">


        </div>    
        
                       </div>
</section>
        </div>
            </div>
            </div>
      
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>



</html>
