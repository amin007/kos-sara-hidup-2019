<?php
//$html = new Aplikasi\Kitab\Borang01_Tambah;
$html = new Aplikasi\Kitab\BrgBaru01;
$aksi = URL . $this->_method . '/baruSimpan/' . $this->carian[0];
$class1 = 'col-sm-7'; # untuk tajuk dan hantar
$class2 = 'col-sm-6 '; # untuk $data
$html->medanCarian(
	array($this->_method, $myTable, $this->senarai, $this->cariID, $this->_jadual)
);?>

<span class="border border-secondary">
<form method="POST" action="<?php echo $aksi ?>"
class="form-horizontal"><?php echo "\n";
for ($kira=0; $kira < count($row); $kira++)
{	foreach ( $row[$kira] as $key=>$data )
	{## papar data $row ----------------------------------------------------------
		?><div class="form-group row"><?php echo "\n\t";
		?><label for="inputTajuk" class="col-sm-2 control-label text-right"><?php
		echo $key ?></label><?php echo "\n\t";
		?><div class="<?php echo $class2 ?>"><?php
		$paparData = $html->ubahInput2($this->bentukJadual01,
			$this->_meta, $this->_jadual,$kira, $key, $data);
		echo "\n\t\t" . $paparData . "\n\t";
		?></div><!-- / class="<?php echo $class2 ?>" --><?php echo "\n";
		?></div><!-- / class="form-group" --><?php echo "\n";
	}## --------------------------------------------------------------------------
}$html->medanHantar($this->_jadual, $class1);
/*<!-- / class="container" -->*/ ?>
</form><!-- / class="form-horizontal" -->
</span><!-- / class="border border-secondary" -->
