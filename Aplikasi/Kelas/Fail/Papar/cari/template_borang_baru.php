<!-- h1> Ini Template Borang Baru </h1 -->
<?php
//$html = new Aplikasi\Kitab\Borang01_Tambah;
$html = new Aplikasi\Kitab\BrgBaru01;
$aksi = URL . $this->_method . '/baruSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6'; # untuk $data

foreach($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
#----------------------------------------------------------------------------------------------------
		$html->medanCarian(
			array($this->_method, $myTable, $this->senarai, $this->cariID, $this->_jadual)
			);
		echo "\n" . '<form method="POST" action="' . $aksi . '" class="form-horizontal">' . "\n";
		include 'b_baru/pilih_' . $pilihJadual . '.php';
		$html->medanHantar($this->myTable, $class1);
		echo "\n<!-- ========================================================================="
		. "======================== -->\n" . '</form><!-- / class="form-horizontal" -->' . "\n";
#----------------------------------------------------------------------------------------------------
	}#if ( count($row)==0 )
}
/*<!-- / class="container" -->*/