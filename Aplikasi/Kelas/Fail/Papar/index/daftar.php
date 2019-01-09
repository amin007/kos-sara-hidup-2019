<?php include 'atas4.1.3/diatas.php'; ?>

<!-- Jadual nama_pengguna ########################################### -->
<br><br><br>
<div class="container">
<div class="form-group row"><div class="col-sm-8">
	<div class="input-group input-group-lg">
		<div class="input-group-prepend"><span class="input-group-text">
		Daftar Pengguna
		</span></div>
	</div>
</div></div>
<form method="POST" action="<?php echo URL ?>login/registerid"
class="form-horizontal">
<div class="form-group row">
	<label for="inputTajuk" class="col-sm-2 control-label">Nama Pengguna</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group-lg">
			<input type="text" name="nama_pengguna[namaPengguna]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : user1
			</span></div>
		</div><!-- / "input-group input-group" -->
	</div><!-- / class="col-sm-6 " -->
</div><!-- / class="form-group" -->
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
	<label for="inputTajuk" class="col-sm-2 control-label">Nama Penuh</label>
	<div class="col-sm-6 ">
		<div class="input-group input-group">
			<input type="text" name="nama_pengguna[Nama_Penuh]" class="form-control">
			<div class="input-group-prepend"><span class="input-group-text">
				Contoh : Polan Bin Polan
			</span></div>
		</div><!-- / "input-group input-group" -->
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
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="submit" name="Simpan" value="Daftar" class="btn btn-primary btn-large">
		</span>
		</div>
	</div>
</div></form>
<!-- / class="form-horizontal" -->
</div><!-- / class="container" -->
<!-- Jadual nama_pengguna ########################################### -->
<!-- menu tengah bawah -->

<?php include 'atas4.1.3/dibawah.php'; ?>