<?php
namespace Aplikasi\Kawal;//echo __NAMESPACE__;
class Sesat extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_tajukAtas = 'Enjin - Sesat';
		$this->_folder = huruf('kecil', namaClass($this));
		//$this->_folder = 'index';
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##-----------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->mesej = __METHOD__;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
##-----------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude=1)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##-----------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==========================================================================================
	function parameter()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->mesej = 'Class wujud tapi parameter/method/fungsi tidak wujud';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej,'mesej',0);# Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
#-------------------------------------------------------------------------------------------
	function classTidakWujud($amaran)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->mesej = $amaran;
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej,'mesej',0);# Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
#-------------------------------------------------------------------------------------------
	function methodTanyaTidakWujud($amaran,$class,$method)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->mesej = $amaran
			. "|class=$class|fungsi=$method|";
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej,'mesej',0);# Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
#-------------------------------------------------------------------------------------------
	function folderPaparTidakWujud()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		echo $this->papar->mesej = 'folder tidak wujud dalam PAPAR';
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej,'mesej',0);# Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
#-------------------------------------------------------------------------------------------
	function failTidakWujud()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->mesej = 'Fail tidak wujud dalam PAPAR';
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej,'mesej',0);# Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
#-------------------------------------------------------------------------------------------
	function masalahDB($amaran)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pemboleubah utama
		$this->papar->mesej = $amaran;
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej,'mesej',0);# Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}