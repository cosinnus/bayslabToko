<?php
//notif error
echo validation_errors('<div class="alert alert-danger">', '</div>');

//untuk membuat form open
echo form_open(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">Nama Produk</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Produknya" value="<?php echo $produk->nama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Emailnya" value="<?php echo $produk->email ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Produkname</label>
    <div class="col-md-5">
        <input type="text" name="produkname" class="form-control" placeholder="Produknamenya" value="<?php echo $produk->produkname ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="Passwordnya" value="<?php echo $produk->password ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Level</label>
    <div class="col-md-5">
        <select name="akses_level" class="form-control">
            <option value="#" disabled> --Pilihan-- </option>
            <option value="admin">Admin</option>
            <option value="produk" <?php if($produk->akses_level == "Produk") {echo "selected"; } ?> >Produk</option>
        </select>
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