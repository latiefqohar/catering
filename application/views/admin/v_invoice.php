<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-12"></div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data Transaksi</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
                    <a href="<?= base_url('admin/Invoice/add'); ?>" class="btn btn-primary mb-2">Buat Invoice</a>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="font-size:10pt">
                            <thead>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Nama Terhutang</th>
                                    <th>Periode</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoice as $row) { ?>

                                <tr>
                                    <td><?= $row->no_invoice; ?></td>
                                    <td><?= $row->nama_perusahaan; ?></td>
                                    <td><?= $row->periode; ?></td>
                                    <td><?= $row->tanggal_invoice; ?></td>
                                    <td><?= $row->status_invoice; ?></td>
                                    <td><?= $row->tanggal_invoice; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/Invoice/detail/'.$row->id); ?>" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Nama Terhutang</th>
                                    <th>Periode</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
