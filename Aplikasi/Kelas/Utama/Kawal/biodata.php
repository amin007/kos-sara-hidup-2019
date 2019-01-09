<?php
namespace Aplikasi\Kawal;//echo __NAMESPACE__;
class Biodata extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		$this->_namaClass = '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->_namaFunction = '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		# Set pembolehubah utama
		$this->papar->tajuk = namaClass($this);
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, 'index', $noInclude=0);
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
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function debugKandunganPaparan()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr><pre>';
		$semak = array('idBorang','senarai','myTable','_jadual','carian','c1','c2',
			'medan','kiramedan','bentukJadual01','bentukJadual02','bentukJadual03',
			'_meta','_method');
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
		echo '</font><hr>';
		echo '</pre>';
	}
#-------------------------------------------------------------------------------------------
	function ubahMeta($meta)
	{
		$kira = count($meta);
		//echo "<hr> bil untuk \$meta = $kira <br>";
		foreach($meta as $key => $pilih):
			$key2 = $pilih['name'];
			//$meta[$key2]['table'] = $pilih['table'];
			//$meta[$key2]['nama'] = $pilih['name'];
			$meta[$key2]['len'] = $pilih['len'];
			$meta[$key2]['type'] = $pilih['native_type'];
			$meta[$key2]['key'] = isset($pilih['flags'][1]) ?
				$pilih['flags'][0].'|'.$pilih['flags'][1] : null;
			$meta[$key2]['type_pdo'] = $pilih['pdo_type'];
			$meta[$key2]['type_precision'] = $pilih['precision'];
			/*unset($meta[$key]['table']);
			unset($meta[$key]['name']);
			unset($meta[$key]['len']);
			unset($meta[$key]['native_type']);
			unset($meta[$key]['flags']);
			unset($meta[$key]['pdo_type']);
			unset($meta[$key]['precision']);//*/
			unset($meta[$key]);
		endforeach;
		//$this->semakPembolehubah($meta);
		return $meta;
	}
#-------------------------------------------------------------------------------------------
	public function contoh($action = 'hasil')
	{
		# Set pemboleubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai,'senarai',0);# Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $pilihFail, $noInclude=1);
	}
#-------------------------------------------------------------------------------------------
	public function pembolehubahSesi()
	{
		$sesi = \Aplikasi\Kitab\Sesi::init();
		//echo '<pre>MENU_ATAS - $_SESSION:'; print_r($_SESSION); echo '</pre><br>';
		# set pembolehubah
		$pengguna = \Aplikasi\Kitab\Sesi::get('bs_namaPendek');
		$level = \Aplikasi\Kitab\Sesi::get('bs_levelPengguna');

		return array($pengguna, $level);
	}
#-------------------------------------------------------------------------------------------
	public function register()
	{
		# Set pembolehubah utama

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai,'senarai',0);# Semak data dulu
		//$this->_folder = ''; # jika mahu ubah lokasi Papar
		//$this->paparKandungan($this->_folder, 'b_register' , $noInclude=0);
		//*/
    }
#-------------------------------------------------------------------------------------------
	public function ubah()
	{# Set pembolehubah utama
		//echo '<hr>' . $this->_namaClass . '<hr>';
		$this->jadualBiodata();
		$this->papar->template = 'template_biasa';
		//$this->papar->template = 'template_bootstrap';
		//$this->debugKandunganPaparan();//*/
		$fail = array('index','b_ubah','b_ubah_kawalan');

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai,'senarai',0);# Semak data dulu
		$this->_folder = 'cari'; # jika mahu ubah lokasi Papar
		$this->paparKandungan($this->_folder, $fail[1] , $noInclude=0);//*/
    }
#-------------------------------------------------------------------------------------------
	function umpukNilai($umpuk)
	{
		list($senarai, $meta, $medan01, $pengguna, $myTable) = $umpuk;
		$this->papar->medanID = $medan01;
		$this->papar->cariID = $pengguna;
		$this->papar->carian[] = $pengguna;
		$this->papar->_jadual = $myTable;
		$this->papar->_meta = $this->ubahMeta($meta);
		$this->papar->senarai = $senarai;
		$this->papar->_cariIndustri = null;
		$this->papar->bentukJadual01 = null;
		$this->papar->_method = huruf('kecil', namaClass($this));
		//$this->semakDataJadual($senarai); # semak Pembolehubah
	}
