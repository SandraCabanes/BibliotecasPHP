<?php
require_once 'entity/Provincia.php';
require_once 'core/App.php';
require_once 'repository/ProvinciaRepository.php';
require_once 'database/Connection.php';

session_start();

$cod_provincia = '';
$nom_provincia = '';
$_SESSION['id_mun']=null;
$_SESSION['id_prov']=null;

try {


    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $connection = App::getConnection();
    $provinciaRepository = new ProvinciaRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cod_provincia = trim(htmlspecialchars($_POST['cod_provincia']));
        $nom_provincia = trim(htmlspecialchars($_POST['nom_provincia']));

        $provincia = new Provincia($cod_provincia, $nom_provincia);
        $provinciaRepository->save($provincia);
    }

    $provincias = $provinciaRepository->findAll();
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

    <title>Provincias</title>
</head>
<body>

<div class="container">
    <h2>Directorio de bibliotecas de la Comunidad Valenciana</h2><br>

    <br>
    <h4>AÑADIR PROVINCIA</h4>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label for="cod">Código provincia</label>
            <input type="text" class="form-control" id="cod" name="cod_provincia">
        </div>
        <div class="form-group">
            <label for="nom">Nombre provincia</label>
            <input type="text" class="form-control" id="nom" name="nom_provincia">
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>

    <br>
    <br>
    <h4>TABLA PROVINCIAS</h4>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>id_provincia</th>
            <th>cod_provincia</th>
            <th>nom_provincia</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($provincias ?? [] as $provincia) : ?>
            <tr onclick="window.location.href='municipios.php?v1=<?= $provincia->getIdProvincia() ?>';">
                <th scope="row"><?= $provincia->getIdProvincia() ?></th>
                <td><?= $provincia->getCodProvincia() ?></td>
                <td><?= $provincia->getNomProvincia() ?></td>
            </tr>
            </a>
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