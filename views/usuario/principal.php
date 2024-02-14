<div class="container-fluid pt-4 px-4">
    <div class="row px-5 pt-5">
        <div class="col-lg-12">
            <h3>Administración de usuarios</h3>
            <a href="?controlador=usuario&accion=frmRegistrar" class="btn btn-primary">Registrar</a>
        </div>
    </div>
    <div class="px-5 pt-5 bg-gray">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($this->usuarios as $info) {
                        $uid = $info['USU_UID'];
                        echo "<tr>";
                        echo "<td>".$info['USU_NOMBRES']."</td>";
                        echo "<td>".$info['USU_APELLIDOS']."</td>";
                        echo "<td>".$info['USU_EMAIL']."</td>";
                        echo "<td><button class='btn btn-primary'>Editar</button> <button type='button' onclick='eliminarUsuario(\"$uid\", this)' class='btn btn-danger'>Eliminar</button></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>