
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
        <?php 
       require_once("conexion.php");
       $numControl = $_POST['numControl'];
        $sql = "SELECT Foto FROM `alumnos` WHERE numControl = $numControl";
        $img = $connection -> query($sql);
        $row = $img -> fetch_array();
        $data = 'data:image/png;base64,'.base64_encode($row['Foto']);
        echo "<img src='".$data."'>";

       ?>
       <form action="cobro.php" method="POST">
       <div>
           <input name="num" type="text" value="<?php echo($numControl); ?>">
           <input type="submit" value="Cobrado" name="buttonn">
        </div>
       </form>
 
      
    </center>
</body>
</html>

