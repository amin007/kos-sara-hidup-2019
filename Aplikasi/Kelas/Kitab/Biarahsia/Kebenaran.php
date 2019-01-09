<?php
/**
 * Kawalan keselamatan untuk masuk dan keluar sistem
		Kebenaran::kawalMasuk();
		Kebenaran::kawalKeluar();
 */
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Kebenaran
{
#====================================================================================
	/* Kebenaran::kawalMasuk() khas untuk
	 * class login dan index
	 * supaya kalau user berada dalam class tersebut
	 * sistem automatik masuk class ruangtamu
	 */
	public static function kawalMasuk()
	{
		list($kunci,$level,$c1,$c2,$c3) = \Aplikasi\Kitab\Kebenaran::semak();

		/*echo '<hr><pre>kawalMasuk() :: $_SESSION->'; print_r($_SESSION);
		echo '$c3->'; print_r($c3);
		echo '<br>$kunci=' . $kunci . '|$level=' . $level . '|</pre><hr>';//*/

		if ($kunci == true && in_array($level,$c1))
			header('location:' . URL . 'ruangtamu');
		if ($kunci == true && in_array($level,$c2))
			header('location:' . URL . 'admin1home');
		if ($kunci == true && in_array($level,array('admin2')))
			header('location:' . URL . 'admin2home');
		//*/
	}
#------------------------------------------------------------------------------------
	private static function semak()
	{
		@session_start();
		$kunci = \Aplikasi\Kitab\Sesi::get('bs_loggedIn');
		$level = \Aplikasi\Kitab\Sesi::get('bs_levelPengguna');
		$c1 = array('pelawat','user','fe','pegawai');
		$c2 = array('pentadbir','admin1home','admin2');
		$c3 = array_merge($c1,$c2);

		return array($kunci,$level,$c1,$c2,$c3);
	}
#------------------------------------------------------------------------------------
	public static function kawalKeluar()
	{
		list($kunci,$level,$c1,$c2,$c3) = \Aplikasi\Kitab\Kebenaran::semak();

		/*echo '<hr><pre>kawalKeluar() :: $_SESSION->'; print_r($_SESSION);
		echo '$c3->'; print_r($c3);
		echo '<br>$kunci=' . $kunci . '|$level=' . $level . '|</pre><hr>';//*/

		if ($kunci == false || !in_array($level,$c3))
		{
			Sesi::destroy();
			header('location:' . URL . '');
			exit;
		}
		//*/
	}
#------------------------------------------------------------------------------------
	public static function papar($_folder)
	{
		# pergi papar kandungan fungsi papar() dalam KAWAL
		$senaraiPengguna = array('fe','kup','pegawai');
		$senaraiPentadbir = array('kawal');
		if (in_array(Sesi::get('be18_levelPengguna'), $senaraiPentadbir))
		{
			$paras = 'Paras Pentadbir:' . Sesi::get('levelPengguna');
			return $_folder . 'index';
			//echo $paras . '<br>$this->lihat->baca(' . $_folder . 'index)';
		}
		elseif (in_array(Sesi::get('be18_levelPengguna'), $senaraiPengguna))
		{
			$paras = 'Paras Pengguna:' . Sesi::get('levelPengguna');
			return $_folder . 'papar';
			//echo $paras . '<br>$this->lihat->baca(' . $_folder . 'papar)';
		}
		else
		{
			$paras = null;
			return 'ruangtamu/index';
		}
		# pergi papar kandungan fungsi papar() dalam KAWAL
	}
#------------------------------------------------------------------------------------
	public static function tambahSimpan($_folder)
	{
		# pergi papar kandungan tambahSimpan() dalam KAWAL
		$senaraiPengguna = array('fe','kup','pegawai');
		$senaraiPentadbir = array('kawal');
		if (in_array(Sesi::get('be18_levelPengguna'), $senaraiPentadbir))
		{
			$paras = 'Paras Pentadbir:' . Sesi::get('be18_levelPengguna');
			header('location: ' . URL . $_folder . '');
			//echo $paras . '<br>location: ' . URL . $_folder . '';
		}
		elseif (in_array(Sesi::get('be18_levelPengguna'), $senaraiPengguna))
		{
			$paras = 'Paras Pengguna:' . Sesi::get('be18_levelPengguna');
			header('location: ' . URL . $_folder . 'papar');
			//echo $paras . '<br>location: ' . URL . $_folder . 'papar';
		}
		else
		{
			$paras = null;
			header('location: ' . URL);
		}
		# pergi papar kandungan tambahSimpan() dalam KAWAL
	}
#------------------------------------------------------------------------------------
	public static function ubahSimpan($_folder, $ID)
	{
		# pergi papar kandungan ubahSimpan($medanID, $cariID) dalam KAWAL
		$senaraiPengguna = array('fe','kup','pegawai');
		$senaraiPentadbir = array('kawal');
		if (in_array(Sesi::get('be18_levelPengguna'), $senaraiPentadbir))
		{
			$paras = 'Paras Pentadbir:' . Sesi::get('be18_levelPengguna');
			header('location: ' . URL . $_folder . $ID);
			//echo $paras . '<br>location: ' . URL . $_folder . $ID;
		}
		elseif (in_array(Sesi::get('be18_levelPengguna'), $senaraiPengguna))
		{
			$paras = 'Paras Pengguna:' . Sesi::get('be18_levelPengguna');
			header('location: ' . URL . $_folder . 'papar');
			//echo $paras . '<br>location: ' . URL . $_folder . 'papar';
		}
		else
		{
			$paras = null;
			header('location: ' . URL);
		}
		# pergi papar kandungan ubahSimpan($medanID, $cariID) dalam KAWAL
	}
#====================================================================================
}