<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Html_Input_Biasa
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
#------------------------------------------------------------------------------------------
	public static function dropmenuInsert($tabline, $jenisData)
	{
		$input2 = '';
		$tatasusunan = @explode(',', $jenisData);
		foreach ($tatasusunan as $key => $value)
		{
			$input2 .= $tabline;
			$input2 .= ($key==0) ? '<option>' :
				'<option value="' . $value . '">';
			$input2 .= ucfirst($value);
			$input2 .= '</option>';
		}

		return $input2;
	}
#------------------------------------------------------------------------------------------
	public function medanCarian($pindah, $class = 'col-sm-7')
	{
		list($myTable, $senarai, $cariID, $_jadual) = $pindah;
		$this->atasLabelSyarikat();
		list($mencari, $carian, $mesej) = $this->atasSemakData($senarai, $cariID, $_jadual);
		$this->atasInputCarian($mencari, $carian, $mesej, $class);
	}
#------------------------------------------------------------------------------------------
	public function atasSemakData($senarai, $cariID, $_jadual)
	{
		if(isset($senarai['kes'][0]['newss'])):
			# set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = $cariID;
			$mesej = ''; //$carian .' ada dalam ' . $this->_jadual;
			list($namaSyarikat, $semak1, $semak3) = explode("|", $senarai['kes'][0]['nama']);
			?><nav class="floating-menu">
			<p class="bg-primary">
			<?php echo "\n&nbsp;" . $namaSyarikat ?>
			</p></nav>
			<?php
		else: # set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = null;
			$mesej = '::' . $cariID . ' tiada dalam ' . $_jadual;
		endif;

		return array($mencari, $carian, $mesej);
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
		echo "\n";
?><div class="form-group">
	<div class="<?php echo $class ?>">
		<div class="input-group input-group-lg">
		<span class="input-group-addon">Jadual <?php echo $myTable ?></span>
		</div>
	</div>
</div><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function medanHantar($myTable, $class = 'col-sm-7')
	{
?><div class="form-group">
	<div class="<?php echo $class ?>">
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="hidden" name="jadual" value="<?php echo $myTable ?>">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-large">
			<input type="reset" name="Reset" value="Reset" class="btn btn-default btn-large">
		</span>
		</div>
	</div>
</div><?php
	}
#------------------------------------------------------------------------------------------
	public function addInput($class, $myTable, $kunciUtama, $jenisMedan, $namaMedan, $data)
	{
		# istihar pembolehubah
		$labelDibawah = $data;
		$name = 'name="' . $myTable . '[' . $namaMedan . ']"';
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$tab4 = "\n\t\t\t\t";
		# butang
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		$classInput = $class . 'input-group input-group';
		$komen = '<!-- / "' . $class . 'input-group input-group" -->';

		if(in_array($kunciUtama,array('primaryKey')))
		{#untuk medan primary key
			$data = null;
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   . '<span class="input-group-addon">'. $name . '</span>' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $komen
				   . '';
		}
		elseif(in_array($jenisMedan,array('STRING','VAR_STRING')))
		{#kod utk input text
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   //. '<span class="input-group-addon"></span>' . $tab3
				   . '<input type="text" ' . $name . ' class="form-control">' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $name
				   . '';
		}
		elseif(in_array($jenisMedan,array('LONG')))
		{#kod utk input numbor
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   //. '<span class="input-group-addon"></span>' . $tab3
				   . '<input type="number" ' . $name . ' class="form-control">' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $name
				   . '';
		}
		elseif(in_array($jenisMedan,array('DATE')))
		{#kod utk input date
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   //. '<span class="input-group-addon"></span>' . $tab3
				   . '<input type="date" ' . $name . ' class="form-control">' . $tab3
				   . $this->labelBawah($labelDibawah)
				   . '</div>' . $name
				   . '';
		}
		elseif(in_array($jenisMedan,array('BLOB')))
		{#senarai medan untuk textarea
			//$data = null;
			$input = $tab2 . '<div class="'.$classInput.'">' . $tab3
				   . '<textarea ' . $name . ' rows="5" cols="20"' . $tab3
				   . ' class="form-control">' . $data . '</textarea>' . $tab3
				   . $this->labelPre($labelDibawah)
				   . '</div>' . $komen . $tab3
				   . '';
		}
		elseif ( in_array($jenisMedan,array('blockquote')) )
		{#kod untuk blockquote
			$data = null;
			$input = '<blockquote>'
				   . '<p class="form-control-static text-info">' . $data . '</p>'
				   //. '<small>Alamat <cite title="Source Title">baru</cite></small>'
				   . '</blockquote>';
		}
		else
		{#kod untuk lain2
			$input = '<p class="form-control-static text-info">'
			. $jenisMedan . '|' . $name . '</p>';
		}

		return $input; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public static function labelBawah($labelDibawah)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$input2 = ($labelDibawah==null) ? '' :
				'<span class="input-group-addon">'
				. $labelDibawah . '</span>'
				. $tab2;

		return $input2;
	}
#-------------------------------------------------------------------------------------------
	public static function labelPre($labelDibawah)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$pre = 'pre';
		//$pre = 'blockquote';
		$input2 = ($labelDibawah==null) ? '' :
				'<' . $pre . '>'
				. $labelDibawah
				. '</' . $pre . '>'
				. $tab2;

		return $input2;
	}
#-------------------------------------------------------------------------------------------
#==========================================================================================
}