<html>
	<head>
		<title>
			List Karyawan
		</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js";?>"></script>		
	</head>
<body>
<div class="content-wrapper">
	<section class="content">	
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data Karyawan</h3>
				<a href="<?php echo base_url(); ?>utama/tambah" class="btn btn-success"> + Karyawan</a>
				<br>
				<br>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Aksi</th>							
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $row) { ?>
						<tr>
							<td><?php echo $row->id; ?></td>
							<td>
								<table border="0">
									<tr>
										<td><img src="tes.jpg" height="50" width="50"></td>
										<td><?php echo $row->npk; ?><br>
											<?php echo $row->nama; ?>
										</td>										
									</tr>
								</table>
								
							</td>
							<td><a href="<?php echo base_url(); ?>utama/detail/<?php echo $row->npk; ?>" class="btn btn-success">Detail</a>
							<a href="<?php echo base_url(); ?>utama/edit/<?php echo $row->npk; ?>" class="btn btn-warning">Edit</a>
							<a href="<?php echo base_url(); ?>utama/cetak/<?php echo $row->npk; ?>" class="btn btn-default">Cetak</a>
							<a href="<?php echo base_url(); ?>utama/hapus/<?php echo $row->npk; ?>" onClick="return confirm('Yakin mau hapus ?');" class="btn btn-danger">Hapus</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
</body>	
</html>