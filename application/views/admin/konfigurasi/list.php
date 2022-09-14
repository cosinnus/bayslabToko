<?php
    if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
?>
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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
?>
<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Web</label>
    <div class="col-md-8">
        <input type="text" name="namaweb" class="form-control" placeholder="Webnya" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tagline</label>
    <div class="col-md-8">
        <input type="text" name="tagline" class="form-control" placeholder="Taglinya" value="<?php echo $konfigurasi->tagline ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-8">
        <input type="email" name="email" class="form-control" placeholder="Emailnya" value="<?php echo $konfigurasi->email ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Website</label>
    <div class="col-md-8">
        <input type="text" name="website" class="form-control" placeholder="Webnya" value="<?php echo $konfigurasi->website ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Facebook</label>
    <div class="col-md-8">
        <input type="text" name="facebook" class="form-control" placeholder="FBnya" value="<?php echo $konfigurasi->facebook ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Instagram</label>
    <div class="col-md-8">
        <input type="text" name="instagram" class="form-control" placeholder="IGnya" value="<?php echo $konfigurasi->instagram ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Ponsel Number</label>
    <div class="col-md-8">
        <input type="text" name="telepon" class="form-control" placeholder="Hpnya" value="<?php echo $konfigurasi->telepon ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-md-10">
        <textarea name="alamat" class="form-control"><?php echo $konfigurasi->alamat ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Keywords Produk</label>
    <div class="col-md-10">
        <textarea name="keywords" class="form-control"><?php echo $konfigurasi->keywords ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Metatext</label>
    <div class="col-md-10">
        <textarea name="metatext" class="form-control"><?php echo $konfigurasi->metatext ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Deskrispsi</label>
    <div class="col-md-10">
        <textarea name="deskripsi" class="form-control"><?php echo $konfigurasi->deskripsi ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Rekening Bank</label>
    <div class="col-md-10">
        <textarea name="rekening_pembayaran" class="form-control"><?php echo $konfigurasi->rekening_pembayaran ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-sm btn-info" type="submit" name="submit">
            <i class="fa fa-save"></i> Oke Masszeh
        </button>
        <button class="btn btn-sm btn-warning" type="reset" name="reset">
            <i class="fa fa-times"></i> Ulangi Masszeh
        </button>
    </div>
</div>

<?php echo form_close(); ?>