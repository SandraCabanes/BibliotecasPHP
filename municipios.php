<?php
require_once 'entity/Municipio.php';
require_once 'core/App.php';
require_once 'repository/MunicipioRepository.php';
require_once 'database/Connection.php';

session_start();

if (!isset($_SESSION['id_prov'])) {
    $_SESSION['id_prov'] = $_GET['v1'];
}

$cod_municipio = '';

try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $connection = App::getConnection();
    $municipioRepository = new MunicipioRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cod_municipio = trim(htmlspecialchars($_POST['cod_municipio']));
        $municipio = new Municipio($cod_municipio, $_SESSION['id_prov']);
        $municipioRepository->save($municipio);
    }
    $municipios = $municipioRepository->findId($_SESSION['id_prov'], 'id_provincia');
} catch (QueryException $e) {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Municipios</title>
</head>
<body>
<div class="container">

    <h2>Directorio de bibliotecas de la Comunidad Valenciana</h2><br>
    <br>
    <h4>AÑADIR MUNICIPIO</h4>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label for="cod">Código municipio</label>
            <input type="text" class="form-control" id="cod" name="cod_municipio">
        </div>
        <div class="form-group">
            <label for="cod">Id provincia</label>
            <input class="form-control" type="text" placeholder="<?= $_SESSION['id_prov'] ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>

    <br>
    <br>
    <h4>TABLA MUNICIPIOS</h4>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>id_municipio</th>
            <th>cod_municipio</th>
            <th>id_provincia</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($municipios ?? [] as $municipio) : ?>
            <tr onclick="window.location.href='bibliotecas.php?v1=<?= $municipio->getIdMunicipio() ?>';">
                <th scope="row"><?= $municipio->getIdMunicipio() ?></th>
                <td><?= $municipio->getCodMunicipio() ?></td>
                <td><?= $municipio->getIdProvincia() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>