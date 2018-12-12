<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Panel</title>
  <!-- Favicon -->
  <link href="<?=base_url('publico')?>/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?=base_url('publico')?>/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?=base_url('publico')?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?=base_url('publico')?>/assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
        aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="<?=base_url('publico/img/')?>computel.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <!-- <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">ç -->
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenido! <?=$this->session->userdata('usuario')?></h6>
            </div>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url('Panel/salir')?>" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Salir</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="<?=base_url('publico/img/')?>computel.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?=base_url('Panel')?>">
              <i class="ni ni-tv-2 text-primary"></i> Admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Panel/captura')?>">
              <i class="ni ni-pin-3 text-orange"></i> Captura
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Panel/usuarios')?>">
              <i class="ni ni-single-02 text-yellow"></i> Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Panel/supervisor')?>">
              <i class="ni ni-circle-08 text-pink"></i> Supervisor
            </a>
          </li>
        </ul>


      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" >Capturado: <?=number_format(($lista['conteo'] / 53244) * 100, 2, '.', ',');?> %</a>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?=base_url('publico/img/')?>user.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">
                    <?=$this->session->userdata('usuario')?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenido!</h6>
              </div>

              <div class="dropdown-divider"></div>
              <a href="<?=base_url('Panel/salir')?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Salir!</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <!-- Header -->
    <div class="header bg-gradient-primary pb-1 pt-2 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">

        </div>
      </div>
    </div>

    <div class="form-group mb-3">
      <div class="input-group input-group-alternative">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
        </div>


        <input value="" class="form-control" placeholder="Código de producto" name="Cproducto" id="Cproducto"  type="text" maxlength="11" minlength="0">
        <button type="button" onclick="Actualizador()">Buscar</button>
        <button type="button" onclick="refresh()">Actualizar Todo</button>
      </div>
    </div>

    <div class="progress">
      <div class="progress-bar bg-info" role="progressbar" style="width: <?=number_format(($lista['conteo'] / 53244) * 100, 2, '.', '')?>%" aria-valuenow="<?=number_format(($lista['conteo'] / 53244) * 100, 2, '', '')?>" aria-valuemin="0" aria-valuemax="100"><?=number_format(($lista['conteo'] / 53244) * 100, 2, '', '')?></div>
    </div>
          <div id="dibujador">
<table class="table table-striped" >
          <thead>
            <tr>
              <td><b>Código</b></td>
              <td><b>Descripción</b></td>
              <td><b>Resguardo</b></td>
              <td><b>*Resguardo</b></td>
              <td><b>Picking</b></td>
              <td><b>*Picking</b></td>
              <td><b>Otros</b></td>
              <td><b>Conteo Actual</b></td>
              <td><b>Crescendo</b></td>
              <td><b>Diferencia</b></td> 
            </tr>
          </thead>
          <?php
foreach ($lista['datos']->result() as $key => $data) {
    ?>
          <tr>
            <td><?=$data->P_CodeProduct?></td>
            <td><?=$data->P_Description?></td>
            <td><?=$data->P_Conteo1?></td>
            <td><?=$data->P_Resguardo?></td>
            <td><?=$data->P_Conteo2?></td>
            <td><?=$data->P_Localizacion?></td>
            <td><?=$data->P_Conteo3?></td>
            <td><?=$data->ConteoT?></td>
            <td><?=$data->Exis?></td>
            <td><?=$data->Diferencia?></td>
          </tr>
          <?php
}
?>
        </table>
      </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?=base_url('publico')?>/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url('publico')?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="<?=base_url('publico')?>/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?=base_url('publico')?>/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?=base_url('publico')?>/assets/js/argon.js?v=1.0.0"></script>
  <script>
    function Actualizador() {
      var pintar= document.getElementById('dibujador');
      var caja=document.getElementById('Cproducto').value;
      var base_url=window.location.origin;
      $.ajax({
              url: base_url+"/Panel/FiltroAdmin",
              type: "post",
              data:{ 'caja':caja },
              dataType:'html',
              beforeSend: function (jqXHR, settings) {
                  var self = this;
                  var xhr = settings.xhr;
                  settings.xhr = function () {
                      var output = xhr();
                      output.onreadystatechange = function () {
                          if (typeof(self.readyStateChanged) == "function") {
                              self.readyStateChanged(this);
                          }
                      };
                      return output;
                  };
              },
              readyStateChanged: function (xhr) {
                  if (xhr.readyState < 4) {
                      pintar.innerHTML='<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="sr-only">60% Complete</span></div></div>';
                  }
              },
              success: function(data){
                  pintar.innerHTML=data;
              },
              error: function(data) {
                  pintar.innerHTML=data[0];

              }
          });
    }

    function refresh()
    {
      window.location.reload();
    }
  </script>
</body>

</html>