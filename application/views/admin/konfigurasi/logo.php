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
echo form_open_multipart(base_url('admin/konfigurasi/logo'),' class="form-horizontal"');
?>
<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Web</label>
    <div class="col-md-8">
        <input type="text" name="namaweb" class="form-control" placeholder="Webnya" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Logo Baru</label>
    <div class="col-md-8">
        <input type="file" name="logo" class="form-control" placeholder="Upload logo baru" value="<?php echo $konfigurasi->logo ?>" required><br>
        Logo yg lama: <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" width="200">
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