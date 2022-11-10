<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">
                <center><h1><?php echo $title ?></h1></center>
                <hr>
                <div class="clearfix"></div><br>
				<?php if($this->session->flashdata('sukses')){
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				}
				?>
                <p class="alert alert-info">Jika sudah punya akun, klik <a class="btn btn-sm btn-success" href="<?php echo base_url('masuk') ?>">disini</a></p>
				<div class="col-md-12">
					<?php 
						//untuk notif error
						echo validation_errors('<div class="alert alert-danger">','</div>');
						//untuk form buka
						echo form_open(base_url('registrasi'), 'class="leave-comment"');
					
					?>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama</th>
									<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required value="<?php echo set_value('nama_pelanggan') ?>"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Email</td>
									<td><input type="email" name="email" class="form-control" placeholder="Email" required value="<?php echo set_value('email') ?>"></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" class="form-control" placeholder="Password" required value="<?php echo set_value('password') ?>"></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td><input type="text" name="telepon" class="form-control" placeholder="Telp" required value="<?php echo set_value('telepon') ?>"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><textarea name="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea></td>
								</tr>
								<tr>
									<td></td>
									<td><button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"> Saving</i></button>
									<button class="btn btn-sm btn-danger" type="reset"><i class="fa fa-retweet"> Repeat</i></button>
									</td>
								</tr>
							</tbody>
						</table>
					<?php echo form_close(); ?>
				</div>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
                
            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                
            </div>
        </div>

        
    </div>
</section>
