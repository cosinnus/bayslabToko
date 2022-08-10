<?php
//notif error
echo validation_errors('<div class="alert alert-danger">', '</div>');

//untuk membuat form open
echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori),' class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">Nama Kategori</label>
    <div class="col-md-5">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Kategorinya" value="<?php echo $kategori->nama_kategori ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Urutan</label>
    <div class="col-md-5">
        <input type="number" name="urutan" class="form-control" placeholder="Urutannya" value="<?php echo $kategori->urutan ?>" required>
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