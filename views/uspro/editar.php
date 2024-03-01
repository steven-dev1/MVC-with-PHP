<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Registrar usuario</h6>
        <form method="POST" action="?controlador=usuario&accion=registrar" onsubmit="return false" id="formReg">
            <div class="row">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Usuario</label>
                    <select class="form-control" name="usuario" id="usuario">
                                        <?php foreach ($this->listaUsuarios as $usuario) {?>
                                            <?php if($usuario['USU_ID'] == $this->user['USU_ID']){ ?>
                                                 <option selected class="form-control" value="<?php echo $usuario['USU_ID'];?>" selected><?php $espacio = " "; echo $usuario['USU_NOMBRES']. $espacio. $usuario['USU_APELLIDOS'];?></option>
                                            <?php }else{?>
                                                <option class="form-control" value="<?php echo $usuario['USU_ID'];?>"><?php $espacio = " "; echo $usuario['USU_NOMBRES']. $espacio . $usuario['USU_APELLIDOS'];?></option>
                                            <?php }?>
                                        <?php }?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Programa</label>
                    <select class="form-control" name="programa" id="programa">
                                        <?php foreach ($this->listaProgramas as $programa) { ?>
                                            <?php if($programa['PRO_ID'] == $this->user['PRO_ID']){ ?>
                                                 <option selected class="form-control" value="<?php echo $programa['PRO_ID'];?>" selected><?php echo $programa['PRO_NOMBRE'];?></option>
                                            <?php }else{?>
                                                <option class="form-control" value="<?php echo $programa['PRO_ID'];?>"><?php echo $programa['PRO_NOMBRE'];?></option>
                                            <?php }?>
                                        <?php }?>
                    </select>
                </div>
                <input name="uid" type="hidden" class="form-control" id="uid" value="<?php echo $this->user['USPRO_UID'];?>">
            </div>
            <button type="submit" class="btn btn-primary mt-4" onclick="editarInscripcion()">Editar</button>
        </form>
    </div>
</div>