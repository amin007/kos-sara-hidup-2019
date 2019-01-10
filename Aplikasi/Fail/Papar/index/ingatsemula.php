<?php include 'atas4.1.3/diatas.php'; ?>

<!-- Jadual nama_pengguna ########################################### -->
<br><br><br>
<div class="container">
<div class="form-group row"><div class="col-sm-8">
	<span class="input-group-text">Ingat Semula Kata Laluan</span>
</div></div>
<form method="POST" action="<?php echo URL ?>login/ingatsemula"
class="form-horizontal">
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Kata Laluan</label>
	<div class="col-sm-6 ">
		<input type="password" name="nama_pengguna[kataLaluan]"
			 placeholder="Taip kata laluan" class="form-control">
		<input type="password" name="nama_pengguna[kataLaluanX]"
			 placeholder="Taip lagi sekali" class="form-control">
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group">
			<input type="text" name="nama_pengguna[email]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : user1@duduk.mana
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">No. Tel. Pintar</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group">
			<input type="text" name="nama_pengguna[nohp]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : 012345678
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
<div class="form-group row">
	<div class="col-sm-8">
		<input type="submit" name="Simpan" value="Ubah Kata Laluan"
		class="btn btn-danger btn-large btn-block text-center">
	</div>
</div></form>
<!-- / class="form-horizontal" -->
</div><!-- / class="container" -->
<!-- Jadual nama_pengguna ########################################### -->
<!-- menu tengah bawah -->

<?php include 'atas4.1.3/dibawah.php'; ?>