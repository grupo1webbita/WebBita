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
                                <form action="#" class="form-horizontal form-bordered" method="post">
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
                                                <input type="text" name="edad" class="form-control" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Correo</label>
                                            <div class="col-md-9">
                                                <input type="text" min="10" name="mail" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Delegacion</label>
                                            <div class="col-md-9">
                                                <input type="text" min="10" name="delegacion" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Usuario</label>
                                            <div class="col-md-9">
                                                <input type="text" name="user" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Contraseña</label>
                                            <div class="col-md-9">
                                                <input type="password" name="pass" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-2 col-md-9" align="right">
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
                                                <th>Edad</th>
                                                <th>Correo</th>
                                                <th>Usuario</th>
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

                    var Nombre      = $("input[name='nombreCompleto']").val();
                    var Edad        = $("input[name='edad']").val();
                    var Correo      = $("input[name='mail']").val();
                    var Usuario     = $("input[name='user']").val();
                    var Password    = $("input[name='pass']").val();
                    var Delegacion  = $("input[name='delegacion']").val();

                    // inicio AJAX
                    $.ajax({
                        url: "<?php echo base_url('index.php/Dashboard/guardarUsuario/'); ?>",
                        type: "post",
                        data: { nombre:Nombre
                               ,age:Edad
                               ,mail:Correo
                               ,delegacion:Delegacion
                               ,user:Usuario
                               ,pass:Password
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
                             $("input[name='edad']").val("");
                             $("input[name='mail']").val("");
                             $("input[name='user']").val("");
                             $("input[name='pass']").val("");
                             $("input[name='delegacion']").val("");//++++++++++++++++++++++++++


                          }
                     });
                    // fin ajax 
                    
                    
                });

                $('#cuerpo').on('click','.b_borrar',function(){
                    // inicio AJAX
                    $.ajax({
                        url: "<?php echo base_url('index.php/Dashboard/C_borrarUsuario/'); ?>",
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
                    
                });
                // Obtención de coordenadas 
             
                
                
    </script>