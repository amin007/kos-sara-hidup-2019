<?php
# pilih paparan ke bawah atau melintang
//$pilihJadual = 'jadual_am';
$pilihJadual = 'jadual_bootstrap';
//$pilihJadual = 'ubah_medan01'; # borang biodata berasaskan table
//$pilihJadual = 'ubah_medan02'; # borang ubah berasaskan bootstrap

# untuk kod baru
//echo '<pre>$carian='; print_r($this->carian); echo '</pre>';

# papar hasil carian
/*$cari1 = '&nbsp;|&nbsp;'; $cari2 = '';
foreach ($this->carian as $kunci => $nilai)
	$cari1 .= ( count($this->carian)==0 ) ? $nilai : $nilai . ' | ';
foreach ($this->senarai as $kunci2 => $nilai2)
	$cari2 .= ( count($nilai2)==0 ) ? $kunci2 . " = Kosong<br>\r"
	: $kunci2 . ' = ' . count($nilai2) . "<br>\r";
//echo "Anda mencari = $cari1\r<br>$cari2\r<hr>\r";//*/
echo '<a class="btn btn-primary" href="' . URL . $this->baruBorang . '">Tambah Baru</a>' . "\n";

//if(!isset($this->cariID))
//	echo '<h1>data kosong daa</h1>';
//else # jenis template
	include $this->template . '.php';
#-------------------------------------------------------------------------------
#http://php.net/manual/en/function.var-export.php
//$this->semakData($this->bentukJadual02,'bentukJadual02',0);
//$this->semakData($this->c1,'c1',0);
//$this->semakData($this->c2,'c2',0);
//$this->semakData($this->_meta,'_meta');
//$this->semakData($this->senarai,'senarai');
