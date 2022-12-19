<?php 
$cobro=$_POST['num'];
require_once("conexion.php");
$fechaActual = date('Y-m-d');
echo($fechaActual);
$sql = " UPDATE `cobro` SET `estado`='COBRADO' WHERE `numControl` = '$cobro' AND `fecha` = '$fechaActual'" ;
$res = $connection -> query($sql);
echo(" <script>alert('Beca cobrada')</script>");
?>