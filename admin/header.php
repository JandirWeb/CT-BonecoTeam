<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administração CT Boneco TEAM</title>
  
  
  <!-- Custom CSS -->
  <link href="css/custom.css" rel="stylesheet" type="text/css">    
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom CSS -->
  <!--<link href="css/custom.css" rel="stylesheet" type="text/css">-->
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">CT Boneco Team</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Alunos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAlunos" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Alunos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAlunos">
            <li>
              <a href="alunos.php">Todos</a>
            </li>
            <li>
              <a href="matricular.php">Matricular</a>
            </li>
          </ul>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gráficos">
          <a class="nav-link" href="graficos.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Gráficos</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Faturas">
          <a class="nav-link" href="faturas.php">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Faturas</span>
          </a>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configurações">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConfiguracoes" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gears"></i>
            <span class="nav-link-text">Configurações</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseConfiguracoes">
            <li>
              <a href="usuarios.php">Usuários</a>
            </li>
            <li>
              <a href="novo-usuario.php">Cadastrar Usuário</a>
            </li>  
          </ul>
        </li>  
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <!--Nome do usuário-->
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>