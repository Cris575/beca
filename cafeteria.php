<?php 
session_start();
$varSession = $_SESSION['user'];
$varRol = $_SESSION['rol'];
if ($varSession == null || $varSession== '' && $varRol == null || $varRol== '') {
   header('Location: login.php');
   die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Document</title>
</head>

<body>
    <center>
        <form action="aceptado.php" method="POST">
            <label for="">Num</label>
            <input type="text" name="numControl">
            <br>
            <button type="submit">Buscar</button>
        </form>
        <div>
            <table border="1">
                <br>
                <thead>
                    <tr>
                        <td>Cobrado </td>
                        <td>No Cobrado
                        </td>
                    </tr>
                </thead>
                <tr>
                    <?php 
                 require_once("conexion.php");

                 $sql = "SELECT `estado` FROM `cobro` WHERE estado = 'COBRADO'";
                 $resul = $connection -> query($sql);
         
                 $num =  $resul -> num_rows;

                 $sql = "SELECT `estado` FROM `cobro` WHERE estado = 'NO COBRADO'";
                 $resul = $connection -> query($sql);
         
                 $num2 =  $resul -> num_rows;

                 echo "<td>$num</td>
                           <td>$num2</td>"
                ?>
                </tr>
            </table>
            <a href="cerrar_Sesion.php">Cerra sesion</a>
        </div>
        
    </center>
</body>

</html>