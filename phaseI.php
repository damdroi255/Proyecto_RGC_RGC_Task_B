<?php
include 'conexion.php';
$exitodescripcion = "";
$errordescripcion = "";
if (isset($_GET["descripcion"])) {
    $descripcion = $_GET["descripcion"];
    if (isset($descripcion) && $descripcion == "") {
        $exitodescripcion = "has-error";
        $errordescripcion = "Falta descripcion";
    }
	if ($errordescripcion == "" && $descripcion != "") {
        include "phaseI2.php";
        exit();
    }
} else {
    $id = "";
    $descripcion = "";
}
?>
<div class="well">
    <form role="form" method="get">
        <div class="form-group <?php echo $exitodescripcion; ?>">
            <label class="control-label" for="descripcion">descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>"/>
            <span class="help-block"><?php echo $errordescripcion; ?></span>
        </div>
		<input type="hidden" name="opcion" value="phaseI">
        <button type="submit" class="btn btn-default">Enviar</button>
    </form>
</div>
