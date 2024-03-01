<div class="container-fluid pt-4 px-4">    
    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Programa</h6>
                            <form method="POST" action="?controlador=programa&accion=registrar" onsubmit="return false" id="formReg">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Código</label>
                                    <input name="codigo" type="text" class="form-control" id="codigo" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nombre del programa</label>
                                    <input name="programa" type="text" class="form-control" id="programa">
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="registrarPrograma()">Registrar</button>
                            </form>
                        </div>
                    </div>
</div>