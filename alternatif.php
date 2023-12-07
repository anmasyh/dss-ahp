<?php
$page = 'alternatif';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include 'crud.php';

if(isset($_POST['tambahalt'])) {
    $id = $_POST['id'];
    $no = $_POST['no_kk'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    tambahAlt($id,$no,$nama,$alamat);
}

if (isset($_POST['ubahalt'])) {
    $id = $_POST['id'];
    $no = $_POST['no_kk'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    ubahAlt($id,$no,$nama,$alamat);
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteAlternatif($id);
}


include ('header.php');
include('excel.php');
?>

<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Alternatif</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" data-toggle="modal" data-target="#ModalTambah" class="btn btn-info btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
                <a href="#" data-toggle="modal" data-target="#ModalExcel" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Upload Excel</span>
                </a>
                <br><br>

                                <!-- Modal Add Alternatif -->

        <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="ModalTambah">Tambah Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor KK</label>
                        <input type="hidden" name="id">
                        <input type="text" name="no_kk" class="form-control" placeholder="" pattern="[0-9]{1}[0-9]{15}" title="Masukkan 16 digit angka!" required>
                    </div>
                    <div class="form-group">
                        <label>Nama KK</label>
                        <input type="text" name="nama" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahalt" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
        </div>
        </div>

                                <!-- End of Modal Add Alternatif -->
        
                                <!-- Modal Upload Excel -->
        <div class="modal fade" id="ModalExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="ModalTambah">Upload file dari Microsoft Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="" method="POST" enctype="multipart/form-data"> 
                <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="filexls" class="form-control">
                </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" name="submit"  class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="text">Upload</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
        </div>
        


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor KK</th>
                    <th>Nama KK</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
                                    
            <tbody>
            <?php
                require 'koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM alternatif");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['no_kk']; ?></td>
                    <td><?php echo $d['nama'];?></td>
                    <td><?php echo $d['alamat'];?></td>

                    <td>
                        <a href="" data-toggle="modal" data-target="#ModalEdit<?php echo $no; ?>" class="btn btn-warning btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Ubah</span>
                        </a>


                                <!-- Modal Edit Alternatif -->

        <div class="modal fade" id="ModalEdit<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="alternatif.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <div class="form-group">
                        <label>Nomor KK</label>
                        <input type="text" name="no_kk" class="form-control" value="<?php echo $d['no_kk']; ?>" pattern="[0-9]{1}[0-9]{15}" title="Masukkan 16 digit angka!" required>
                    </div>
                    <div class="form-group">
                        <label>Nama KK</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>" required>
                    </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahalt" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
                                <!-- End of Modal Edit User -->

                                                
            <a href="" data-toggle="modal" data-target="#ModalHapus<?php echo $no; ?>" class="btn btn-danger btn-icon-split btn-sm">
            <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus</span>
            </a>


                            <!-- Modal Delete Kriteria -->

        <div class="modal fade" id="ModalHapus<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="alternatif.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                <div class="modal-body">
                Apakah anda yakin ingin menghapus alternatif "<?php echo $d['nama']; ?>"?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" name="delete" class="btn btn-secondary">Ya, Hapus</button>
                </div>
                </form>
                </div>
            </div>
        </div>
                            <!-- End of Modal Delete Kriteria -->


                            </td>
                        </tr>

                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>    

<?php
include 'footer.php';
?>