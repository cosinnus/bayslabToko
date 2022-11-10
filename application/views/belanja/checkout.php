<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <center><h1><?php echo $title ?></h1></center>
                <hr>
                <div class="clearfix"></div><br>
				<?php if($this->session->flashdata('sukses')){
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';
				}
				?>
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">Pict</th>
                        <th class="column-2">Product</th>
                        <th class="column-3">Price</th>
                        <th class="column-4 p-l-70">Quantity</th>
                        <th class="column-5" width="15%">Total</th>
						<th class="column-6" width="20%">Pilihan</th>
                    </tr>
                    <?php
                    
                    foreach($keranjang as $keranjang) { 
                        //ambil data belanjaan
                        $id_produk = $keranjang['id'];
                        $produk = $this->produk_model->detail($id_produk);
						//form update
						echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
						
                    ?>
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                            </div>
                        </td>
                        <td class="column-2"><?php echo $keranjang['name'] ?></td>
                        <td class="column-3">IDR | Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
                        <td class="column-4">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                        <td class="column-5">IDR | Rp. 
                            <?php
                            $sub_total = $keranjang['price'] * $keranjang['qty'];
                            echo number_format($sub_total,'0',',','.');
                            ?>
                        </td>
						<td>
							<button type="submit" name="update" class="btn btn-success btn-sm btn-flat"><i class="fa fa-retweet"></i> Edit</button>
							<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash-o"></i> Delete</a>
						</td>
                    </tr>
                    <?php
                    }
					//end form close
					echo form_close();
                    ?>
                    <tr class="table-row bg-info text-strong" style="font-weight: bold; color:aliceblue !important;">
                        <td colspan="4" class="column-1">Total Payment</td>
                        <td colspan="2" class="column-2">IDR | Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
                    </tr>
                </table>
				<br>
				<?php echo form_open(base_url('belanja/checkout')); ?>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nama Penerima</th>
								<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required value="<?php echo $pelanggan->nama_pelanggan ?>"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Email Penerima</td>
								<td><input type="email" name="email" class="form-control" placeholder="Email" required value="<?php echo $pelanggan->email ?>"></td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td><input type="text" name="telepon" class="form-control" placeholder="Telp" required value="<?php echo $pelanggan->telepon ?>"></td>
							</tr>
							<tr>
								<td>Alamat Penerima</td>
								<td><textarea name="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"> Oke Checkout</i></button>
								<button class="btn btn-sm btn-danger" type="reset"><i class="fa fa-retweet"> Repeat</i></button>
								</td>
							</tr>
						</tbody>
					</table>
				<?php echo form_close(); ?>
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
