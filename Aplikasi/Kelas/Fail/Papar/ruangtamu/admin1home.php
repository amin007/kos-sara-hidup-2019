<div class="container">
<hr><h1>Admin1home - Kita Tanya Apa Khabar</h1><hr>
<div class="hero-unit">
<p><?php
$Sesi = new \Aplikasi\Kitab\Sesi();
$Sesi->init();
//echo '<pre>'; print_r($_SESSION); echo '</pre>';
echo 'namaPendek=' . $Sesi->get('bs_namaPendek') . '<br>';
echo 'namaPenuh=' . $Sesi->get('bs_namaPenuh') . '<br>';
echo 'email=' . $Sesi->get('bs_email') . '<br>';
echo 'nohp=' . $Sesi->get('bs_nohp') . '<br>';
echo 'levelPengguna=' . $Sesi->get('bs_levelPengguna') . '<br>';
echo 'url=' . URL . '';
//*/
?></p>

	<a class="btn btn-primary btn-large" href="<?php echo URL ?>admin1home/logout">
	Keluar<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->