<div class="container-fluid pt-4 px-4">
    <div class="row px-5 pt-5">
        <div class="col-lg-12">
            <h3>Inscripciones</h3>
            <?php if ($_SESSION['USU_ROL'] == 1){
                echo '<a href="?controlador=uspro&accion=inscribir" class="btn btn-primary">Nueva inscripción</a>';
            } ?>
        </div>
    </div>
    <?php if($_SESSION['USU_ROL'] == 1) {
                echo ('<div class="row px-5 pt-5">
                <div class="col-lg-12">
                    <form action="?controlador=uspro&accion=reporte" method="post">
                        <h3>Reportes</h3>
                        <button class="btn btn-primary">Reporte</button>
                    </form>
                </div>
            </div>');
            } ?>
</div>
<div class="px-5 pt-5 bg-gray">
        <table class="table">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Programa</th>
                    <th>Fecha de inscripción</th>
                    <?php if ($_SESSION['USU_ROL'] == 1){
                        echo "<th>Acciones</th>"; }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($this->inscripciones as $info) {
                        $uid = $info['USPRO_UID'];
                        // var_dump($uid);
                        $espacio = " ";
                        echo "<tr>";
                        // echo "<td>".$info['USPRO_ID']."</td>";
                        echo "<td>".$info['USU_NOMBRES']. $espacio .$info['USU_APELLIDOS']."</td>";
                        echo "<td>".$info['PRO_NOMBRE']."</td>";
                        echo "<td>".$info['USPRO_FCH_INS']."</td>";
                        if ($_SESSION['USU_ROL'] == 1){
                            echo "<td><a href='?controlador=uspro&accion=frmEditar&uid=$uid' class='btn btn-primary'>Editar</a> <button type='button' onclick='eliminarInscripcionConfirm(\"$uid\", this)' class='btn btn-danger'>Eliminar</button></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>  