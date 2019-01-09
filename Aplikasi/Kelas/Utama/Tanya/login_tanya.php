<?php
namespace Aplikasi\Tanya;//echo __NAMESPACE__;
class Login_Tanya extends \Aplikasi\Kitab\Tanya
{
#====================================================================================================
#---------------------------------------------------------------------------------------------------#
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	function dapatid($nama)
	{
		//echo '<pre>$_POST->'; print_r($_POST) . '</pre>| ';
		echo '<pre>$nama->'; print_r($nama) . '</pre>| ';
		//echo 'Kod:' . \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $nama) . ': ';
		//echo 'Kod:' . RahsiaHash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) . ': ';
		# rujuk https://gist.github.com/odan/1d4ff4c4088e906a5a49
		$garam = \Aplikasi\Kitab\RahsiaHash::cincang($nama);
		echo '<br>Kod:' . $garam . ': ';
		//$nama = $nama . 'cubaan';
		echo '<br>Kod:' . \Aplikasi\Kitab\RahsiaHash::sahkan($nama, $garam) . ': ';
		//*/
	}
#---------------------------------------------------------------------------------------------------#
	function contoh01($medan = '*', $jadual = 'nama_pengguna')
	{
		$semakLogin = $this->db->prepare("
			SELECT  $medan FROM  $jadual WHERE
			email = :username AND kataLaluan = :password");
		$pass01 = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $_POST['password']);
		//$pass01 = \Aplikasi\Kitab\RahsiaHash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)

		$semakLogin->execute(array(
			':username' => $_POST['username'],
			':password' => $pass01,
		));

		$semakLogin->debugDumpParams(); # semak $sth->debugDumpParams()
		$data = $semakLogin->fetch(); # dapatkan medan terlibat
		$kira = $semakLogin->rowCount(); # kira jumlah data
		//*/
		//$data = $this->data_contoh(0); # data olok-olok | dapatkan medan terlibat
		//$kira = $this->data_contoh(1); # data olok-olok | kira jumlah data
		echo ' |<pre>$data='; print_r($data); echo '</pre> | $kira=' . $kira;
	}
#---------------------------------------------------------------------------------------------------#
	function contoh02($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data

		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
#====================================================================================================
#---------------------------------------------------------------------------------------------------#
	function ubahsuaiPostBaru($senaraiJadual)
	{
		$posmen = array();
		foreach ($_POST as $myTable => $value):
		if ( in_array($myTable,$senaraiJadual) ):
			foreach ($value as $kekunci => $papar)
			{
				$posmen[$myTable][$kekunci] = bersih($papar);
			}//*/
		endif; endforeach;
		# semak data
		$posmen = $this->semaKataLaluan($senaraiJadual[0], $posmen);
		$posmen = $this->kataLaluanX($senaraiJadual[0], $posmen);

		return $posmen;
	}
#---------------------------------------------------------------------------------------------------#
	public function semaKataLaluan($myTable, $posmen)
	{
		$surat = array('kataLaluan');
		foreach ($surat as $kekunci)
		if(isset($posmen[$myTable][$kekunci]))
			if($posmen[$myTable][$kekunci] == $posmen[$myTable][$kekunci . 'X']):
				$pass = $posmen[$myTable][$kekunci];
				$pass = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $pass);
				//$garam = \Aplikasi\Kitab\RahsiaHash::cincang($pass);
				$posmen[$myTable][$kekunci] = $pass;
			else:
			endif;

		return $posmen; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function kataLaluanX($myTable, $posmen)
	{
		$surat = array('kataLaluan');
		foreach ($surat as $kekunci)
		if(isset($posmen[$myTable][$kekunci . 'X']))
			if(empty($posmen[$myTable][$kekunci . 'X'])):
				unset($posmen[$myTable][$kekunci . 'X']);
			else:
				$posmen[$myTable][$kekunci . 'X'] = 'user';
				$posmen[$myTable] = $this->replace_key
					($posmen[$myTable], $kekunci . 'X', 'level');
			endif;

		return $posmen; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function replace_key($arr, $oldkey, $newkey)
	{
		# https://fellowtuts.com/php/change-array-key-without-changing-order/
		if(array_key_exists( $oldkey, $arr))
		{
			$keys = array_keys($arr);
			$keys[array_search($oldkey, $keys)] = $newkey;
			return array_combine($keys, $arr);
		}

		return $arr;
	}
#---------------------------------------------------------------------------------------------------#
#====================================================================================================
}