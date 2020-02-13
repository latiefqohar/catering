<center>
	<h2>Welcome To</h2>
	<h4>Catering Mama Dina</h4>
</center>
<img src="<?= base_url('assets/catering.png'); ?>" alt="Logo"  style="display: block;margin-left: auto;margin-right: auto;width: 100px; ">
<br><br>
<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Pesanan Baru</span>
				<span class="info-box-number">
					<?= $pesanan_baru; ?>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bars"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Menunggu Konfirmasi</span>
				<span class="info-box-number"><?= $menunggu_proses; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>

	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-info elevation-1"><i class="fa fa-cog"></i></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Sedang Diproses</span>
				<span class="info-box-number"><?= $menunggu_proses; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Pesanan Selesai</span>
				<span class="info-box-number"><?= $selesai; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-12 col-sm-6 col-md-6">
		<div class="info-box">
			<span class="info-box-icon bg-warning elevation-1"><i class="fa fa-file-invoice-dollar"></i>
				</i></span>

			<div class="info-box-content">
				<span class="info-box-text">Invoice Menunggu Pembayaran</span>
				<span class="info-box-number">
					<?= $invoice_pending; ?>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-6">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Invoice Selesai</span>
				<span class="info-box-number"><?= $invoice_selesai; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
