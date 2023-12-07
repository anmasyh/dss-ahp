<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pendukung Keputusan AHP</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK <sup>AHP</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($page=='index'){echo 'active';} ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main Menu
            </div>

            <!-- Nav Item - Kriteria Menu -->
            <li class="nav-item <?php if($page=='kriteria'){echo 'active';} ?>">
                <a class="nav-link" href="kriteria.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Kriteria</span></a>
            </li>

            <!-- Nav Item - Alternatif Menu -->
            <li class="nav-item <?php if($page=='subkriteria'){echo 'active';} ?>">
                <a class="nav-link" href="subkriteria.php">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Subkriteria</span></a>
            </li>

            <!-- Nav Item - Alternatif Menu -->
            <li class="nav-item <?php if($page=='alternatif'){echo 'active';} ?>">
                <a class="nav-link" href="alternatif.php">
                    <i class="fas fa-fw fa-code-branch"></i>
                    <span>Alternatif</span></a>
            </li>

            <!-- Nav Item - Perhitungan Menu -->
            <li class="nav-item <?php if($page=='hitung-kriteria'||$page=='hitung-alternatif'||$page=='bobot-hasil'||$page=='output' || $page=='hitung-subkriteria'){echo 'active';} ?>"">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-calculator"></i>
                    <span>Perhitungan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Lakukan Perhitungan:</h6>
                        <a class="collapse-item <?php if($page=='hitung-kriteria'){echo 'active';} ?>" href="bobot_kriteria.php">Kriteria</a>
                        <a class="collapse-item <?php if($page=='hitung-subkriteria'){echo 'active';} ?>" href="bobotsub.php?c=1">Subkriteria</a>
                        <a class="collapse-item <?php if($page=='hitung-alternatif'){echo 'active';} ?>" href="bobot_alt.php">Alternatif</a>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Hasil -->
            <li class="nav-item <?php if($page=='hasil'){echo 'active';} ?>"">
                <a class="nav-link" href="hasil_subkrt.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Hasil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Users Menu -->
            <li class="nav-item <?php if($page=='user'){echo 'active';} ?>"">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                

                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                

            


    

