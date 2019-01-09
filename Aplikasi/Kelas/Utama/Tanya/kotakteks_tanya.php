<?php
namespace Aplikasi\Tanya;//echo __NAMESPACE__;
class Kotakteks_Tanya extends \Aplikasi\Kitab\Tanya
{
#===========================================================================================
##-------------------------------------------------------------------------------------------------#
	public function __construct()
	{
		parent::__construct();
	}
##-------------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '&lt;pre>' . $jadual . '|&lt;br>';
		print_r($senarai); echo '&lt;/pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
##-------------------------------------------------------------------------------------------------#
	function contoh_sql01($url, $cariID)
	{
		$id1 = $url . 'kelas1/ubah/' . $cariID;
		$id2 = $url . 'kelas2/ubah/000/' . $cariID .'/2010/2015/';
		$id3 = $url . 'kelas3/ubah/",kp,"/' . $cariID .'/2010/2015/';
		$url1 = '" &lt;a target=_blank href=' . $id1 . '>SEMAK 1&lt;/a>"';
		$url2 = '" &lt;a target=_blank href=' . $id2 . '>SEMAK 2&lt;/a>"';
		$url3 = 'concat("&lt;a target=_blank href=' . $id3 . '>SEMAK 3&lt;/a>")';

		$sql = ''
			. 'concat_ws("|",nama,' . $url1 . ',' . $url3 .') nama,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," responden",responden),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax),' . "\r"
			. ' 	concat_ws("="," orang_a",orang_a),' . "\r"
			. ' 	concat_ws("="," notel_a",notel_a),' . "\r"
			. ' 	concat_ws("="," nofax_a",nofax_a)' . "\r"
			. ' ) as dataHubungi,' . "\r"
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
			. ' ) as data5P,nota';

		return $sql;
	}
##-------------------------------------------------------------------------------------------------#
	function contoh_data01($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data

		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
##-------------------------------------------------------------------------------------------------#
	public function tanyaDataSesi()
	{
		$dataSulit = new \Aplikasi\Kitab\Sesi();
		//echo '&lt;pre>'; print_r($_SESSION); echo '&lt;/pre>';
		$idUser = $dataSulit->get('bs_namaPendek');
		$nohp = $dataSulit->get('bs_nohp');
		/*echo 'idUser=' . $dataSulit->get('idUser') . '&lt;br>';
		echo 'namaPendek=' . $dataSulit->get('namaPendek') . '&lt;br>';
		echo 'namaPenuh=' . $dataSulit->get('namaPenuh') . '&lt;br>';
		echo 'email=' . $dataSulit->get('email') . '&lt;br>';
		echo 'levelPengguna=' . $dataSulit->get('levelPengguna') . '';
		echo '&lt;hr>';//*/

		return array($idUser,$nohp);
	}
##-------------------------------------------------------------------------------------------------#
#===================================================================================================
#--------------------------------------------------------------------------------------------------#
}