<?php
$page = 'user';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include('crud.php');
include('koneksi.php');

if (isset($_POST['tambahuser'])) {
    $password = $_POST['password'];
    $pwhash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES ('','$_POST[nama]','$_POST[username]','$pwhash')");
}

if (isset($_POST['ubahuser'])) {
    $password = $_POST['password'];
    $pwhash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE user SET nama='$_POST[nama]', username='$_POST[username]', password='$pwhash' WHERE id='$_POST[id]'");
}


if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteUser($id);
}

include ('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" data-toggle="modal" data-target="#ModalTambah" class="btn btn-info btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                         <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>

                <!-- Modal Add User -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="ModalTambah">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="user.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <span id="check-username"></span>
                <input type="text" name="username" id="username" class="form-control" onInput="checkUsername()" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="tambahuser" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Add User -->


<script>
    function checkUsername(){
        jQuery.ajax({
            url: "check.php",
            data: 'username='+$("#username").val(),
            type: "POST",
            success:function(data){
                $("#check-username").html(data);
            },
            error:function(){}
        });
    }
</script>


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Opsi</th>
                </tr>
                                            
            </thead>
            <tbody>
            <?php
                require 'koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM user WHERE id NOT IN (1)");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td><?php echo "**********" ?></td>
                        <td>
                            <a href="" data-toggle="modal" data-target="#ModalEdit<?php echo $no; ?>" class="btn btn-warning btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span class="text">Ubah</span>
                            </a>

                            <!-- Modal Edit User -->
                            <div class="modal fade" id="ModalEdit<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>
                                    <form action="user.php" method="POST">
                                        <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                            <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="username" name="username" id="username" class="form-control" value="<?php echo $d['username']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="ubahuser" class="btn btn-primary">Simpan</button>
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

                            <!-- Modal Delete User -->
                            <div class="modal fade" id="ModalHapus<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="user.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <div class="modal-body">
                                Apakah anda yakin ingin menghapus user "<?php echo $d['nama']; ?>"?
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="delete" class="btn btn-secondary">Ya, Hapus</button>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>
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