<?php
namespace Aplikasi\Kitab;//echo __NAMESPACE__;
class Borang04_Jadual
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	public static function pilihURL($key, $data, $myTable = null, $meta = null)
	{
		$dataType = $jenis[$key]['type'];// myGetType($data);
		$dataKey = $jenis[$key]['key'];// myGetType($data);
		if ($data==null):Borang04_Jadual::gaya_url_0($data);
		elseif ($dataKey=='not_null|primary_key'):Borang04_Jadual::primaryKey($data);
		elseif ($dataType=='NEWDECIMAL'):Borang04_Jadual::gaya_url_6($data);
		/*elseif ($key=='no'):Html_Url::gaya_url_1($data);
		elseif(in_array($key,array('posdaftar'))):Html_Url::gaya_url_2($data);
		elseif ($key=='pegawaiborang'): Html_Url::gaya_url_3($data);
		elseif ($key=='hantar_prosesan'):Html_Url::gaya_url_4($data);
		elseif ($key=='terimaProsesan'):Html_Url::gaya_url_5($data);
		elseif ($key=='Total'):Html_Url::gaya_url_6($data);
		elseif ($key=='subject'):Html_Url::gaya_huruf('Besar_Depan', $data);
		elseif(in_array($key,array('Mesej'))):
			echo "\n\t\t\t";
			?><td><?php echo nl2br($data) ?></td><?php//*/
		else:
			echo "\n\t\t\t"; 
			?><td><?php echo $data ?></td><?php
		endif;
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
#------------------------------------------------------------------------------------------
	public static function gaya_url_0($data)
	{
		$data = ($data == '0') ? '&nbsp;':$data;
		//$data = ($data == null) ? 'Jumlah:':$data;
		?><td>&nbsp;</td><?php
	}
#------------------------------------------------------------------------------------------
	public static function primaryKey($data)
	{# primary key
		$k0 = URL . 'belian/ubah/' . $data; //$this->iconFA(4)
		list($pengguna,$level,$birutua,$birumuda,$merah) = $this->setPencam();

		$this->pautanTD('_blank',$k0,$birutua,$data,$this->iconFA(4));
	}
#------------------------------------------------------------------------------------------
	public static function gaya_url_1($data)
	{
		$k0 = URL . 'pelajar/papar/profil/' . $data;
		$k1 = URL . 'pelajar/ubah/profil/' . $data;

		if ($data == null):
			?><td>&nbsp;</td><?php
		else:?><td><?php
			$this->pautanTD(null,$k170,$warnaPrimary,$data);
			$this->pautanTD('_blank',$k1,$warnaDanger,'cetak');
			?></td><?php
		endif;
	}
#------------------------------------------------------------------------------------------
	public static function gaya_url_2($data) 
	{
		list($k,$btn) = $this->posdaftar($data);
		$pautan = ($data==null) ? $data :
		'<a target="_blank" href="' . $k[3] . '" class="'
		. $this->butang('info') . '">' . $data . '</a>';

		?><td><?php echo $pautan ?></td><?php
	}
#------------------------------------------------------------------------------------------
	public static function gaya_url_3($data) 
	{
		$k1 = URL . "operasi/batch/$data";
		$k2 = URL . "laporan/cetakNonA1/$data/1000";
		$k3 = URL . "laporan/cetakA1/$data/1000";
		if ($data == null):
			?><td>&nbsp;</td><?php
		else:?><td><?php
			$this->pautanTD(null,$k1,$warnaPrimary,$data);
			$this->pautanTD('_blank',$k2,$warnaDanger,'Batch Non A1');
			$this->pautanTD('_blank',$k3,$warnaSuccess,'Batch A1');
			?></td><?php
		endif;
	}
#------------------------------------------------------------------------------------------
	public static function gaya_url_4($data)
	{
		$k1 = URL . "batch/proses/$data";
		$k2 = URL . "laporan/cetakNonA1/$data/1000";
		$k3 = URL . "laporan/cetakA1/$data/1000";
		if ($data == null):
			?><td>&nbsp;</td><?php
		else:?><td><?php
			$this->pautanTD(null,$k1,$warnaPrimary,$data);
			$this->pautanTD('_blank',$k2,$warnaDanger,'Batch Non A1');
			$this->pautanTD('_blank',$k3,$warnaSuccess,'Batch A1');
			?></td><?php
		endif;
	}
#------------------------------------------------------------------------------------------
	public static function gaya_url_5($data)
	{
		$k1 = URL . "batch/terima/$data";
		$k2 = URL . "laporan/cetakTerimaProses/$data";
		if ($data == null):
			?><td>&nbsp;</td><?php
		else:?><td><?php
			$this->pautanTD(null,$k1,$warnaPrimary,$data);
			$this->pautanTD('_blank',$k2,$warnaDanger,'cetak');
			?></td><?php
		endif;
	}
#------------------------------------------------------------------------------------------
	public static function gaya_url_6($data)
	{
		?><td <?php echo Html_Url::kedudukan('kanan') ?>><?php echo $data ?></td><?php
	}
#------------------------------------------------------------------------------------------
	public static function gaya_huruf($jenis, $data)
	{
		echo "\n\t\t\t"; ?><td><?php
		echo huruf($jenis, $data); //huruf('Besar_Depan', )
		?></td><?php
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
#------------------------------------------------------------------------------------------
	public static function butang($warna = 'info',$saiz = 'kecil')
	{
		$btnW['primary'] = 'btn btn-primary'; # birutua
		$btnW['info'] = 'btn btn-info'; # birumuda - utama
		$btnW['danger'] = 'btn btn-danger'; # merah
		$btnW['success'] = 'btn btn-success'; #hijau
		$btnS['kecil'] = ' btn-mini'; # - utama

		$btn = $btnW[$warna] . $btnS[$saiz];
		return $btn;
	}
#------------------------------------------------------------------------------------------
	public static function iconFA($pilih)
	{# icon font awesome
		$a[0] = '<i class="fa fa-user-o" aria-hidden="true"></i>';
		$a[1] = '<i class="fa fa-pencil" aria-hidden="true"></i>';
		$a[2] = '<i class="fa fa-pencil" aria-hidden="true"></i>Ubah1';
		$a[3] = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah2';
		$a[4] = '<i class="fa fa-pencil" aria-hidden="true"></i>Ubah1';

		return $a[$pilih];
	}
#------------------------------------------------------------------------------------------
	public static function kedudukan($align = 'kiri')
	{
		$papar['tengah'] = 'class="text-center"'; // Center aligned text
		$papar['kanan'] = 'class="text-right"'; //Right aligned text
		$papar['justify'] = 'class="text-justify"'; //Justified text
		$papar['nowrap'] = 'class="text-nowrap"'; //No wrap text
		$papar['kiri'] = 'class="text-left"'; // Left aligned text

		return $papar[$align];
	}
#------------------------------------------------------------------------------------------
	public function dataBernombor($data)
	{
		$data = ($data == '0') ? '&nbsp;':$data;
		$data = ($data == null) ? 'Jumlah:':$data;

		return $data;
	}
#------------------------------------------------------------------------------------------
	public function setPencam()
	{
		# set pembolehubah Sesi
		$pengguna = \Aplikasi\Kitab\Sesi::get('bs_namaPendek');
		$level = \Aplikasi\Kitab\Sesi::get('bs_levelPengguna');
		//echo "<br> \$pengguna : $pengguna | \$level = $level";
		# butang
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';

		return array($pengguna,$level,$birutua,$birumuda,$merah);
	}
#------------------------------------------------------------------------------------------
	public function pautanTD($target, $href, $class, $data, $iconFA)
	{
		$t = ($target == null) ? '':' target="' . $target . '"';
		$data = ($data == '0' or $data == null) ? '&nbsp;':$data;
		$iconFA = ($iconFA == null) ? '':$iconFA;

		?><a<?php echo $t ?> href="<?php echo $href ?>" class="<?php
		echo $class ?>"><?php echo $data ?></a><?php
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}