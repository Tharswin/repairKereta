<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<?php include("inc/headeradd.php") ?>
    <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == "created") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Sudah dikemaskini &nbsp;<a href="inputproduct.php" button type="submit" class="btn btn-success"> Klikdisini</button></a></strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_create") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>gagal dikemaskini</strong>
        </div>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Tambah Produk Baru</strong>
            </div>
            <div class="card-body">
                <form action="add.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="barcode" class="col-form-label">Barkod</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barkod" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Harga" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Kuantiti</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Kuantiti" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Gambar</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Gambar URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Penerangan</label>
                        <textarea name="description" id="" rows="5" class="form-control" placeholder="Penerangan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>&nbsp;<a href="inputproduct.php" button type="submit" class="btn btn-success"> page semula</button></a>
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
