<?php
    if(isset($_GET["indice"])){
        $indice = $_GET["indice"];
    } 
include 'conexion.php';
include 'cab_pag.php';
?>
<table class="table">
<caption>Modificaci&oacute;n de usuarios</caption>
    <thead>
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Clave</th>
            <th>TipoUsuario</th>
            <th>Operación</th>
        </tr>
    </thead>
    <tbody>
        <?php
		$sql="SELECT count(*) registrostotales FROM usuarios";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			$total_registros=$row["registrostotales"];
		}
$sql = "SELECT Id,Usuario,Clave,TipoUsuario FROM usuarios ORDER BY Id ASC LIMIT $inicio,$registros";
$result = mysqli_query($conn, $sql);
		$total_paginas=ceil($total_registros/$registros);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                if($indice == $row["Id"]){
                    echo '<td>'.$row["Id"].'</td>';
                    echo '<td><input type="text" name="Usuario" form="formusuariosU" value="'.$row["Usuario"].'"/></td>';
                    echo '<td><input type="text" name="Clave" form="formusuariosU" value="'.$row["Clave"].'"/></td>';
                    echo '<td><input type="text" name="TipoUsuario" form="formusuariosU" value="'.$row["TipoUsuario"].'"/></td>';
                    echo '<td>'
                            . '<form method="get" id="formusuariosU">'
                                . '<input type="hidden" name="Id" value="IdU3"/>'
                                . '<input type="hidden" name="pagina" value="'.$pagina.'"/>'
                                . '<input type="hidden" name="opcion" value="usuariosU3"/>'
                                . '<input type="hidden" name="indice" value="'.$row["Id"].'"/>'
                                . '<button type="submit" class="btn btn-xs btn-success">'
                                    . '<span class="glyphicon glyphicon-ok"></span>'
                                . '</button>'
                            . '</form>'
                            . '<form method="get">'
                                . '<input type="hidden" name="opcion" value="usuariosU"/>'
                                . '<input type="hidden" name="pagina" value="'.$pagina.'"/>'
                                . '<button type="submit" class="btn btn-xs btn-danger">'
                                    . '<span class="glyphicon glyphicon-remove"></span>'
                                . '</button>'
                            . '</form>'
                       . '</td>';
                } else {
                echo "<td>".$row["Id"]."</td>";
                echo "<td>".$row["Usuario"]."</td>";
                echo "<td>".$row["Clave"]."</td>";
                echo "<td>".$row["TipoUsuario"]."</td>";
                echo '<td></td>';
                }
                echo "</tr>";
            }

		}else{
			echo "<font color='darkgray'>(Sin resultados)</font>";
		}

        mysqli_close($conn);
        ?>
    </tbody>
</table>


<?php
$variable_pie="usuariosU2";
include 'pie_pag.php';
?>

