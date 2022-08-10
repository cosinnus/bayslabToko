<h1>
    <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"> Tambah User</i></a>
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
            <th>Email</th>
            <th>Username</th>
            <th>Level</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($user as $user) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $user->nama ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->akses_level ?></td>
            <td>
                <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-retweet"></i> Edit</a>

                <a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin nih !!')"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>