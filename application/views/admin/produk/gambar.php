<?php
//notif upload error
if(isset($error)){
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
//notif error
echo validation_errors('<div class="alert alert-danger">', '</div>');

//untuk membuat form open
echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk),' class="form-horizontal"');
?>
<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Gambar</label>
    <div class="col-md-8">
        <input type="text" name="judul_gambar" class="form-control" placeholder="Gambarnya" value="<?php echo set_value('judul_gambar') ?>" required>
    </div>
</div>

<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Upload Gambar</label>
    <div class="col-md-4">
        <input type="file" name="gambar" class="form-control" placeholder="Upload Gambarnya" value="<?php echo set_value('gambar') ?>" required>
    </div>
    <div class="col-md-4">
        <button class="btn btn-sm btn-info" type="submit" name="submit">
            <i class="fa fa-save"></i> Oke Upload
        </button>
        <button class="btn btn-sm btn-warning" type="reset" name="reset">
            <i class="fa fa-times"></i> Ulangi Masszeh
        </button>
    </div>
</div>

<?php echo form_close(); ?>

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
            <th>Gambar</th>
            <th>Judul</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><?php echo $produk->nama_produk ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td>
               

            </td>
        </tr>
        <?php $no = 2; foreach($gambar as $gambar) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $gambar->judul_gambar ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" alt="" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td>
                <a href="<?php echo base_url('admin/produk/delete_gambar/'.$produk->id_produk.'/'.$gambar->id_gambar) ?>" class="btn btn-warning btn-xs" onclick="return confirm('Yakin mau dihapus?')"><i class="fa fa-trash-o"></i> Delete</a>

            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>