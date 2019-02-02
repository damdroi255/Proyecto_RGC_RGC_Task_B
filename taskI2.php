<?php
include 'conexion.php';
$sql = "INSERT INTO task (id,description,priority,phase,phase_date,technician,commitment_date,origin_task) VALUES ('".$id."','".$description."','".$priority."','".$phase."','".$phase_date."','".$technician."','".$commitment_date."','".$origin_task."')";
if (mysqli_query($conn, $sql)) {
    echo " ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//hacer el historical
$sql = "INSERT INTO historical (task_id,description,priority,phase,phase_date,technician,commitment_date,origin_task) VALUES ('".$id."','".$description."','".$priority."','".$phase."','".$phase_date."','".$technician."','".$commitment_date."','".$origin_task."')";
if (mysqli_query($conn, $sql)) {
    echo " ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
include 'taskS.php';
?>
