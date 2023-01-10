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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input{
            text-align: center;
        }
    </style>
</head>

<body>
    <center>
        <form action="aceptado.php" method="POST">
            <h1>Sistema de Cobro</h1>
            <label for="">Numero de control:</label><br>
            <input  type="number" name="numControl">
            <br>
            <label for="">Grupo:</label><br>
            <input  type="text" name="grupo">
            <br>
            <button class="btn btn-primary" type="submit">Buscar</button>
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

                 $sql = "SELECT `estado` FROM `cobro` WHERE estado = 'Asistió'";
                 $resul = $connection -> query($sql);
         
                 $num =  $resul -> num_rows;

                 $sql = "SELECT `estado` FROM `cobro` WHERE estado = 'NO'";
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