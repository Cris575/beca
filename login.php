<?php 
require_once("conexion.php");
if(!empty($_POST["button"])){
        $name = $_POST['user'];
        $password = $_POST['password'];
        session_start();
        $_SESSION['user'] = $name;
        $sql = "SELECT rol FROM usuarios WHERE numControl = $name AND contrasena = '$password'";
        $validar = $connection -> query($sql);
        $row = $validar -> fetch_array();

        if( $validar -> num_rows == 0){ 
         
        }else{
            switch($row['rol']){    
                case "ADMIN";
                header('Location: consulta.php');
                break;
    
                case "CAF";
                header('Location: cafeteria.php');
                break;
                
            }
            $_SESSION['rol']=$row['rol'];
        }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body class="text-center font">
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
              <div class="col-6">
                <main class="form-signin">
                    <form action="login.php" method="POST">
                        <img src="img/tec.jpg" alt="">
                        <h1>----</h1>
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="name@example.com" name="user" required>
                            <label for="floatingInput">Numero de control</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control p" placeholder="name@example.com"
                                name="password" required>
                            <label for="floatingInput"> Contraseña</label>
                        </div>
                        <input name="button" type="submit" class="w-25 btn btn-lg btn-primary"></input>
                    </form>
                </main>
            </div>
        </div>
    </div>
</body>

</html>

