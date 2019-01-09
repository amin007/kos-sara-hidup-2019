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
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->paparJadual(); # Set pembolehubah utama

		/*# Pergi papar kandungan
		//$this->_folder = 'cari';
		$fail = array('1cari','index','b_baru,'b_ubah');
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
	public function paparJadual()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//$this->semakPembolehubah($_POST,'POST');//*/
		//$this->debugKandunganPaparan();//*/
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}
