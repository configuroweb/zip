<?php
if (isset($_POST['cargar_archivo'])) {
  $uploadfile = $_FILES["file"]["tmp_name"];
  $folder = "comprimidos/";
  $file_name = $_FILES["file"]["name"];
  move_uploaded_file($_FILES["file"]["tmp_name"], "$folder" . $_FILES["file"]["name"]);

  $zip = new ZipArchive(); // Load zip library 
  $zip_name = "configuroweb.zip"; // Nombre de Fichero ZIP
  if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE) {
    // Agregamos ficheros al comprimido
    $zip->addFile("comprimidos/" . $file_name);

    // Cerramos la compresion
    $zip->close();
    // Declaramos una variable para mostrar mensaje 
    $resultado = "ok";
  } else {
    $resultado = "no";
  }
}
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Script PHP para comprimir archivos en ZIP</title>
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">

</head>

<body>

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">ConfiguroWeb</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./index.html">Inicio <span class="sr-only">(current)</span></a>
          </li>

        </ul>

      </div>
    </nav>
  </header>

  <!-- Begin page content -->

  <div class="container">
    <h3 class="mt-5">Visualizamos archivo creado</h3>
    <hr>

    <div class="row">
      <div class="col-12 col-md-6">
        <!-- Contenido -->
        <?php
        if ($resultado = "ok") {
          echo "<div class='alert alert-primary' role='alert'>";
          echo "Archivo fichero ZIP ha sido creado  <a href='$zip_name'>DESCARGAR AHORA</a>";
          echo "</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>";
          echo "No se pudo crear el fichero ZIP";
          echo "</div>";
        }
        ?>
        <br>
        <!-- Fin Contenido -->
      </div>
    </div><!-- Fin row -->


  </div><!-- Fin container -->
  <footer class="footer">
    <div class="container">
      <span class="text-muted">
        <p>Para más desarrollos accede a <a href="https://www.configuroweb.com/" target="_blank">ConfiguroWeb</a></p>
      </span>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="assets/js/vendor/popper.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
</body>

</html>