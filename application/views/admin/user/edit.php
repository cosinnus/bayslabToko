<?php
//notif error
echo validation_errors('<div class="alert alert-danger">', '</div>');

//untuk membuat form open
echo form_open(base_url('admin/user/edit/'.$user->id_user),' class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">Nama User</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Usernya" value="<?php echo $user->nama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Emailnya" value="<?php echo $user->email ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Username</label>
    <div class="col-md-5">
        <input type="text" name="username" class="form-control" placeholder="Usernamenya" value="<?php echo $user->username ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="Passwordnya" value="<?php echo $user->password ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Level</label>
    <div class="col-md-5">
        <select name="akses_level" class="form-control">
            <option value="#" disabled> --Pilihan-- </option>
            <option value="admin">Admin</option>
            <option value="user" <?php if($user->akses_level == "User") {echo "selected"; } ?> >User</option>
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