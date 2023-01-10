<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        Semana 1
    </div>
    <table class="table" border="1">
        <thead>
            <tr>


            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>




                <?php
                require_once("conexion.php");
                /*$sql = "SELECT * FROM `diashablies` WHERE semana=1";
$res = $connection -> query($sql);*/

                $sql = "SELECT dia, estado FROM `diashablies` WHERE semana=1";
                $res = $connection->query($sql);
                //$row = $res->fetch_array();

                while ($row = $res->fetch_array()) {
                    if ($row['estado'] == 'no hábil') {
                        echo "
                     <td  style='background-color: red;'>" . $row['dia'] . "</td>";
                    } else {
                        echo "
                       <td>" . $row['dia'] . "</td>
                       ";
                    }
                    
                }
                echo "<tr>
                <td>Suspensión</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <tr>
                <td>Suspensión</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                </tr>
                <tr>
                <td>Suspensión</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                </tr>
                <tr>
                <td>Suspensión</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                <td>No cobrado</td>
                </tr>
                </tr>";
                ?>
                
                </tr>

        </tbody>
    </table>
</body>

</html>