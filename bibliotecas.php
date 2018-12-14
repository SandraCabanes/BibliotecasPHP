<?php
require_once 'entity/Biblioteca.php';
require_once 'core/App.php';
require_once 'repository/BibliotecaRepository.php';
require_once 'database/Connection.php';

session_start();

if (!isset($_SESSION['id_mun'])) {
    $_SESSION['id_mun'] = $_GET['v1'];
}

$tipo='';
$nombre='';
$direccion='';
$cod_postal='';
$telefono='';
$web='';
$email='';
$catalogo='';

try{
$config = require_once  'app/config.php';
App::bind('config', $config);
$connection = App::getConnection();
$bibliotecaRepository = new BibliotecaRepository();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tipo = trim(htmlspecialchars($_POST['tipo']));
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $direccion = trim(htmlspecialchars($_POST['direccion']));
    $cod_postal = trim(htmlspecialchars($_POST['cod_postal']));
    $telefono = trim(htmlspecialchars($_POST['telefono']));
    $web = trim(htmlspecialchars($_POST['web']));
    $email = trim(htmlspecialchars($_POST['email']));
    $catalogo = trim(htmlspecialchars($_POST['catalogo']));

    $biblioteca = new Biblioteca($tipo, $nombre, $direccion, $cod_postal, $telefono, $web, $email, $catalogo,  $_SESSION['id_mun'] );
    $bibliotecaRepository->save($biblioteca);
}

$bibliotecas = $bibliotecaRepository->findId($_SESSION['id_mun'], 'id_municipio');
}catch (QueryException $e){
    throw new QueryException("Error");
}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Bibliotecas</title>
    </head>
    <body>

        <div class="container">
        <h2>Directorio de bibliotecas de la Comunidad Valenciana</h2><br>
        <br>
        <h4>AÑADIR BIBLIOTECA</h4>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="tip">Tipo</label>
                <input type="text" class="form-control" id="tip" name="tipo">
            </div>
            <div class="form-group">
                <label for="nom">Nombre</label>
                <input type="text" class="form-control" id="nom" name="nombre">
            </div>
            <div class="form-group">
                <label for="dir">Direccion</label>
                <input type="text" class="form-control" id="dir" name="direccion">
            </div>
            <div class="form-group">
                <label for="codp">Código postal</label>
                <input type="text" class="form-control" id="codp" name="cod_postal">
            </div>
            <div class="form-group">
                <label for="tfno">Teléfono</label>
                <input type="number" class="form-control" id="tfno" name="telefono">
            </div>
            <div class="form-group">
                <label for="wb">Web</label>
                <input type="text" class="form-control" id="wb" name="web">
            </div>
            <div class="form-group">
                <label for="mail">E-mail</label>
                <input type="email" class="form-control" id="mail" name="email">
            </div>
            <div class="form-group">
                <label for="cat">Catálogo</label>
                <input type="text" class="form-control" id="cat" name="catalogo">
            </div>

            <div class="form-group">
                <label for="cod">Id municipio</label>
                <input class="form-control" type="text" placeholder="<?= $_SESSION['id_mun'] ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Añadir</button>
        </form>

        <br>
        <br>
    </div>
        <!--<div class="container">-->
            <h4>TABLA BIBLIOTECAS</h4>
            <table class="table">
                <thead class="thead-dark">

                    <tr>
                        <th>id_biblioteca</th>
                        <th>tipo</th>
                        <th>nombre</th>
                        <th>direccion</th>
                        <th>cod_postal</th>
                        <th>telefono</th>
                        <th>web</th>
                        <th>email</th>
                        <th>catalogo</th>
                        <th>id_municipio</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($bibliotecas ?? [] as $biblioteca) : ?>
                    <tr>
                        <th scope="row"><?= $biblioteca->getIdBiblioteca() ?></th>
                        <td><?= $biblioteca->getTipo() ?></td>
                        <td><?= $biblioteca->getNombre() ?></td>
                        <td><?= $biblioteca->getDireccion() ?></td>
                        <td><?= $biblioteca->getCodPostal() ?></td>
                        <td><?= $biblioteca->getTelefono() ?></td>
                        <td><?= $biblioteca->getWeb() ?></td>
                        <td><?= $biblioteca->getEmail() ?></td>
                        <td><?= $biblioteca->getCatalogo() ?></td>
                        <td><?= $biblioteca->getIdMunicipio() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <!--</div>-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>