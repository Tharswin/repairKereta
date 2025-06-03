<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<?php 
require("db_conn.php");
$id = $_GET['id'] ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: index.php");
    exit();
}
$product = $stmt->fetch();
?>

<?php include("inc/headerupdate.php") ?>
    <div class="container">
    
        <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Sudah dikemaskini <a href="inputproduct.php" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i>Klik disini</a></strong></strong></strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Gagal Kemaskini</strong>
        </div>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-edit"></i> Edit Produk</strong>
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="barcode" class="col-form-label">Barkod</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barkod" required value="<?= $product['barcode'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required value="<?= $product['name'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="harga" required value="<?= $product['price'] ?>" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Kuantiti</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="kuantiti" required value="<?= $product['qty'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Gambar</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Gambar URL" value="<?= $product['image'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Penerangan</label>
                        <textarea name="description" id="" rows="5" class="form-control" placeholder="penerangan"><?= $product['description'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>&nbsp;<a href="inputproduct.php" button type="submit" class="btn btn-success"> Page semula</button></a>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php include("inc/footer.php") ?>
<?php 
}else {
   header("Location: login.php");
}
 ?>