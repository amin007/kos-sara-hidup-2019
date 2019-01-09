<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Isirumah_Tanya extends \Aplikasi\Kitab\Tanya
{
#===========================================================================================
#------------------------------------------------------------------------------------------#
	public function __construct()
	{
		parent::__construct();
	}
#------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakData($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#------------------------------------------------------------------------------------------#
	function contoh_sql01($url, $cariID)
	{
		$id1 = $url . 'kelas1/ubah/' . $cariID;
		$id2 = $url . 'kelas2/ubah/000/' . $cariID .'/2010/2015/';
		$id3 = $url . 'kelas3/ubah/",kp,"/' . $cariID .'/2010/2015/';
		$url1 = '" <a target=_blank href=' . $id1 . '>SEMAK 1</a>"';
		$url2 = '" <a target=_blank href=' . $id2 . '>SEMAK 2</a>"';
		$url3 = 'concat("<a target=_blank href=' . $id3 . '>SEMAK 3</a>")';

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
#------------------------------------------------------------------------------------------#
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
#------------------------------------------------------------------------------------------#
	public function tanyaDataSesi()
	{
		$dataSulit = new \Aplikasi\Kitab\Sesi();
		//echo '<pre>'; print_r($_SESSION); echo '</pre>';
		$idUser = $dataSulit->get('bs_namaPendek');
		$nohp = $dataSulit->get('bs_nohp');
		/*echo 'idUser=' . $dataSulit->get('idUser') . '<br>';
		echo 'namaPendek=' . $dataSulit->get('namaPendek') . '<br>';
		echo 'namaPenuh=' . $dataSulit->get('namaPenuh') . '<br>';
		echo 'email=' . $dataSulit->get('email') . '<br>';
		echo 'levelPengguna=' . $dataSulit->get('levelPengguna') . '';
		echo '<hr>';//*/

		return array($idUser,$nohp);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
#------------------------------------------------------------------------------------------#
	function tentangMedan()
	{
	#***************************************************************************************
		$p = array();
	#***************************************************************************************
		return $p;
	}
#------------------------------------------------------------------------------------------#
	public function cariKhas01($medan1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$mula = 0;
		foreach($medan1 as $key => $nilai0):
		foreach($nilai0 as $key1 => $nilai1):
		foreach($nilai1 as $key2 => $nilai2):
			if($key2 == 'medan')
			{
				$key3[$key1] = $nilai2;
			}
			if($key2 == 'kod')
			{
				$namaMedan = $key3[$key1];
				//echo "<br>\$medanA[$namaMedan][$key1][$key2] = $nilai2\n";
				$medanA[$namaMedan][$mula]['kod'] = $nilai2;
			}
			if($key2 == 'keterangan')
			{
				$namaMedan = $key3[$key1];
				$medanA[$namaMedan][$mula++]['keterangan'] = $nilai2;
			}
		endforeach;endforeach;$mula = 0;endforeach;
		/*$medanB['edagang'][0]['kod'] = '1';
		$medanB['edagang'][0]['keterangan'] = 'ya';
		$medanB['edagang'][1]['kod'] = '2';
		$medanB['edagang'][1]['keterangan'] = 'tidak';*/
		//$medan = array_merge($medan1, $medanA);
		//$this->semakPembolehubah($medan1,'medan1');
		//$this->semakPembolehubah($medanA,'medanA');
		//$this->semakPembolehubah($medanB,'medanB');
		//echo "\n<hr>tamat<hr>\n";
		//*/

		return $medanA;
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
## untuk setkan nama $myTable,$medan,$carian,$susun
#------------------------------------------------------------------------------------------#
	public function susunPembolehubah($a = null, $b = null, $c = null)
	{
		$p = array($a,$b,$c);
		//if($a == 'ubahPencam'): //echo "\$a = $a <br>";
		if($a == 'senarai_isirumah'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->jadualSenaraiIsirumah($p);
		elseif($a == 'kod_borang'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->kodBorang($p);
		elseif($a == 'xxx'): //echo "\$a = $a <br>";
			list($myTable, $medan, $carian, $susun) = $this->xxx($p);
		else: //echo "\$a = $a <br>";
			$myTable = $medan = $carian = $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun);# pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function ubahPencam($jadual,$apa,$cari)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		//list($jadual,$b,$c) = $p;
		$medan = '*'; $carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $apa, # cari dalam medan apa
				'apa' => $cari); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function jadualSenaraiIsirumah($p)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		list($idUser,$nohp) = $this->tanyaDataSesi();
		list($jadual,$b,$c) = $p;
		$medan = '*'; $carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'nohp', # cari dalam medan apa
				'apa' => $nohp); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function kodBorang($p)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		list($jadual,$b,$c) = $p;
		$medan = 'medan,kod,keterangan';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'jadual', # cari dalam medan apa
				'apa' => $b); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function xxx($p)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		list($jadual,$b,$c) = $p;
		$medan = '*'; $carian = $susun = null;
		# semak database
			/*$carian[] = array('fix'=>'x=', # cari x= / %like% / xlike
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medanID, # cari dalam medan apa
				'apa' => $dataID); # benda yang dicari//*/

		return array($jadual, $medan, $carian, $susun);#pulangkan nilai
	}
#------------------------------------------------------------------------------------------#
	function pilihUbahPost()
	{
		$medan = 'no';
		$jadual = array('senarai_isirumah');

		return array($medan,$jadual);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}