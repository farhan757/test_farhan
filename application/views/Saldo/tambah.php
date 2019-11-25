<html>
	<head>
		<title>
			Form Tambah Saldo
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
				<h3 class="box-title">Form Tambah Saldo</h3>
				<a href="<?php echo base_url(); ?>utama" class="btn btn-success">Kembali</a>
				<br>
				<br>
			</div>
			<?php
				if(isset($info)){
					echo $info;
				}
			?>
			<?php echo validation_errors(); ?>
			<?php echo form_open('Saldo/aksi_tambah'); ?>
				<label>NPK</label><br/>
				<?php echo form_error('npk'); ?>
				<input type="number" name="npk"><br/>
				<label>Jumlah Saldo Cuti</label><br/>
				<?php echo form_error('nama'); ?>
				<input type="text" name="saldo"><br/>
				<label>Tahun</label><br/>
				<input type="text" name="tahun"><br/>				
				<input type="submit" value="Simpan">
			</form>	
		</div>
	</section>
</div>
</body>	
</html>