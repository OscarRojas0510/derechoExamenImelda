<?php
function validarPassword($password){
    $digits = "0123456789";
    $mayusculas = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    $contieneUnDigito = false;
    $contieneUnaMayuscula = false;

    for ($i=0; $i < strlen($password); $i++) { 
        $caracter = $password[$i];
        if(!$contieneUnDigito && str_contains($digits, $caracter)){
            $contieneUnDigito = true;
        }

        if(!$contieneUnaMayuscula && str_contains($mayusculas, $caracter)){
            $contieneUnaMayuscula = true;
        }

        if($contieneUnaMayuscula && $contieneUnDigito){
            return true;
        }
    }
    return false;
}
session_start();
if(isset($_SESSION['correo'])){
    header("Location: index.php");
}

require 'consultas.php';

if(isset($_SESSION['correo'])){
    header("Location: main.php");
}

$consultas = new Consultas();

$mensaje = null; 

$data = array(
    'correo' => '',
    'password' => ''
);
if(isset($_POST['correo']) && isset($_POST['password']))
{
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $data = array(
        'correo' => $correo ,
        'password' => ''
    );

    if(isset($_POST['correo']) && isset($_POST['password'])){
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $data = array(
        'correo' => $correo ,
        'password' => ''
    );

    $validacion = validarPassword($password);
   
    if($validacion){
        
        $usuario = $consultas->item("SELECT * from usuarios where correo = '$correo'");

        if(is_array($usuario)){
            $mensaje = array('type' => 'warning', 'msg' => 'Nombre de usuario no disponible');
        }else{
            $data = array(
                'correo' => '',
                'password' => ''
            );
            $hashedPassword = crearHash($password);
            $consultas->query("INSERT INTO usuarios(id_user, apellido, nombre, correo, pass, status) values (0+(SELECT IFNULL(MAX(id_user) + 1,1) FROM usuarios),'$apellidophp','$nombrephp',,'$correo''$hashedPassword', 0)");
            $mensaje = array('type' => 'success', 'msg' => 'Usuario registrado exitosamente');
        }
    }else{
        $mensaje = array('type' => 'warning', 'msg' => 'La contraseña debe de tener al menos un dígito y una mayuscula');
    }
}
}
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Registro</title>
</head>

<body>
    <header class="mb-5">
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-12">
                    <a class="navbar-brand d-flex justify-content-center" href="index.html" style="color: white;">
                        <img src="/img/Lion.svg" width="70vw" class="d-inline-block align-top" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main id="main">
        <div class="container" style="height: 80%;">
            <div class="row" style="height: 100%;">
                <div class="col-8 offset-2" style="height: 100%;">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h2>Registro</h2>
                            <form method="POST" action="index.php" name="registro-formulario">
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nombre(s)">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Apellidos">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="staticEmail"
                                            placeholder="email@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-info btn-block">Registrate</button>
                            </form>
                            <?php
                                if(!is_null($mensaje)){ ?>
                                        <br />
                                    <div class="alert alert-<?=$mensaje['type'] ?> alert-dismissible fade show text-center" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>
                                            <?=$mensaje['msg'] ?>
                                            </strong> 
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilosLogin.css">
    <script>
     $(".alert").alert();
     
     $(function() {
        $("form[name='registro-formulario']").validate({
            rules: {
                login: {
                    required: true,
                },
                password:  {
                    required: true,
                    minlength: 4
                },
            },
            messages: {
                login: {
                    required: "Por favor ingrese el nombre de usuario",
                },
                password: {
                    required: "Por favor ingrese la contraseña",
                    minlength: "La contraseña debe de ser de a al menos 4 carácteres"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

   </script>
</body>

</html>