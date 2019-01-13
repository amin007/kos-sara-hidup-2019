<!-- menu_atas.php A0 -->
<?php
$sesi = \Aplikasi\Kitab\Sesi::init();
//echo '<pre>MENU_ATAS - $_SESSION:'; print_r($_SESSION); echo '</pre><br>';
# set pembolehubah
$pengguna = \Aplikasi\Kitab\Sesi::get('bs_namaPendek');
$level = \Aplikasi\Kitab\Sesi::get('bs_levelPengguna');

$senaraiPengguna = array('pentadbir','biasa');
$senaraiPentadbir = array('pentadbir','biasa');
if (in_array($level, $senaraiPentadbir))
	$paras = '' . $level;
elseif (in_array($level, $senaraiPengguna))
	$paras = '' . $level;
else
	$paras = null; # untuk pelawat sahaja

$iconFA['home2'] = '<i class="fa fa-home fa-2x" aria-hidden="true"></i>';
$iconFA['video'] = '<i class="fa fa-video-camera" aria-hidden="true"></i>';
echo "\r\r";
//if ($paras == null): else: ?>
<nav class="navbar navbar-inverse" role="navigation">
<!-- div class="navbar navbar-custom" role="navigation" -->
	<div class="container-fluid">
<!-- menu kiri mula -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<?php for ($iconbar=1; $iconbar < 3; $iconbar++):
			?><span class="icon-bar"></span><?php endfor; echo "\n"?>
			</button>
			<a class="navbar-brand" href="<?php echo URL ?>">
				<?php echo $iconFA['video'] . Tajuk_Muka_Surat . ':' . $paras ?></a>
			<a class="navbar-brand" href="<?php echo URL ?>ruangtamu/logout">
				<i class="fa fa-times fa-2x" aria-hidden="true"></i>Keluar</a>
		</div>
<!-- menu kiri tamat -->
<!-- menu kanan mula -->
		<div class="navbar-collapse collapse">
<?php require 'menubar_atas.php'; ?>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<!-- borang cari kp-->
<form class="navbar-form navbar-right" action="<?php echo URL ?>cari/pada/400/1" method="POST">
<div class="input-group">
	<div class="input-group-btn">
		<a class="btn btn-info"><span class="glyphicon glyphicon-search"></span></a>
	</div>
	<input type="hidden" name="namajadual" value="syarikat">
	<input type="text" name="jika[cari][1]" placeholder="Cari Tarikh" class="form-control" />
	<input type="hidden" name="susun" value="nama ASC">
</div>
</form>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
		</div>
<!-- menu kanan tamat -->
	</div>
</nav>
<?php
// endif;