<html>
	<head>
		<title>
			Detail Karyawan
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
				<h3 class="box-title">Detail Karyawan</h3>
				<a href="<?php echo base_url(); ?>utama" class="btn btn-success">Kembali</a>
				<a href="<?php echo base_url(); ?>Saldo/tambah" class="btn btn-success">Tambah</a>
				<br>
				<br>
			</div>
			<img src="<?php echo base_url().'/gambar/'; ?>" height="150" width="120">
			<?php foreach($data as $row) { ?>
			<h5 class="box-title"><?php echo $row->nama; ?></h5>
			<h5 class="box-title"><?php echo $row->tanggal_lahir; ?></h5>
			<?php } ?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							Tahun
						</th>
						<th>
							Sisa
						</th>
						<th>
							
						</th>						
					</tr>
				</thead>
				<tbody>
			<?php foreach($detail as $dt){?>
				<tr>
					<td>
						<?php echo $dt->tahun; ?>
					</td>
					<td>
						<?php echo $dt->saldo; ?>
					</td>
					<td>
						<a href="<?php echo base_url(); ?>saldo/edit/<?php echo $dt->id; ?>" class="btn btn-warning">Edit</a>
						<a href="<?php echo base_url(); ?>saldo/hapus/<?php echo $dt->id; ?>" onClick="return confirm('Yakin mau hapus ?')" class="btn btn-danger">Hapus</a>
					</td>
				</tr>	
			<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
</div>
</body>	
</html>