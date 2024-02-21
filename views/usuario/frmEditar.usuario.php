<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Registrar usuario</h6>
        <form method="POST" action="?controlador=usuario&accion=registrar" onsubmit="return false" id="formReg">
            <div class="row">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Nombres</label>
                    <input name="names" type="text" class="form-control" id="names" value="<?php echo $this->infoUsuario['USU_NOMBRES'];?>">
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                    <input name="last_names" type="text" class="form-control" id="last_names" value="<?php echo $this->infoUsuario['USU_APELLIDOS'];?>">
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $this->infoUsuario['USU_EMAIL'];?>">
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputDate" class="form-label">Telefono</label>
                    <input name="telefono" type="tel" class="form-control" id="telefono" value="<?php echo $this->infoUsuario['USU_TELEFONO'];?>">
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputDate" class="form-label">Fecha de nacimiento</label>
                    <input name="fecha" type="date" class="form-control" id="fecha" value="<?php echo $this->infoUsuario['USU_FCH_NAC'];?>">
                </div>
                <div class="col-lg-6 my-2">
                    <label for="exampleInputDate" class="form-label">Rol</label>
                    <select name="rol" id="rol" class="p-1 rounded-3 border border-gray outline-none">
                        <option value="1">Estudiante</option>
                        <option value="2">Administrador</option>
                        <option value="3">Secretaria</option>
                    </select>
                </div>
                <input name="uid" type="hidden" class="form-control" id="uid" value="<?php echo $this->infoUsuario['USU_UID'];?>">
            </div>
            <button type="submit" class="btn btn-primary mt-4" onclick="editarUsuario()">Editar</button>
        </form>
    </div>
</div>