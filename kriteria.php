<?php
$page = 'kriteria';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include ('crud.php');

if (isset($_POST['tambahkrt'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    tambahKrt($id,$nama);
}

if (isset($_POST['ubahkrt'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    ubahKrt($id,$nama);
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteKriteria($id);
}

include ('header.php');
?>

<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Kriteria</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="#" data-toggle="modal" data-target="#ModalTambah" class="btn btn-info btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>


                                <!-- Modal Add Kriteria -->

        <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="ModalTambah">Tambah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="kriteria.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="hidden" name="id">
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahkrt" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
        </div>
        </div>
                                <!-- End of Modal Add Kriteria -->
                        
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Opsi</th>
                </tr>
            </thead>
                                    
            <tbody>
            <?php
                require 'koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM kriteria");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama']; ?></td>

                    <td>
                        <a href="" data-toggle="modal" data-target="#ModalEdit<?php echo $d['id']; ?>" class="btn btn-warning btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                            </span>
                            <span class="text">Ubah</span>
                        </a>

                                <!-- Modal Edit Kriteria -->

        <div class="modal fade" id="ModalEdit<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="kriteria.php" method="POST">
                    <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Kriteria</label>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" required>
                    </div>
                    
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahkrt" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
                                <!-- End of Modal Edit User -->

                                                
            <a href="" data-toggle="modal" data-target="#ModalHapus<?php echo $d['id']; ?>" class="btn btn-danger btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus</span>
            </a>


                            <!-- Modal Delete Kriteria -->

        <div class="modal fade" id="ModalHapus<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="kriteria.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                <div class="modal-body">
                Apakah anda yakin ingin menghapus kriteria "<?php echo $d['nama']; ?>"?
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