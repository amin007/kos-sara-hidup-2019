<?php
namespace Aplikasi\Kawal;//echo __NAMESPACE__;
class Kotakteks extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->paparJadual(); # Set pembolehubah utama

		# Pergi papar kandungan
		$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparHeader()
	{
		$lokasi = 'pergi/mana';
		//echo '<br>location: ' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location:' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medan','kiramedan','bentukJadual01','bentukJadual02','bentukJadual03',
			'_pilih','_method','_meta','template','pilihJadual','template2','pilihJadual2');
		$takWujud = array(); $kira = 0;

		foreach($semak as $apa):
			if(isset($this->papar->$apa)):
				echo '<br>$this->papar->' . $apa . ' : ';
				print_r($this->papar->$apa);
			else:
				$takWujud[$kira++] = '$this->papar->' . $apa;
			endif;
		endforeach;

		echo '<hr><font color="red">tidak wujud : '; print_r($takWujud);
		echo '</font><hr></pre>';
	}
#-------------------------------------------------------------------------------------------
	function kandunganPaparan($p1, $jadual)
	{
		$this->papar->myTable = $jadual;
		$this->papar->_jadual = $jadual;
		$this->papar->carian[] = 'semua';
		if(!isset($this->papar->c1))
			$this->papar->c1 = null;
		$this->papar->c2 = 'kotakteks';
		$this->papar->_pilih = $p1;
		$this->papar->_method = 'kotakteks';
		$this->papar->baruBorang = 'kotakteks/baru';
		$this->papar->cariID = 'papar';
		$this->papar->pilihJadual = 'pilih_jadual_am';
		$this->papar->template2 = 'template_khas02';
		$this->papar->pilihJadual2 = 'pilih_jadual_am2';
		$this->papar->template3 = 'template_khas03';
		$this->papar->pilihJadual3 = 'pilih_jadual_am';
		//$this->papar->template2 = 'template_bootstrap';
		//$this->papar->template3 = 'template_bootstrap_table';
		//$this->papar->template1 = 'template_khas01';
		//$this->papar->template0 = 'template_biasa';
		//*/
	}
#-------------------------------------------------------------------------------------------
	function ubahMeta($meta)
	{
		foreach($meta as $key => $pilih):
			$key2 = $pilih['name'];
			if(!isset($pilih['flags'][1]))# jika ('primary_key'), abaikan
				$data[0][$key2] = null;
			//$table = $pilih['table'];
			$meta[$key2]['len'] = $pilih['len'];
			$meta[$key2]['type'] = $pilih['native_type'];
			$meta[$key2]['key'] = isset($pilih['flags'][1]) ?
				$pilih['flags'][0].'|'.$pilih['flags'][1] : null;
			$meta[$key2]['type_pdo'] = $pilih['pdo_type'];
			$meta[$key2]['type_precision'] = $pilih['precision'];
			unset($meta[$key]);
		endforeach;
		//$this->semakPembolehubah($meta,'meta');
		//$this->semakPembolehubah($data,'data');

		return array($data,$meta);
	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
	function panggilKhas01($p1)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		list($data, $medan, $carian, $susun) =
			$this->tanya->susunPembolehubah($p1);
		list($data,$a) = $this->tanya->//cariSql2Table
			cariData2JadualMeta
			($data, $medan, $carian, $susun);
		$this->papar->senarai[$p1] = $data;
		list($b,$meta) = $this->ubahMeta($a);
		$this->papar->_meta[$p1] = $meta;
		# Set pembolehubah untuk Papar
		$this->kandunganPaparan($p1,$p1);
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
#-------------------------------------------------------------------------------------------
	public function paparJadual()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//$this->semakPembolehubah($_POST,'POST');//*/
		$this->panggilKhas01('paparcoicop');
		$this->papar->template = 'template_bootstrap';
		//$this->papar->template = 'template_biasa';
		//$this->debugKandunganPaparan();//*/
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}
