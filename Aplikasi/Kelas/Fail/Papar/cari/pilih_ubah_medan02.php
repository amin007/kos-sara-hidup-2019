<?php
for ($kira=0; $kira < count($row); $kira++)
{	foreach ( $row[$kira] as $key=>$data )
	{## papar data $row ----------------------------------------------------------
		$name = 'name="' . $myTable . '[' . $key . ']"';
		$dataType = $this->_meta[$myTable][$key]['type'];
		$semua = array($this->_meta,$myTable,$kira,$key,$data,$name);
		$classA = 'col-sm-2 control-label text-right';?>
<!-- ================================================================================================= --><?php
		echo "\n";
		?><div class="form-group row"><?php echo "\n\t";
		?><label for="inputTajuk" class="<?php echo $classA ?>"><?php
		echo $key ?></label><?php echo "\n\t";
		?><div class="<?php echo $class2 ?>"><?php
		$paparData = $html->ubahInput2($key,$data,$dataType,
			$semua,$this->bentukJadual01);
		echo "\n\t\t" . $paparData . "\n\t";
		?></div><!-- / class="<?php echo $class2 ?>" --><?php echo "\n";
		?></div><!-- / class="form-group" --><?php echo "\n";
	}## --------------------------------------------------------------------------
}
?><!-- ================================================================================================= --><?php

function contohInput($data)
{
	$input2 = '<p class="form-control-static text-info">'
			. $data . '</p>';

	return $input2;
}