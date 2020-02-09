<!DOCTYPE html>
<html>
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">





    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title"> 
                        <div style="text-align: center; color: black" >
                            <h1><b>Tareas de Mecanicos</b></h1>

                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Id</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Mecanico Asignado</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Placa de Vehiculo</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Servicio a Realizar</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Observacion</th>


                            <!--   <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                   <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-edit"></i></th>  
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>-->


                                    </tr>
                                </thead>
                                <tbody id="VehiculosList">

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    


            <script src="js/plugins/dataTables/datatables.min.js"></script>
            <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>


            <script src="js/plugins/steps/jquery.steps.min.js"></script>
            <!-- Jquery Validate -->
            <script src="js/plugins/validate/jquery.validate.min.js"></script>
            <script src="js/Ajax.js "></script>
            <script src="js/ViewManager.js "></script>
            <script src="js/HtmlBuilder.js "></script>


            <!-- Sweet alert -->
            <script src="js/plugins/sweetalert/sweetalert.min.js"></script>


            <!-- Page-Level Scripts -->
            <script>
                $(document).ready(function () {

                    $('.dataTables-example').DataTable({
                        pageLength: 25,
                        responsive: true,
                        dom: '<"html5buttons"B>lTfgitp',
                        buttons: [
                            {extend: 'copy'},
                            {extend: 'csv'},
                            {extend: 'excel', title: 'ExampleFile'},
                            {extend: 'pdf', title: 'ExampleFile'},

                            {extend: 'print',
                                customize: function (win) {
                                    $(win.document.body).addClass('white-bg');
                                    $(win.document.body).css('font-size', '10px');

                                    $(win.document.body).find('table')
                                            .addClass('compact')
                                            .css('font-size', 'inherit');
                                }
                            }
                        ]

                    });

                });

            </script>


            <!-- That´s all folks! -->
            </html>