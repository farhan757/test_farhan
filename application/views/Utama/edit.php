<html>
	<head>
		<title>
			Form Karyawan
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
				<h3 class="box-title">Form Karyawan</h3>
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
			<?php echo form_open('Utama/aksi_edit'); ?>
			<?php foreach($data as $row){ ?>
				<label>NPK</label><br/>
				<?php echo form_error('npk'); ?>
				<input type="number" name="npk" value="<?php echo $row->npk; ?>" disabled><br/>
				<label>Nama</label><br/>
				<?php echo form_error('nama'); ?>
				<input type="text" name="nama" value="<?php echo $row->nama; ?>"><br/>
				<label>Tanggal Lahir</label><br/>
				<input type="date" name="tgl" value="<?php echo $row->tanggal_lahir; ?>"><br/>
				
				<label>Jenis Kelamin</label><br/>
				<?php echo form_error('jk'); ?>
				<select name="jk">
					<option value="M" <?php if($row->jenis_kelamin == "M") echo 'selected'; ?>>Male</option>
					<option value="F" <?php if($row->jenis_kelamin == "F") echo 'selected'; ?>>Female</option>
				</select><br/><br/>	
				<input type="hidden" name="id" value="<?php echo $row->npk; ?>">
			<?php }?>
				<input type="submit" value="Simpan">
			</form>	
		</div>
	</section>
</div>
</body>	
</html>