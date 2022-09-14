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
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
?>
<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Produk</label>
    <div class="col-md-8">
        <input type="text" name="nama_produk" class="form-control" placeholder="Produknya" value="<?php echo $produk->nama_produk ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kode Produk</label>
    <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control" placeholder="Kodenya" value="<?php echo $produk->kode_produk ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kategori Produk</label>
    <div class="col-md-5">
        <select name="id_kategori" class="form-control">
            <option value="#" disabled> --Pilihan-- </option>
            <?php foreach($kategori as $kategori) { ?>
                <option value="<?php echo $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>>
                <?php echo $kategori->nama_kategori ?>
            </option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Harga Produk</label>
    <div class="col-md-5">
        <input type="number" name="harga" class="form-control" placeholder="Harganya" value="<?php echo $produk->harga ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Stok Produk</label>
    <div class="col-md-5">
        <input type="number" name="stok" class="form-control" placeholder="Stoknya" value="<?php echo $produk->stok ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Berat Produk</label>
    <div class="col-md-5">
        <input type="text" name="berat" class="form-control" placeholder="Beratnya" value="<?php echo $produk->berat ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Ukuran Produk</label>
    <div class="col-md-5">
        <input type="text" name="ukuran" class="form-control" placeholder="Ukurannya" value="<?php echo $produk->ukuran ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Keterangan Produk</label>
    <div class="col-md-10">
        <textarea name="keterangan" class="form-control" id="editor"><?php echo $produk->keterangan ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Keywords Produk</label>
    <div class="col-md-10">
        <textarea name="keywords" class="form-control"><?php echo $produk->keywords ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Produk</label>
    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Status Produk</label>
    <div class="col-md-10">
        <select name="status_produk" class="form-control">
            <option value="#" disabled> --Pilihan-- </option>
            <option value="Publish">Posting</option>
            <option value="Draft" <?php if($produk->status_produk=="Draft") { echo "selected"; } ?>>Simpan dulu</option>
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