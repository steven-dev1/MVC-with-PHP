<div class="container-fluid pt-4 px-4">    
    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h4 class="mb-4">Inscripción</h6>
                            <form method="POST" action="?controlador=uspro&accion=inscribir" onsubmit="return false" id="formReg">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Usuario</label>
                                    <select class="form-control" name="usuario" id="usuario">
                                        <?php foreach ($this->listaUsuarios as $usuario) {?>
                                            <option class="form-control" value="<?php echo $usuario['USU_ID'];?>"><?php $espacio = " "; echo $usuario['USU_NOMBRES']. $espacio . $usuario['USU_APELLIDOS'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Programa</label>
                                    <select class="form-control" name="programa" id="programa">
                                        <?php foreach ($this->listaProgramas as $programa) {?>
                                            <option class="form-control" value="<?php echo $programa['PRO_ID'];?>"><?php echo $programa['PRO_NOMBRE'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="registrarInscripcion()">Registrar</button>
                            </form>
                        </div>
                    </div>
</div>