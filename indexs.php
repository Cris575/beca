<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1>Consulta Alumnos</h1>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">numControl</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">aMaterno</th>
                    <th scope="col">aPaterno</th>
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
                    <td colspan="5"></td>
                    <td>2020-10-24</td>
                    <td>2020-10-25</td>
                    <td>2020-10-26</td>
                    <td>2020-10-27</td>
                    <td>2020-10-28</td>
                </tr>
                <?php
            $semana = 4;
            require_once("conexion.php");
            $sql = "SELECT numControl, nombre, aPaterno,aMaterno FROM `alumnos` WHERE numControl <= 62;";
            $res = $connection -> query($sql);
            while(/*$row =  mysqli_fetch_array($res)*/ $row = $res -> fetch_array()){
                echo "<tr>

                <td>".$row['numControl']."</td>
                <td>".$row['nombre']."</td>
                <td>".$row['aPaterno']."</td>
                <td>".$row['aMaterno']."</td>
                <td></td>";
                
                $sql2 = "SELECT estado FROM `cobro` WHERE numControl = ".$row['numControl'].";";
                $res2 = $connection -> query($sql2);
                while($row = $res2 -> fetch_array()){
                    echo "<td>".$row['estado']."</td>";
                }
                echo "</tr>";   
            }
         /*   echo "<td><a href='http://localhost/crud/Formulario/alumno/formulario%20copy.html'>agregar</a></td>";*/
            ?>

            </tbody>
        </table>
    </center>
    <?php 
include_once("../Nueva_carpeta/nav.php");
?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>