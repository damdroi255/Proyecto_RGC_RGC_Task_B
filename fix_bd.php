<?php
include 'conexion.php';
include 'cab_pag.php';
?>
<table class="table">
<caption>Fix origin_task with 0 in Task and Historical</caption>

        <?php
		$sql="update task set origin_task=id where origin_task=0";

		if ($conn->query($sql) === TRUE) {
			echo "Record task updated successfully";
		} else {
			echo "Error updating record task: " . $conn->error;
		}

		echo " / "; 

		$sql="update historical set origin_task=task_id where origin_task=0";

		if ($conn->query($sql) === TRUE) {
			echo "Record historica updated successfully";
		} else {
			echo "Error updating record historical: " . $conn->error;
		}

        mysqli_close($conn);
        ?>
</table>

