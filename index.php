<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <header class="mb-5">
        <div class="container-fluid" id="header">
            <div class="row">
                <div class="col-12">
                    <a class="navbar-brand d-flex justify-content-center" href="index.php" style="color: white;">
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
                            <h2>Login</h2>
                            <form action="main.php">
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
                                <button type="submit" class="btn btn-outline-success btn-block">Inica Sesión</button>
                            </form>
                            <form action="registro.php">
                                <button type="submit" class="btn btn-outline-info btn-block">Registrate</button>
                            </form>
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
</body>

</html>