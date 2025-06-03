<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<?php 
// Include database connection
require("db_conn.php");

try {
    // Create sql statment
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

?>
<?php include("inc/headproduct.php") ?><br>
    <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == "Berjaya_Padam") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Berjaya Padam</strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "Gagal_padam") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Gagal Padam</strong>
        </div>
        <?php endif ?>
        <!-- Table Product -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Produk Alat Ganti Kereta</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">Jadual-jadual Alat Ganti Kereta</h5>
                    <a href="create.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Tambah Produk </a>
                    <a href="print.php" class="btn btn-success float-right mb-3"><i class="fa fa-print"></i> Cetak </a>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Barkod</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kuantiti</th>
                         <th>Penerangan</th>
                        <th style="width: 20%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result->rowCount() > 0) : ?>
                    <?php foreach ($result as $product) : ?>
                    <tr>
                        <td><?= $product['barcode'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td>RM<?= number_format($product['price'], 2) ?></td>
                        <td><?= $product['qty'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td>
                            <a href="show.php?id=<?=$product['id']?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                            <a href="edit.php?id=<?=$product['id']?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?= $product['id'] ?>"><i class="fa fa-trash"></i></a>
                            <?php include("inc/modal.php") ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
                
                </tbody>
               
            </table>
            
        </div>
      </div>
     
      <!-- End Table Product -->
      <br>
    </div><!-- /.container --><br><br><br><br><br><br>
    
<?php include("inc/footer.php") ?>
<?php 
}else {
   header("Location: login.php");
}
 ?>