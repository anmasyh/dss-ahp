<?php
$page = 'index';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include ('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <center><h1 class="h3 mb-0 text-gray-800">Selamat Datang di Sistem Pendukung Keputusan Bantuan Sosial PKH Metode Analytical Hierarchy Process</h1></center>
</div>
<br>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h5 class="h5 mb-0 text-gray-800">Quick Access:</h5>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Card for Kriteria -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="kriteria.php" style="text-decoration: none;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                KRITERIA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'koneksi.php';

                                $result=mysqli_query($conn, "SELECT COUNT(*) as total FROM kriteria");
                                $data=mysqli_fetch_assoc($result);
                                echo $data['total'];
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Card for Alternatif  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="alternatif.php" style="text-decoration: none;">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                ALTERNATIF</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'koneksi.php';

                                $result=mysqli_query($conn, "SELECT COUNT(*) as total FROM alternatif");
                                $data=mysqli_fetch_assoc($result);
                                echo $data['total'];
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-code-branch fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Card for Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="user.php" style="text-decoration: none;">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">User
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        require 'koneksi.php';

                                        $result=mysqli_query($conn, "SELECT COUNT(*) as total FROM user WHERE id NOT IN (1)");
                                        $data=mysqli_fetch_assoc($result);
                                        echo $data['total'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Card for Perhitungan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <nav>
        <a href="#" style="text-decoration: none;" data-toggle="dropdown">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                PERHITUNGAN</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">...</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <div class="dropdown-menu animated--fade-in">
        
            <a class="dropdown-item" href="bobot_kriteria.php">
                <div class="text-s font-weight-bold text-dark text-uppercase">#KRITERIA</div>    
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="bobotsub.php?c=1">
                <div class="text-s font-weight-bold text-dark text-uppercase">#SUBKRITERIA</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="bobot_alt.php">
                <div class="text-s font-weight-bold text-dark text-uppercase">#ALTERNATIF</div>
            </a>
        
        </div>
        </nav>
    </div>
</div>

<!-- Content Row -->

<div class="row">


    
</div>


</div>
<?php
include ('footer.php');
?>