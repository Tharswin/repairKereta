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

<?php include("inc/headershow.php") ?>
    <div class="container">
        <!-- Show  a Product -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-database"></i> Semak Produk</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Barkod</th>
                                <td><?= $product['barcode'] ?></td>
                                <th>Nama produk</th>
                                <td><?= $product['name'] ?></td>
                            </tr>   
                            <tr>
                                <th>Harga</th>
                                <td>RM<?= number_format($product['price'], 2) ?></td>
                                <th>Kuantiti</th>
                                <td><?= $product['qty'] ?></td>
                            </tr>  
                            <tr>
                                <th>Penerangan</th>
                                <td colspan="3"><?= $product['description'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid img-thumbnail">
                    </div>
                    <a href="inputproduct.php" button type="submit" class="btn btn-success">Page semula</button></a>
                </div>
            </div>
        </div>
        <!-- End Show a product -->
        <br>
    </div><!-- /.container -->
<?php include("inc/footer.php") ?>
    

<?php 
}else {
   header("Location: login.php");
}
 ?>
 