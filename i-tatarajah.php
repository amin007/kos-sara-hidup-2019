<?php
# 4 folder utama
define('KAWAL', 'Aplikasi/Kelas/Utama/Kawal');
define('TANYA', 'Aplikasi/Kelas/Utama/Tanya');
define('PAPAR', 'Aplikasi/Fail/Papar');
define('KITAB', 'Aplikasi/Kelas/Kitab');

# Fungsi Global
define('FUNGSI', 'Aplikasi/Fungsi');
require FUNGSI . '/Fungsi.php';

# Sentiasa menyediakan garis condong di belakang (/) pada hujung jalan
define('URL', dirname('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/');
define('Tajuk_Muka_Surat', 'Belanja Sakan');

# setkan jquery, bootstrap dan font awesome sama ada local atau cdn
## cdn
      $jquery_cdn = 'https://code.jquery.com/jquery-2.2.3.min.js';
 $bootstrapJS_cdn = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js';
$bootstrapCSS_cdn = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css';
 $ceruleanCSS_cdn = 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css';
 $fontawesome_cdn = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
## 4.1
 $bootstrapJS_421 = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js';
$bootstrapCSS_421 = 'https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css';
 $ceruleanCSS_421 = 'https://maxcdn.bootstrapcdn.com/bootswatch/4.2.1/cerulean/bootstrap.min.css';
 $fontawesome_563 = 'https://use.fontawesome.com/releases/v5.6.3/css/all.css';
## local
            $sumber = 'sumber/utama/';
      $jquery_local = $sumber . 'jquery/jquery-2.2.3.min.js';
 $bootstrapJS_local = $sumber . 'bootstrap/3.3.7/js/bootstrap.min.js';
$bootstrapCSS_local = $sumber . 'bootstrap/3.3.7/css/bootstrap.min.css';
 $fontawesome_local = $sumber . 'font-awesome/4.7.0/css/font-awesome.min.css';
############################################################################################
## isytihar konsan MYSQL dan GAMBAR ikut lokasi $server
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$server = $_SERVER['SERVER_NAME'];

/*
echo "<br>Alamat IP : <font color='red'>" . $ip . "</font> |
\r<br>Nama PC : <font color='red'>" . $hostname . "</font> |
\r<br>Server : <font color='red'>" . $server . "</font>\r";
//*/

if ($server == 'laman.web.anda')
{	# isytihar tatarajah mysql
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', '***');
	define('DB_USER', '***');
	define('DB_PASS', '***');
	# isytihar lokasi folder js
	define('SUMBER', 'http://' . $_SERVER['SERVER_NAME'] . '/sumberonline/');
	define('JQUERY', $jquery_cdn);
	define('FONTAWESOME', $fontawesome_cdn);
	define('BOOTSTRAPJS', $bootstrapJS_cdn);
	define('BOOTSTRAPCSS', $bootstrapCSS_cdn);
}
else
{	# isytihar tatarajah mysql
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', '***');
	define('DB_USER', '***');
	define('DB_PASS', '***');
	# isytihar lokasi folder js
	define('SUMBER', 'http://' . $_SERVER['SERVER_NAME'] . '/sumberoffline/');
	define('JQUERY', $jquery_local);
	define('FONTAWESOME', $fontawesome_local);
	define('BOOTSTRAPJS', $bootstrapJS_local);
	define('BOOTSTRAPCSS', $bootstrapCSS_local);
	define('BOOTSTRAPJS421', $bootstrapJS_421);
	define('BOOTSTRAPCSS421', $bootstrapCSS_421);
	define('FONTAWESOME563', $fontawesome_563);
}
//echo DB_HOST . "," . DB_USER . "," . DB_PASS . ",," . DB_NAME . "<br>";
############################################################################################
# buat tatasusunan ikut serialize
define('KAKITANGAN', serialize(
	array ('abu','bakar','umar','osman','ali','hasan')
	));
define('ALAMAT_IP', serialize(
	array ('8.8.8.8','1.1.1.1')
	));
## data dalam database lain
$e = 'db_lain.';
define('MSICBARU', serialize (
	array($e.'msic08',$e.'msic2008',
		$e.'msic_v1',$e.'msic_bandingan',
		$e.'msic',$e.'msic_nota_kaki')
	));
## untuk table login
# namaPenuh,namaPendek,email,kataLaluan,level
$loginMedan01 = 'namaPengguna as namaPendek,`kataLaluan`,`level`,Nama_Penuh as namaPenuh,`email`,`nohp`';
define('JADUAL_LOGIN', serialize(
	array ('nama_pengguna','email|nohp','kataLaluan',$loginMedan01)
	));
define('JADUAL_BIODATA2', serialize(
	array ('namaPengguna','kataLaluan','level','Nama_Penuh','email','nohp','CatatNota')
	));