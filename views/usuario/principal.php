<div class="container-fluid pt-4 px-4">
    <div class="row px-5 pt-5">
        <div class="col-lg-12">
            <h3>Administración de usuarios</h3>
            <?php if($_SESSION['USU_ROL'] == 1) {
                echo '<a href="?controlador=usuario&accion=frmRegistrar" class="btn btn-primary">Registrar</a>';
            } ?>
        </div>
    </div>
    <div class="row px-5 pt-5">
        <div class="col-lg-12">
            <h3>Reportes</h3>
            <form action="?controlador=usuario&accion=reporte" method="post">
                <select name="rol" id="rol" class="form-control my-3">
                    <option value="1">Administradores</option>
                    <option value="2">Estudiantes</option>
                    <option value="3">Secretarias</option>
                    <option value="4">Todos</option>
                </select>
            <?php if($_SESSION['USU_ROL'] == 1) {
                echo '<button class="btn btn-primary">Reporte</button>';
            } ?>
            </form>
        </div>
    </div>
    <div class="px-5 pt-5 bg-gray">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <?php if ($_SESSION['USU_ROL'] == 1){
                        echo "<th>Acciones</th>"; }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($this->usuarios as $info) {
                        $uid = $info['USU_UID'];
                        echo "<tr>";
                        echo "<td class='text-centerr'>".$info['USU_NOMBRES']."</td>";
                        echo "<td>".$info['USU_APELLIDOS']."</td>";
                        echo "<td>".$info['USU_EMAIL']."</td>";
                        if ($_SESSION['USU_ROL'] == 1){
                            echo "<td><a href='?controlador=usuario&accion=frmEditar&uid=$uid' class='btn btn-primary'>Editar</a> <button type='button' onclick='eliminarUsuario(\"$uid\", this)' class='btn btn-danger'>Eliminar</button></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>