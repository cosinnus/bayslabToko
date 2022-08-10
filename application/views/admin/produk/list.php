<h1>
    <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"> Tambah Produk</i></a>
</h1>

<?php
    if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
?>
<table class="table table-striped table-bordered table-hover" id="example1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Status Barang</th>
            <th>Gambar</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($produk as $produk) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $produk->nama_produk ?></td>
            <td><?php echo $produk->nama_kategori ?></td>
            <td><?php echo number_format($produk->harga,'0',',','.') ?></td>
            <td><?php echo $produk->status_produk ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td>
                <a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-retweet"></i> Edit</a>

                <a href="<?php echo base_url('admin/produk/delete/'.$produk->id_produk) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin nih !!')"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>