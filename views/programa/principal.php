<div class="container-fluid pt-4 px-4">
    <div class="row px-5 pt-5">
        <div class="col-lg-12">
            <h3>Programa</h3>
            <?php if ($_SESSION['USU_ROL'] == 1){
                echo '<a href="?controlador=programa&accion=frmRegistrar" class="btn btn-primary">Registrar</a>';
            } ?>
        </div>
    </div>
            <?php if($_SESSION['USU_ROL'] == 1) {
                echo ('<div class="row px-5 pt-5">
                <div class="col-lg-12">
                    <form action="?controlador=programa&accion=reporte" method="post">
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
                    <th>Código</th>
                    <th>Apellido</th>
                    <?php if ($_SESSION['USU_ROL'] == 1){
                        echo "<th>Acciones</th>"; }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($this->programas as $info) {
                        $uid = $info['PRO_UID'];
                        echo "<tr>";
                        echo "<td class='text-centerr'>".$info['PRO_CODIGO']."</td>";
                        echo "<td>".$info['PRO_NOMBRE']."</td>";
                        if ($_SESSION['USU_ROL'] == 1){
                            echo "<td><a href='?controlador=programa&accion=frmEditar&uid=$uid' class='btn btn-primary'>Editar</a> <button type='button' onclick='eliminarProgramaConfirm(\"$uid\", this)' class='btn btn-danger'>Eliminar</button></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>    