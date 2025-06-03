<!-- Modal Confirm Delete -->
<div class="modal fade" id="modal-delete-<?= $product['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i>Padam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Adakah anda mahu memadamkan produk? <strong><?= $product['name'] ?></strong> ?</p>
            </div>
            <div class="modal-footer">
                <a href="delete.php?id=<?= $product['id'] ?>" class="btn btn-outline-success">Padam</a>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->