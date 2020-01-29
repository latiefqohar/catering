<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url('assets/template/')?>images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
            <form action="<?= base_url('Checkout/order'); ?>" method="post">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<label class="mr-3"><input type="radio" name="jenis" value="pribadi" id="radio_perorang" checked="checked" onclick="check()">
										Perorangan </label>
									<label><input type="radio" name="jenis" value="perusahaan" id="radio_perusahaan" onclick="check()"> Kerjasama Perusahaan </label>
								</div>
							</div>
						</div>
						<div class="col-md-12" id="area_perusahaan" style="display:none;">
							<div class="form-group">
								<label for="country">Nama Perusahaan</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="nama_perusahaan" id="nama_perusahaan" class="form-control"  onclick="ambildata()" >
                                        <option value="">--Pilih Nama Perusahaan--</option>
                                        <?php foreach($perusahaan as $row){ ?>
                                        <option value="<?= $row->id; ?>"><?= $row->nama_perusahaan; ?></option>
                                        <?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama_depan">Nama Depan</label>
								<input type="text" name="nama_depan" id="nama_depan" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" id="alamat" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="kota">Kota</label>
								<input type="text" name="kota" id="kota" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="kode_pos">Kode Pos</label>
								<input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="telpon">Telpon</label>
								<input type="text" name="telpon" id="telpon" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="w-100"></div>

					</div>
				<!-- END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							<p class="d-flex">
								<span>Subtotal</span>
                                <span>Rp. <?= number_format($subtotal['jumlah'],2); ?></span>
                                <input type="hidden" name="subtotal" value="<?= $subtotal['jumlah']; ?>">
							</p>
							<p class="d-flex">
								<span>Biaya Kirim</span>
                                <span>Rp. <?= number_format($keranjang['ongkir'],2); ?></span>
                                <input type="hidden" name="ongkir" value="<?= $keranjang['ongkir']; ?>">
							</p>
							<p class="d-flex">
								<span>Diskon</span>
                                <span>Rp. <?= number_format($keranjang['diskon'],2); ?></span>
                                <input type="hidden" name="diskon" value="<?= $keranjang['diskon']; ?>">
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
                                <span>Rp.  <?= number_format($total,2); ?></span>
                                <input type="hidden" name="total" value="<?= $total ?>">
							</p>
						</div>
                    </div>
                   
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4">
							<h3 class="billing-heading mb-4">Metode Pembayaran</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="pembayaran" value="transfer" class="mr-2" onclick="Toogle()" required> Tranfer Bank</label>
									</div>
								</div>
                            </div>
                            <div id="data_bank" class="form-group" style="display:none">
								<div class="col-md-12">
									<div class="radio">
										<img src="<?= base_url(); ?>assets/template/images/bca.jpg" alt="" height=20px>  <label>02322111 - an dina</label>
									</div>
                                </div>
                                <div class="col-md-12">
									<div class="radio">
										<img src="<?= base_url(); ?>assets/template/images/bni.png" alt="" height=20px>  <label>02322111 - an dina</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="pembayaran" value="tagihan" class="mr-2" id="tagihan" disabled required>Tagihan Bulanan</label>
									</div>
								</div>
							</div>
							<!-- <div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
									</div>
								</div>
							</div> -->
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2" required> I have read and accept the
											terms and conditions</label>
									</div>
								</div>
							</div>
							<p><button class="btn btn-primary py-3 px-4">Lakukan Pemesanan</button></p>
						</div>
                    </div>
                    </form>
				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
	<div class="container py-4">
		<div class="row d-flex justify-content-center py-5">
			<div class="col-md-6">
				<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
				<span>Get e-mail updates about our latest shops and special offers</span>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<form action="#" class="subscribe-form">
					<div class="form-group d-flex">
						<input type="text" class="form-control" placeholder="Enter email address">
						<input type="submit" value="Subscribe" class="submit px-3">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script>
    function check(){
        if(document.getElementById('radio_perorang').checked==true) {
            document.getElementById("area_perusahaan").style.display = "none";
            document.getElementById("nama_perusahaan").value = "";
            document.getElementById("nama_depan").readOnly=false;
            document.getElementById("tagihan").checked=false;
            document.getElementById("tagihan").disabled=true;
            $('#nama_depan').val("");
            $('#alamat').val("");
            $('#kota').val("");
            $('#kode_pos').val("");
            $('#telpon').val("");
            $('#email').val("");
        }else if(document.getElementById('radio_perusahaan').checked ==true ) {
            document.getElementById("area_perusahaan").style.display = "block";
            document.getElementById("nama_depan").readOnly=true;
            document.getElementById("tagihan").disabled=false;

        }
    }

    function ambildata(){
        var e = document.getElementById("nama_perusahaan");
        var id = e.options[e.selectedIndex].value;
        console.log(id);
        $.ajax({
                url: '<?= base_url(); ?>Checkout/ambil_perusahaan', //url yang diakses
                type: 'post', //method get
                dataType: 'json', //data yang diambil json
                data: {
                    'id': id, //parameter apikey==api yang didapat
                },
                success: function (result) { //jika suksess jalanka fungsi ini dan hasilnya disimpan dalam result
                    console.log(result);
                    $('#nama_depan').val(result.nama_perusahaan);
                    $('#alamat').val(result.alamat);
                    $('#kota').val(result.kota);
                    $('#kode_pos').val(result.kode_pos);
                    $('#telpon').val(result.telpon);
                    $('#email').val(result.email);
                }
            })
  
    }

    function Toogle() {
        var x = document.getElementById("data_bank");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

</script>
