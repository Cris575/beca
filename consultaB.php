<?php
session_start();
$varSession = $_SESSION['user'];
$varRol = $_SESSION['rol'];
if ($varSession == null || $varSession == '' && $varRol == null || $varRol == '') {
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
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include_once("../Nueva_carpeta/menu.php");
    ?>
    <center>
        <h1>Consulta Alumnos B</h1>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">numControl</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Lunes</th>
                    <th scope="col">Martes</th>
                    <th scope="col">Miercoles</th>
                    <th scope="col">Jueves</th>
                    <th scope="col">Viernes</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>

                    <?php
                    $num = 0;
                    require_once("conexion.php");
                    $sql = "SELECT * FROM `ba_fechas`";
                    $update = $connection->query($sql);

                    while ($row = $update->fetch_array()) {
                        echo "<td colspan='3'></td>      
                    <td>" . $row['Lunes'] . "</td> 
                    <td>" . $row['Martes'] . "</td>
                    <td>" . $row['Miercoles'] . "</td>
                    <td>" . $row['Jueves'] . "</td>
                    <td>" . $row['Viernes'] . "</td> ";
                    }
                    ?>
                </tr>
                <?php
                require_once("conexion.php");
                $sql = "SELECT noFolio, nombre,grupo FROM `alumnos` WHERE noFolio <= 20 AND grupo = 'B';";
                $res = $connection->query($sql);
                while ($row = $res->fetch_array()) {
                    $num++;
                    echo "<tr>

                <td class = 'registro'>" . $row['noFolio'] . "</td>
                <td>" . $row['nombre'] . "</td>
                <td class = 'registro' >" . $row['grupo'] . "</td>
                
                ";

                    $sql2 = "SELECT estado FROM `cobro` WHERE numControl = $num  AND fecha between '2022-09-12' AND '2022-09-16';";
                    $res2 = $connection->query($sql2);
                    while ($row = $res2->fetch_array()) {
                        
                        if ($row['estado'] == 'NO') {
                            echo "
                            <td class = 'registro' style='color: red;'>" . $row['estado'] . "</td>";
                        }else{
                        
                            echo "<td class = 'registro'>" . $row['estado'] . "</td>";
                            
                        }
                        /*
                        $sql3 = "SELECT noFolio FROM `alumnos`";
                        $res3 = $connection->query($sql3);
                        while ($row = $res3->fetch_array()){
                          echo " <td><a href='elminar.php?id=".$row['noFolio']."'>Eliminar</a> </td>";
                          
                        }*/
                }
                
                echo "</tr>";
            }
                ?>
            </tbody>
        </table>
    </center>
    <?php
    include_once("footer.php");
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>