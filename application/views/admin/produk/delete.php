<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk ?>">
    <i class="fa fa-trash-o"> Hapus</i>
</button>

<div class="modal fade" id="delete-<?php echo $produk->id_produk ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus - <?php echo $produk->nama_produk ?> </h4>
        </div>
        <div class="modal-body">
            <div class="callout callout-warning">
                <h4>Reminder!</h4>
                Yakin maasszhee mau dihapus!!, <strong>(<?php echo $produk->nama_produk ?>)</strong> ???
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>
        <a href="<?php echo base_url('admin/produk/delete/'.$produk->id_produk) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>