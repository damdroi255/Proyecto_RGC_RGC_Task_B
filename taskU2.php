<?php
    if(isset($_GET["indice"])){
        $indice = $_GET["indice"];
    } 
include 'conexion.php';
include 'cab_pag.php';
?>
<table class="table">
<caption>Modificaci&oacute;n de task</caption>
    <thead>
        <tr>
            <th>id</th>
            <th>description</th>
            <th>priority</th>
            <th>phase</th>
            <th>phase_date</th>
            <th>technician</th>
            <th>commitment_date</th>
            <th>origin_task</th>
            <th>Operación</th>
        </tr>
    </thead>
    <tbody>
        <?php
		$sql="SELECT count(*) registrostotales FROM task";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			$total_registros=$row["registrostotales"];
		}
$sql = "SELECT id,description,priority,phase,phase_date,technician,commitment_date,origin_task FROM task ORDER BY id ASC LIMIT $inicio,$registros";
$result = mysqli_query($conn, $sql);
		$total_paginas=ceil($total_registros/$registros);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                if($indice == $row["id"]){
                    echo '<td>'.$row["id"].'</td>';
                    echo '<td><input type="text" name="description" form="formtaskU" value="'.$row["description"].'"/></td>';
                    echo '<td><input type="text" name="priority" form="formtaskU" value="'.$row["priority"].'"/></td>';
                    
					//echo '<td><input type="text" name="phase" form="formtaskU" value="'.$row["phase"].'"/></td>';
                    echo '<td><select class="form-control" name="phase" form="formtaskU">';
                    $sql_phase = "select id,descripcion from phase";
                    $result_phase = mysqli_query($conn, $sql_phase);
                    if (mysqli_num_rows($result_phase) > 0) {
                        while($row_phase = mysqli_fetch_assoc($result_phase)) {
                            $phase=$row_phase["id"];
							if ($phase== $row["phase"]){
                                echo "<option value=".$phase." selected>".$row_phase["id"]."-> ".$row_phase["descripcion"]."</option>";
                            }else{
                                echo "<option value=".$phase.">".$row_phase["id"]." ) ".$row_phase["descripcion"]."</option>";
                            }
                        }
                    }
                    echo '</select></td>';  

                    echo '<td><input type="text" name="phase_date" form="formtaskU" value="'.$row["phase_date"].'"/></td>';

					//echo '<td><input type="text" name="technician" form="formtaskU" value="'.$row["technician"].'"/></td>';
                    echo '<td><select class="form-control" name="technician" form="formtaskU">';
                    $sql_technician = "select id,descripcion from technician";
                    $result_technician = mysqli_query($conn, $sql_technician);
                    if (mysqli_num_rows($result_technician) > 0) {
                        while($row_technician = mysqli_fetch_assoc($result_technician)) {
                            $technician=$row_technician["id"];
							if ($technician== $row["technician"]){
                                echo "<option value=".$technician." selected>".$row_technician["id"]."-> ".$row_technician["descripcion"]."</option>";
                            }else{
                                echo "<option value=".$technician.">".$row_technician["id"]." ) ".$row_technician["descripcion"]."</option>";
                            }
                        }
                    }
                    echo '</select></td>';  

                    echo '<td><input type="text" name="commitment_date" form="formtaskU" value="'.$row["commitment_date"].'"/></td>';
                    
					//echo '<td><input type="text" name="origin_task" form="formtaskU" value="'.$row["origin_task"].'"/></td>';
                    echo '<td><select class="form-control" name="origin_task" form="formtaskU">';
                    $sql_origin_task = "select id,description from task";
                    $result_origin_task = mysqli_query($conn, $sql_origin_task);
                    if (mysqli_num_rows($result_origin_task) > 0) {
                        while($row_origin_task = mysqli_fetch_assoc($result_origin_task)) {
                            $origin_task=$row_origin_task["id"];
							if ($origin_task== $row["origin_task"]){
                                echo "<option value=".$origin_task." selected>".$row_origin_task["id"]."-> ".$row_origin_task["description"]."</option>";
                            }else{
                                echo "<option value=".$origin_task.">".$row_origin_task["id"]." ) ".$row_origin_task["description"]."</option>";
                            }
                        }
                    }
                    echo '</select></td>';  

                    echo '<td>'
                            . '<form method="get" id="formtaskU">'
                                . '<input type="hidden" name="id" value="idU3"/>'
                                . '<input type="hidden" name="pagina" value="'.$pagina.'"/>'
                                . '<input type="hidden" name="opcion" value="taskU3"/>'
                                . '<input type="hidden" name="indice" value="'.$row["id"].'"/>'
                                . '<button type="submit" class="btn btn-xs btn-success">'
                                    . '<span class="glyphicon glyphicon-ok"></span>'
                                . '</button>'
                            . '</form>'
                            . '<form method="get">'
                                . '<input type="hidden" name="opcion" value="taskU"/>'
                                . '<input type="hidden" name="pagina" value="'.$pagina.'"/>'
                                . '<button type="submit" class="btn btn-xs btn-danger">'
                                    . '<span class="glyphicon glyphicon-remove"></span>'
                                . '</button>'
                            . '</form>'
                       . '</td>';
                } else {
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["priority"]."</td>";
                echo "<td>".$row["phase"]."</td>";
                echo "<td>".$row["phase_date"]."</td>";
                echo "<td>".$row["technician"]."</td>";
                echo "<td>".$row["commitment_date"]."</td>";
                echo "<td>".$row["origin_task"]."</td>";
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
$variable_pie="taskU2";
include 'pie_pag.php';
?>

