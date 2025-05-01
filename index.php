<?php
session_start();
require_once("src/php/database.php");

$conn = DDBB();

if(isset($_SESSION["check"])){
$mensaje = $_SESSION["check"] ? "¡La Tarea Ha Sido Realizada Exitosamente!" : "Ha Ocurrido Un Error Realizando La Tarea";

$alerta = "<div class='alert alert-warning user-select-none' role='alert'>$mensaje</div>";
echo $alerta;

unset($_SESSION["check"]);
}

$sqlPri = mysqli_query($conn, "SELECT * FROM t_prioritarias WHERE status = '1'");
$sqlEsp = mysqli_query($conn, "SELECT * FROM t_prioritarias INNER JOIN t_espera ON t_prioritarias.id_priori = t_espera.id_tarea WHERE status = '0'");
$sqlPro = mysqli_query($conn, "SELECT * FROM t_prioritarias INNER JOIN t_pro ON t_prioritarias.id_priori = t_pro.id_pro WHERE status = '2'");
$sqlFin = mysqli_query($conn, "SELECT * FROM t_prioritarias INNER JOIN t_finz ON t_prioritarias.id_priori = t_finz.id_finz WHERE status = '3'");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TABLERO KANBAN</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="src/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/fonts/bootstrapIcons/bootstrap-icons.css">
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
    <header></header>
  </head>
  <body class="">

  <section class="container Josefin_Sans user-select-none">
    <p class="h1 Josefin_Sans">TABLERO KANBAN</p>

    <button class="btn btn-primary mb-4 shadow-lg" id="showFiles">Bandeja De Entrada</button>
    <article class="row shadow-lg border border-dark">
      <!-- Prioritario -->
      <article class="col col-12 col-md-3 text-bg-dark shadow-lg">
        <p class="fw-bold text-center">Tareas Prioritarias</p>
        <?php
          while($datos = mysqli_fetch_array($sqlPri)){
            echo "<p class='fw-bold text-center text-bg-light p-2 optionsPri' count='{$datos['id_priori']}' data-bs-toggle='tooltip' data-bs-placement='right' data-bs-title='
              Descripción: {$datos['dsc']},
              Duración: {$datos['tiempo']} {$datos['modl']},
              Fecha Y Hora De Entrada: {$datos['f_h']},
              Publicado Por: {$datos['persona']}
            '>{$datos['tit']}</p>";
          }
        ?>
      </article>
      <!-- En Progreso -->
      <article class="col col-12 col-md-3 text-bg-success shadow-lg">
        <p class="fw-bold text-center">Tareas en Progreso</p>
        <?php
          while($datos = mysqli_fetch_array($sqlPro)){
            echo "<p class='fw-bold text-center text-bg-light p-2 optionsProg' pers='{$datos['persona_pro']}' count='{$datos['id_priori']}' data-bs-toggle='tooltip' data-bs-placement='right' data-bs-title='
              Descripción: {$datos['dsc']},
              Duración: {$datos['tiempo']} {$datos['modl']},
              Fecha Y Hora De Entrada: {$datos['f_h']},
              Publicado Por: {$datos['persona']},
            '>{$datos['tit']}</p>";
          }
        ?>
      </article>
      <!-- En Espera -->
      <article class="col col-12 col-md-3 text-bg-dark shadow-lg">
        <p class="fw-bold text-center">Tareas en Espera</p>
        <?php
          while($datos = mysqli_fetch_array($sqlEsp)){
            echo "<p class='fw-bold text-center text-bg-light p-2 optionsEspe' count='{$datos['id_priori']}' data-bs-toggle='tooltip' data-bs-placement='right' data-bs-title='
              Descripción: {$datos['dsc']},
              Duración: {$datos['tiempo']} {$datos['modl']},
              Fecha Y Hora De Entrada: {$datos['f_h']},
              Publicado Por: {$datos['persona']},
              Suspendido Por: {$datos['persona_esp']},
              Motivo De Espera: {$datos['motivo']}
              Fecha Y Hora De Espera: {$datos['f_h_e']}
            '>{$datos['tit']}</p>";
          }
        ?>
      </article>
      <!-- Finalizados -->
      <article class="col col-12 col-md-3 text-bg-success shadow-lg">
        <p class="fw-bold text-center">Tareas Finalizadas</p>
        <?php
          while($datos = mysqli_fetch_array($sqlFin)){
            echo "<p class='fw-bold text-center text-bg-light p-2' count='{$datos['id_priori']}' data-bs-toggle='tooltip' data-bs-placement='right' data-bs-title='
              Descripción: {$datos['dsc']},
              Duración: {$datos['tiempo']} {$datos['modl']},
              Fecha Y Hora De Entrada: {$datos['f_h']},
              Publicado Por: {$datos['persona']},
              Fecha Y Hora De Finalización: {$datos['f_h_f']},
              Completada Por: {$datos['persona_fin']}

            '>{$datos['tit']}</p>";
          }
        ?>
      </article>


    </article>
  </section>





  <div id="formu"></div>
  <div id="optionMenu"></div>
  <div id="optionMenuWait"></div>  
  <div id="optionsProg"></div>  



  <footer class="fixed-bottom d-flex justify-content-center text-bg-secondary" id="copy">
  </footer>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="src/js/bootstrap.bundle.js.map"></script>
    <script src="src/js/bootstrap.bundle.min.js.map"></script> -->
    <script src="src/js/tooltips.js"></script>
    <script src="src/js/main.js"></script>

  </body>
</html>