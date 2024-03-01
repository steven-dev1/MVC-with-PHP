<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Registrar usuario</h6>
        <form method="POST" action="?controlador=usuario&accion=registrar" onsubmit="return false" id="formReg">
            <div class="row">
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Código</label>
                    <input name="codigo" type="text" class="form-control" id="codigo" value="<?php echo $this->infoPrograma['PRO_CODIGO'];?>">
                </div>
                <div class="col-lg-6">
                    <label for="exampleInputPassword1" class="form-label">Programa</label>
                    <input name="programa" type="text" class="form-control" id="programa" value="<?php echo $this->infoPrograma['PRO_NOMBRE'];?>">
                </div>
                <input name="uid" type="hidden" class="form-control" id="uid" value="<?php echo $this->infoPrograma['PRO_UID'];?>">
            </div>
            <button type="submit" class="btn btn-primary mt-4" onclick="editarPrograma()">Editar</button>
        </form>
    </div>
</div>