#-------------------------------------------------------------------------------------------
	private function jadualBiodata()
	{
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_biodata');
		list($pengguna, $level) = $this->pembolehubahSesi(); //echo "<pre>";

		# bentuk tatasusunan $carian //$carian = null;
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $pengguna); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $level); # benda yang dicari
		# semak database
			list($senarai[$myTable],$meta) = $this->tanya->
				pilihMedan03($myTable, $medan, $carian, null);
				//cariSemuaData("`$myTable`", $medan, $carian, null);
				//cariSql("`$myTable`", $medan, $carian, null);
		# semak pembolehubah
			$this->umpukNilai(array($senarai, $meta, $medan01,
				$pengguna, $myTable));

		return array($senarai, $pengguna);
	}
#-------------------------------------------------------------------------------------------
	public function ubahSimpan($dataID)
	{
		list($medanID,$senaraiJadual,$pass,$pass2) = dpt_senarai('jadual_biodata3');
		# ubahsuai $posmen
		$posmen = $this->ubahsuaiPost($medanID, $dataID, $senaraiJadual, $pass, $pass2);
		//$this->semakPembolehubah($dataID,'dataID',0);
		//$this->semakPembolehubah($_POST,'_POST',0);
		//$this->semakPembolehubah($posmen,'posmen',0);

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$this->tanya->//ubahSqlSimpan
			ubahSimpan
			($posmen[$jadual], $jadual, $medanID);
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location: ' . URL . 'biodata/ubah/' . $dataID;
		header('location: ' . URL . 'biodata/ubah/' . $dataID); //*/
	}
#-------------------------------------------------------------------------------------------
	function ubahsuaiPost($medanID, $dataID, $senaraiJadual, $pass, $pass2)
	{
		$posmen = array();
		foreach ($_POST as $myTable => $value):
			if ( in_array($myTable,$senaraiJadual) ):
				foreach ($value as $kekunci => $papar)
				{
					$posmen[$myTable][$kekunci] = bersih($papar);
					$posmen[$myTable][$medanID] = $dataID;
				}//*/
		endif; endforeach;

		//$this->semakPembolehubah($senaraiJadual,'senaraiJadual',0);
		//$this->semakPembolehubah($medanID,'medanID',0);
		//$this->semakPembolehubah($_POST,'_POST',0);
		//$this->semakPembolehubah($posmen,'posmen',0);

		$posmen = $this->kataLaluanX($senaraiJadual[0], $posmen);
		$posmen = $this->tanya->semakPosmen($senaraiJadual[0], $posmen, $pass, $pass2);

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public function kataLaluanX($myTable, $posmen)
	{
		$surat = array('kataLaluan');
		foreach ($surat as $kekunci)
		if(isset($posmen[$myTable][$kekunci . 'X']))
			if(empty($posmen[$myTable][$kekunci . 'X'])):
				unset($posmen[$myTable][$kekunci . 'X']);
			else:
				unset($posmen[$myTable][$kekunci . 'X']);
			endif;

		return $posmen; # pulangkan nilai
	}
#-------------------------------------------------------------------------------------------
	public function semakRahsia($data)
	{
		$this->rahsiaBiodata();
		$cincang = $this->papar->_cincang;
		$semak = \Aplikasi\Kitab\RahsiaHash::sahkan($data, $cincang);

		if($semak == '1'):
			echo '<br>' . $data . ' disahkan betul';
		else:
			echo '<br>' . $data . ' disahkan gila hahaha';
		endif;
	}
#-------------------------------------------------------------------------------------------
	private function rahsiaBiodata()
	{
		list($myTable,$medan01,$medan02,$medan03,$medan) = dpt_senarai('jadual_biodata5');
		list($pengguna, $level) = $this->pembolehubahSesi(); //echo "<pre>";

		# bentuk tatasusunan $carian //$carian = null;
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $pengguna); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $level); # benda yang dicari
		# semak database
			$senarai[$myTable] = $this->tanya->
				//cariSemuaData("`$myTable`", $medan, $carian, null);
				cariSql("`$myTable`", $medan, $carian, null);
		# semak pembolehubah
			$this->umpukNilai2(array($senarai,$pengguna,$medan01,$medan03,
				$pengguna,$myTable));

		return array($senarai, $pengguna);
	}
#-------------------------------------------------------------------------------------------
	function umpukNilai2($umpuk)
	{
		list($senarai,$pengguna,$medan01,$medan03,$pengguna,$myTable) = $umpuk;
		$this->papar->medanID = $medan01;
		$this->papar->cariID = $pengguna;
		$this->papar->carian[] = $pengguna;
		$this->papar->_jadual = $myTable;
		$this->papar->senarai = $senarai;
		$this->papar->_cincang = $senarai[$myTable][0][$medan03];
		$this->papar->_method = huruf('kecil', namaClass($this));
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
	}
#-------------------------------------------------------------------------------------------
	public function email($id)
	{
		$posmen = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $id);
		echo '$posmen = ' . $posmen;
		//*/
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}