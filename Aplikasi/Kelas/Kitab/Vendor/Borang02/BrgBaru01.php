<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class BrgBaru01
{
#==========================================================================================
###########################################################################################
	public function medanCarian($pindah, $class = 'col-sm-7')
	{
		list($method, $myTable, $senarai, $cariID, $_jadual) = $pindah;

		if($method == 'biodata'):
			$this->medanTajuk($myTable, $class);
		elseif($method == 'rangka'):
		else:
			$this->medanTajuk($myTable, $class);
			/*$this->atasLabelSyarikat();
			list($mencari, $carian, $mesej) =
				$this->atasSemakData($senarai, $cariID, $_jadual);
			$this->atasInputCarian($mencari, $carian, $mesej, $class);*/
		endif;
	}
#------------------------------------------------------------------------------------------
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
		echo "\n"; $class = 'col-sm-8';
?><div class="container">
<div class="<?php echo $class ?>">
	<span class="input-group-text">
		Jadual : <?php echo $myTable ?>
	</span>
</div>
</div><br><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function medanHantar($myTable, $class = 'col-sm-7')
	{
		$class = 'col-sm-6';
		?><div class="form-group row">
	<label for="inputSubmit" class="col-sm-2 control-label text-right"></label>
	<div class="<?php echo $class ?>">
		<input type="hidden" name="jadual" value="<?php echo $myTable ?>">
		<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-large btn-block">
		<!-- input type="reset" name="Reset" value="Reset" class="btn btn-default btn-large" -->
	</div><!-- / class="<?php echo $class ?>" -->
</div><!-- / class="form-group row" --><?php
	}
#------------------------------------------------------------------------------------------
	public function atasInputCarian($mencari, $carian, $mesej, $class)
	{
		echo "\n";?><div class="container">
<form method="GET" action="<?=$mencari;?>" class="form-inline" autocomplete="off">
<div class="form-group">
	<label for="carian"><h1>Ubah Kawalan<?=$mesej?></h1></label>
	<div class="input-group">
		<input type="text" name="cari" value="<?=$carian;?>"
		class="form-control" id="inputString"
		onkeyup="lookup(this.value);" onblur="fill();">
		<span class="input-group-addon"><input type="submit" value="mencari"></span>
	</div>
</div>
<div class="suggestionsBox" id="suggestions" style="display: none;">
	<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
</div>
</form></div><br><?php echo "\n";
	}
###########################################################################################
#------------------------------------------------------------------------------------------
	public function ubahInput2($key,$data,$dataType,$semua,$ulangdata)
	{	# istihar pembolehubah
		//if ( in_array($key,array(...)) )
		if( in_array($key,array('password','kataLaluan')) )
			$input = $this->inputPassword($semua);
		elseif( in_array($key,array('no')) )
			$input = $this->inputPrimaryKey($semua);
		elseif( in_array($key,array('nohp')) )
			$input = $this->inputBiodata($semua);
		elseif(in_array($dataType,array('VAR_STRING')))
			$input = $this->inputTeksBesar($semua);
		elseif(in_array($dataType,array('BLOB')))
			$input = $this->inputTextarea($semua); #kod utk textarea
		elseif ( in_array($dataType,array('DATE')) )
			$input = $this->inputTarikh($semua);
		elseif(in_array($dataType,array('NUMBER','LONG')))
			$input = $this->inputNumber($semua);
		elseif(in_array($dataType,array('NEWDECIMAL')))
			$input = $this->inputMataDuitan($semua);
		//elseif(in_array($dataType,array('TINY')))
		//	$input = $this->inputTeksKecil($semua);
		elseif(in_array($dataType,array('TINY','STRING')))
			$input = $this->inputSelectOption($semua,$ulangdata);//*
		else
		{#kod untuk lain2
			$input = "\n\t\t" . '<p class="form-control-static text-info">'
				   . $data . '</p>';
		}//*/

		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	function labelTeks($data)
	{
		$input2 = null;
		$input2 = ($data==null) ? '' :
				'<div class="input-group-prepend"><span class="input-group-text">'
				. "\n\t\t\t\t" . $data . '</span></div>'
				. '';

		return $input2;
	}
#------------------------------------------------------------------------------------------
	function ccs()
	{
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$tab4 = "\n\t\t\t\t";
		# butang 
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		$classInput = 'input-group input-group';
		$komenInput = '<!-- / "input-group input-group" -->';

		return array($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,$classInput,$komenInput);
	}
#------------------------------------------------------------------------------------------
	function labelBawah($data)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$input2 = ($data==null) ? '' :
				'<span class="input-group-addon">'
				. $data . '</span>'
				. $tab2;

		return $input2;
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	function inputTextarea($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return ''
		. '<textarea ' . $name . ' rows="1" cols="20"' . $tab2 
		. ' class="form-control">' . $data . '</textarea>'
		. $tab2 . '<pre class="input-group-text">' . $data . '</pre>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputPassword($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		$name2 = 'name="' . $jadual . '[' . $key . 'X]"';

		return ''
		//'<div class="input-group input-group-sm">' . $tab3
		//. '<span class="input-group-addon"></span>' . $tab3
		. '<input type="password" ' . $name	. $tab3 
		. ' placeholder="Taip kata laluan" class="form-control">'
		. '<input type="password" ' . $name2 . $tab3 
		. ' placeholder="Taip lagi sekali" class="form-control">'
		//. $tab2 . '</div>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputPrimaryKey($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return '<div class="'.$classInput.'">' . $tab3
		. '<input type="hidden" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">' . $tab3
		. $this->labelTeks($data) . $tab3
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputBiodata($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		$Sesi = new \Aplikasi\Kitab\Sesi(); $Sesi->init();
		$data = $Sesi->get('bs_nohp');
		return '<div class="'.$classInput.'">' . $tab3
		. '<input type="hidden" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">' . $tab3
		. $this->labelTeks($data) . $tab3
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputNumber($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return '<div class="input-group input-group-sm">' . $tab3
		. $this->labelTeks('nombor') . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">' . $tab3
		. $this->labelTeks(kira($data)) . $tab3
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputMataDuitan($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return '<div class="input-group input-group-sm">' . $tab3
		. $this->labelTeks('Bitcoin') . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">' . $tab3
		. $this->labelTeks(kira($data)) . $tab3
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTarikh($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		#terima - style="font-family:sans-serif;font-size:10px;"
		$X = 'name="' . $jadual . '[' . $key . 'X]"';
		$dataX = ($key=='hantar_prosesan') ?
			'<input type="checkbox" ' . $X . ' value="x"> Utk Prosesan : ' . $data
			: '<input type="checkbox" ' . $X . ' value="x"> ' . $data;

		return '<div class="input-group input-group-sm">' . $tab3
		. $this->labelTeks($dataX) . $tab3
		. '<input type="date" ' . $name
		. ' value="' . $data . '"'//. 'class="input-date tarikh" readonly>'
		. $tab3 . ' class="form-control date-picker"'
		. $tab3 . ' placeholder="Cth: 2014-05-01"'
		. $tab3 . ' id="date' . $key . '" data-date-format="yyyy/mm/dd"/>'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputAlamatBaru($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return '<div class="input-group input-group">' . $tab3
		. $this->labelTeks($data) . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksBesar($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		#kod utk input text saiz besar
		return '<div class="input-group input-group-lg">' . $tab3
		. $this->labelTeks($data) . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksKecil($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		#kod utk input text saiz besar
		return '<div class="input-group input-group-sm">' . $tab3
		. $this->labelTeks('Kecil:' . $data) . $tab3
		. '<input type="text" ' . $name
		. ' value="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksTakData($semua)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		#kod utk input text saiz besar
		return ''
		//'<div class="input-group input-group">' . $tab3
		//. $this->labelTeks('') . $tab3
		. '<input type="text" ' . $name
		. ' class="form-control">'
		//. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputJadual($paparSahaja)
	{
		//echo '$paparSahaja-><pre>'; print_r($paparSahaja) . '<pre>';
		//var_export($paparSahaja) . '<pre>';
		# set nama class untuk jadual
		$jadual1 = ' table-striped'; # tambah zebra
		$jadual2 = ' table-bordered';
		$jadual3 = ' table-hover';
		$jadual4 = ' table-condensed';
		$classJadual = 'table' . $jadual4 . $jadual3;
		$header = $id = null;

		foreach ($paparSahaja as $myTable => $bilang)
		{# mula ulang $bilang
			//echo "<h1>$myTable</h1>";
			Html_Table::papar_jadual($bilang, $myTable, 
			$pilih=5, $classJadual, $header = 'abc', $id);
		}# tamat ulang $bilang //*/
		echo "\n";

		return '';
	}
#------------------------------------------------------------------------------------------
	function inputSelectOption($semua,$ulangData)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		return '<div class="input-group input-group-sm">' . $tab2
		. '<select ' . $name . ' class="form-control">' . $tab3
		. $this->inputOption($semua,$ulangData) . '</select>' . $tab3
		. $this->labelTeks(kira($data))
		. $tab2 . '</div>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputOption($semua,$ulangData)
	{
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();
		list($jenis,$jadual,$kira,$key,$data,$name) = $semua;
		$dropmenu = '';
		foreach ($ulangData[$key] as $myTable => $bil)
		{# mula ulang $bil
			//echo "\r" . $bil['keterangan'] . '<br>';
			$p0 = ($data == $bil['kod']) ?  $data .'" selected' : $bil['kod'] . '"';
			$p1 = ($data == $bil['kod']) ? '*' . $bil['kod'] : $bil['kod'];
			$dropmenu .= '<option value="' . $p0 . '>'
			. $p1 . '-' . $bil['keterangan'] . '</option>' . $tab3;
		}# tamat ulang $bil//*/

		return $dropmenu;
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}