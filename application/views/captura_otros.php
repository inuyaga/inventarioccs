<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Captura de Piking</title>
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
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenido!</h6>
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('Panel')?>">
                            <i class="ni ni-tv-2 text-primary"></i> Admin
                        </a>
                    </li>
                    <li class="nav-item active">
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
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Panel</a>

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
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
        <br>
        <form action="<?=base_url('Panel/set_caprura_prod_otros')?>" method="POST">
            <div class="form-row">
                <div class="col">
                    <label>Cantidad</label>
                    <input type="number" class="form-control" name="conteo1" placeholder="Catidad encontrada" required>
                </div>
                <div class="col">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" name="descripcion_anexo" placeholder="Describa la ubicacion y comentarios"
                        minlength="10" required>
                </div>
                <div class="col">
                    <label>Codigo</label>
                    <input type="text" class="form-control" name="id" name="id" value="<?=$id?>" placeholder="Catidad encontrada"
                        readonly>
                </div>
                <div class="col">
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
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
</body>

</html>