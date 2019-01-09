<?php
$namaClass = huruf('Besar',$url[0]);
$namaFungsi = isset($url[1]) ? $url[1] : 'index';
$a = isset($url[2]) ? '$' . $url[2] : '';
$b = isset($url[3]) ? ',$' . $url[3] : '';
$c = isset($url[4]) ? ',$' . $url[4] : '';
$d = isset($url[5]) ? ',$' . $url[5] : '';
$e = isset($url[6]) ? ',$' . $url[6] : '';
$f = isset($url[7]) ? ',$' . $url[7] : '';
$g = isset($url[8]) ? ',$' . $url[8] : '';
$h = isset($url[9]) ? ',$' . $url[9] : '';
$pencam = "$a$b$c$d$e$f$g$h";
?>

<hr><div class="container">
<pre><code>
Contoh fungsi dalam class <?php echo $namaClass ?> extends \Aplikasi\Kitab\Kawal
----------------------------------------------------------------------------------------------------
&lt;?php
namespace Aplikasi\Kawal;//echo __NAMESPACE__;
class <?php echo $namaClass ?> extends \Aplikasi\Kitab\Kawal
{
#===================================================================================================
##--------------------------------------------------------------------------------------------------
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '&lt;hr>Nama class :' . __METHOD__ . '&lt;hr>';
		//echo '&lt;hr>Nama function :' . __FUNCTION__ . '&lt;hr>';
	}
##--------------------------------------------------------------------------------------------------
	public function index()
	{
		echo '&lt;hr> Nama class : ' . __METHOD__ . '&lt;hr>';
		$this->paparJadual(); # Set pembolehubah utama

		/*# Pergi papar kandungan
		//$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '&lt;br>$fail = ' . $fail[0] . '&lt;hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##--------------------------------------------------------------------------------------------------
	public function paparHeader($lokasi)
	{
		$lokasi = 'pergi/mana';
		//echo '&lt;br>location: ' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
	}
##--------------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##--------------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '&lt;pre>' . $jadual . '|&lt;br>';
		print_r($senarai); echo '&lt;/pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
##--------------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '&lt;pre>sebelum:'; print_r($_SESSION); '&lt;/pre>';
		//$this->semakPembolehubah($_SESSION,' sebelum $_SESSION')'
		\Aplikasi\Kitab\Sesi::destroy();
		header('location:' . URL);
		//exit;
	}
#===================================================================================================
#---------------------------------------------------------------------------------------------------
	public function <?php echo $namaFungsi ?>(<?php echo $pencam ?>)
	{
		//echo '&lt;hr>Nama class :' . __METHOD__ . '()&lt;hr>';
		$this->semakPembolehubah($_POST,'POST');//*/
		//$this->debugKandunganPaparan();//*/
	}
#---------------------------------------------------------------------------------------------------
</code></pre>
<hr>
<pre><code>
Contoh fungsi dalam class <?php echo $namaClass ?>_Tanya extends \Aplikasi\Kitab\Tanya
----------------------------------------------------------------------------------------------------
&lt;?php
namespace Aplikasi\Tanya;//echo __NAMESPACE__;
class <?php echo $namaClass ?>_Tanya extends \Aplikasi\Kitab\Tanya
{
#===================================================================================================
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
</code></pre>
<hr>
</div><!-- / class="container" -->