<?php

require_once 'models/dashboardModel.php';







if (session_status() === PHP_SESSION_ACTIVE) {
  //echo "La sesión está activa.";
  $usuario            = $_SESSION['usuario'];
  $id_usuario         = $_SESSION['user_id'];
  $rol                = $_SESSION['rol_usuario'];
} else {
  //echo "La sesión no está activa.";
  session_start();
  $usuario            = $_SESSION['usuario'];
  $id_usuario         = $_SESSION['user_id'];
  $rol           = $_SESSION['rol_usuario'];
}


?>
<style>
  /* Img Logos */
  .container2 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 36px;
    justify-content: center;
    /* background: red; */
    align-items: center;
    position: relative;
    left: 169px;
    width: 84%;
  }

  .img1 {
    width: 70%;
    position: relative;
    left: 32%;
  }

  .img2 {
    width: 54%;
    /* text-align: center; */
    margin-left: 150px;
  }

  .img3 {
    width: 50%;
    margin-left: 95px;
  }

  /* Img Logos */
</style>
<div class="pagetitle">
  <h1>Auditoria"</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Incio</a></li>
      <li class="breadcrumb-item active">Panel</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<?php

?>