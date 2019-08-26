  <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 style="color:#ffffff;">Nuevo Usuario</h3> </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <!-- Row -->
            
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card card-outline-info">
                            
                            <div class="card-body m-t-15">
                                <legend>Nuevo Usuario</legend>
                                <form action="#" class="form-horizontal form-bordered">
                                    <div class="form-body">                                      
                                        
                                        
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Nombre Completo</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nombreCompleto" class="form-control" placeholder="Nombre completo" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Edad</label>
                                            <div class="col-md-9">
                                                <input type="text" name="rut" class="form-control" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Correo</label>
                                            <div class="col-md-9">
                                                <input type="text" min="10" name="edad" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Usuario</label>
                                            <div class="col-md-9">
                                                <input type="text" name="club" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Contraseña</label>
                                            <div class="col-md-9">
                                                <input type="password" name="fono" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-2 col-md-9">
                                                        <button type="button" id="registrarAsistente" class="btn btn-primary"> <i class="fa fa-check"></i> Registrar Usuario</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card card-outline-info">
                            
                            <div class="card-body m-t-15">
                                <legend>Lista de Usuarios</legend>
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderer table-condensed">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre completoo</th>
                                                <th>Rut</th>
                                                <th>Edad</th>
                                                <th>Teléfono</th>
                                                <th colspan="2">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cuerpo">
                                            <?php 
                                            if(isset($tabla_Usuarios)){
                                                echo $tabla_Usuarios;
                                            }?> 
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                

            <script src="<?php echo base_url('assets/js/lib/jquery/jquery.min.js');?>"></script>
            <script type="text/javascript">


                $('#registrarAsistente').on('click',function(){

                    var Nombre   = $("input[name='nombreCompleto']").val();
                    var Rut      = $("input[name='rut']").val();
                    var Edad     = $("input[name='edad']").val();
                    var Club     = $("input[name='club']").val();

                    var Telefono = $("input[name='fono']").val();



                    // inicio AJAX
                    $.ajax({
                        url: "<?php echo base_url('index.php/Dashboard/guardarUsuario/'); ?>",
                        type: "post",
                        data: { nombre:Nombre
                               ,rut:Rut
                               ,edad:Edad
                               ,club:Club
                               ,telefono:Telefono
                                ,id:2},
                        beforeSend:function(){
                            $("#cuerpo").html('<div class="row">\
                                                <div class="col-lg-1"></div>\
                                                <div class="col-lg-10">\
                                                    <div class="card card-outline-info"><div class="card-body m-t-15">\
                                                            <center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i></center>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>');
                            
                        },success:function(data){
                             $("#cuerpo").html(data);
                             $("input[name='nombreCompleto']").val("");
                             $("input[name='rut']").val("");
                             $("input[name='edad']").val("");
                             $("input[name='club']").val("");
                             $("input[name='fono']").val("");

                          }
                     });
                    // fin ajax 
                    
                    
                });

              /*  $('#cuerpo').on('click','.b_borrar',function(){
                    // inicio AJAX
                    $.ajax({
                        url: "<?php// echo base_url('index.php/Dashboard/C_borrarUsuario/'); ?>",
                        type: "post",
                        data: { id_usuario:$(this).val()},
                        beforeSend:function(){
                            $("#cuerpo").html('<div class="row">\
                                                <div class="col-lg-1"></div>\
                                                <div class="col-lg-10">\
                                                    <div class="card card-outline-info"><div class="card-body m-t-15">\
                                                            <center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i></center>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>');
                            
                        },success:function(data){
                            $("#cuerpo").html("");
                            $("#cuerpo").append($(data));

                          }
                     });
                    // fin ajax 
                });


              
                $(document).ready(function(){
                    
                });*/
                // Obtención de coordenadas 
             
                
                
    </script>