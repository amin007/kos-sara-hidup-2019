<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Index extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->tajuk = namaClass($this);

		# Pergi papar kandungan
		$fail = array('index','login','daftar','ingatsemula');
		//$this->semakPembolehubah($this->papar->senarai,'senarai',0);# Semak data dulu
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=1);
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
#==========================================================================================
#------------------------------------------------------------------------------------------
	function daftar()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Pergi papar kandungan
		$fail = array('index','login','daftar','ingatsemula');
		//$this->semakPembolehubah($this->papar->senarai,'senarai',0);# Semak data dulu
		$this->paparKandungan($this->_folder, $fail[2], $noInclude=1);
	}
#------------------------------------------------------------------------------------------
	function lupadaa()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Pergi papar kandungan
		$fail = array('index','login','daftar','ingatsemula');
		//$this->semakPembolehubah($this->papar->senarai,'senarai',0);# Semak data dulu
		$this->paparKandungan($this->_folder, $fail[3], $noInclude=1);
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}