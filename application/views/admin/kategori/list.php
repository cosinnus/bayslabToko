<h1>
    <a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"> Tambah Kategori</i></a>
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
            <th>Slug</th>
            <th>Urutan</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($kategori as $kategori) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $kategori->nama_kategori ?></td>
            <td><?php echo $kategori->slug_kategori ?></td>
            <td><?php echo $kategori->urutan ?></td>
            <td>
                <a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-retweet"></i> Edit</a>

                <a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin nih !!')"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>