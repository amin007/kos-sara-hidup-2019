<?php 
namespace Aplikasi\Kitab; //echo __NAMESPACE__; 
class Tatasusunan
{//new \Aplikasi\Kitab\Tatasusunan ->pilihPencam()
#==========================================================================================
	function array_to_xml($array, &$xml_user_info) 
	{# buat pecahan tatasusunan
		//echo '<hr>Array_Xml<hr>';
		foreach($array as $key => $value)
		{
			if(is_array($value)) 
			{
				if(!is_numeric($key))
				{
					$subnode = $xml_user_info->addChild("$key");
					$this->array_to_xml($value, $subnode);
				}
				else
				{
					//$subnode = $xml_user_info->addChild("item$key");
					$subnode = $xml_user_info->addChild("item");
					$this->array_to_xml($value, $subnode);
				}
			}
			else
			{
				$xml_user_info->addChild("$key",htmlspecialchars("$value"));
			}
		}
	}
#------------------------------------------------------------------------------------------
	function pilihPencam()
	{
		$a = 'kod'; $b = 'keterangan';
	#***************************************************************************************
		$k = 'kod_hasil';
		$p[$k][]=array($a=>'11', $b=>'Upah & gaji(sebelum potongan cukai pendapatan,'
		. ' pencaruman KWSP, dll.)|11' );
		$p[$k][]=array($a=>'12', $b=>'Elaun(cth:elaun sara hidup, elaun pakar, elaun'
		. ' perumahan, elaun luar negeri, dll.)|12' );
		$p[$k][]=array($a=>'13', $b=>'Bonus|13' );
		$p[$k][]=array($a=>'14', $b=>'Wang tunai lain(cth:komisen, tip, pendapatan'
		. ' daripada kerja lebih masa, dll.)|14' );
		$p[$k][]=array($a=>'15', $b=>'Makanan percuma/konsesi|15' );
		$p[$k][]=array($a=>'16', $b=>'Tempat menginap percuma/konsesi|16' );
		$p[$k][]=array($a=>'17', $b=>'Barang pengguna & perkhidmatan percuma/konsesi|17' );
		$p[$k][]=array($a=>'18', $b=>'Pembayaran lain yg diterima berupa mata benda'
		. ' (cth:padi, getah, kelapa, dll.)|18' );
		$p[$k][]=array($a=>'19a', $b=>'Pencaruman majikan kpd KWSP|19a' );
		$p[$k][]=array($a=>'19b', $b=>'Pencaruman majikan kpd PERKESO, dll.|19b' );
		$p[$k][]=array($a=>'19c', $b=>'Pencaruman majikan kpd dll.|19c' );
		$p[$k][]=array($a=>'19', $b=>'Jumlah [19a+19b+19c]|19' );
		$p[$k][]=array($a=>'01', $b=>'[A]JUMLAH PENDAPATAN PEKERJAAN BERGAJI'
		. ' [INCS{(11)+(12)+ ... +(19)}]|01' );
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil drp pertanian & perikanan:';
		$b2 = '[Gunakan helaian kerja PPIK/HK-2/3]';
		$p[$k][]=array($a=>'21A(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus dll'
		. $b2 . '|21A(i)');
		$p[$k][]=array($a=>'21A(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. $b2 .'|21A(ii)');
		$p[$k][]=array($a=>'21A(iii)', $b=>$b1.' bukan dlm talian'.$b2.'|21A(iii)');
		$p[$k][]=array($a=>'21A', $b=>'Jumlah [21A(i)+21A(ii)+21A(iii)]|21A');
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil drp ICT:';
		$b2 = '[Gunakan helaian kerja PPIK/HK-4]';
		$p[$k][]=array($a=>'21b(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus'
		. ' dll' . $b2 . '|21b(i)');
		$p[$k][]=array($a=>'21b(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. $b2 .'|21b(ii)');
		$p[$k][]=array($a=>'21b(iii)', $b=>$b1.' bukan dlm talian'.$b2.'|21b(iii)');
		$p[$k][]=array($a=>'21b', $b=>'Jumlah [21b(i)+21b(ii)+21b(iii)]|21b');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'21c', $b=>'Komisen drp aktiviti ICT'
		. '(cth: komisen drp penyiaran iklan berbayar di website|21c');
		#-----------------------------------------------------------------------------------
		$b1 = 'Bukan pertanian & ict(Hasil Pengangkutan):';
		$b2 = '[Gunakan helaian kerja PPIK/HK-5]';
		$p[$k][]=array($a=>'21d(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt grab,uber,mycar,website khusus'
		. ' dll' . $b2 . '|21d(i)');
		$p[$k][]=array($a=>'21d(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. $b2 .'|21d(ii)');
		$p[$k][]=array($a=>'21d(iii)', $b=>$b1.' bukan dlm talian'.$b2.'|21d(iii)');
		$p[$k][]=array($a=>'21d', $b=>'Jumlah [21d(i)+21d(ii)+21d(iii)]|21d');
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil lain:';
		$b2 = '[Gunakan helaian kerja PPIK/HK-6]';
		$p[$k][]=array($a=>'21e(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus'
		. ' dll' . $b2 . '|21e(i)');
		$p[$k][]=array($a=>'21e(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. $b2 .'|21e(ii)');
		$p[$k][]=array($a=>'21e(iii)', $b=>$b1.' bukan dlm talian'.$b2.'|21e(iii)');
		$p[$k][]=array($a=>'21e', $b=>'Jumlah [21e(i)+21e(ii)+21e(iii)]|21e');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'21NA', $b=>'Jumlah [21b+21c+21d+21e]|21c');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'21KS', $b=>'Kegunaan sendiri [Gunakan helaian kerja'
		. ' PPIR/HK-7]|21KS');
		$p[$k][]=array($a=>'21', $b=>'JUMLAH PENDAPATAN PEKERJAAN SENDIRI'
		. ' [INCS{(21A)+(21NA)+(21KS}]|21');
		#-----------------------------------------------------------------------------------
		$b2 = 'Gunakan helaian kerja PPIK/HK-8';
		$p[$k][]=array($a=>'22', $b=>'(i)Sewa dinilai bagi rumah yg diduduki oleh'
		. ' pemiliknya['.$b2.'...INCS22]|22');
		$p[$k][]=array($a=>'23', $b=>'(ii)Rumah/Harta lain yg disewakan ['
		. $b2 . '...INCS23]|23');
		$p[$k][]=array($a=>'24', $b=>'(iii)Sewa daripada tmpt menginap (cth:'
		. ' sewa bilik di TK terpilih)|24');
		$p[$k][]=array($a=>'02', $b=>'[B] JUMLAH PENDAPATAN LAIN DIPEROLEH'
		. ' [INCS{(21)+(22)+(23)+(24)}]|02');
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil selain pendapatan diperoleh:';
		$p[$k][]=array($a=>'31', $b=>$b1.'(i) Royalti(cth:hak cipta, paten &'
		. ' hak yg. serupa)|31');
		$p[$k][]=array($a=>'32a', $b=>$b1.'(ii-a) Sewa drp tanah pertanian'
		. ' [Gunakan helaian kerja PPIK/HK-8...INCS32]|32a');
		$p[$k][]=array($a=>'32a', $b=>$b1.'(ii-b) Sewa drp tanah bukan pertanian'
		. ' [Gunakan helaian kerja PPIK/HK-8...INCS32]|32a');
		$p[$k][]=array($a=>'32a', $b=>$b1.'(ii)Jumlah [32a+32b]|32');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'33', $b=>$b1.'(iii) Faedah(cth:deposit bank, bil, bon,'
		. ' pinjaman, dll.)|33');
		$p[$k][]=array($a=>'34', $b=>$b1.'(iv) Dividen(cth: hak milik saham,'
		. ' saham amanah dll.)|34');
		$p[$k][]=array($a=>'03', $b=>$b1.'[C]JUMLAH PENDAPATAN DRP HARTA'
		. ' [INCS{(31)+(32)+(33)+(34)}]|03');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'41a', $b=>$b1.'(i-a)Kiriman wang yg diterima drp isi rumah'
		. ' yg lain dlm negeri/negara)|41a');
		$p[$k][]=array($a=>'41b', $b=>$b1.'(i-b)Kiriman wang yg diterima drp isi rumah'
		. ' yg lain luar negeri/negara)|41b');
		$p[$k][]=array($a=>'41', $b=>$b1.'Jumlah [41a+41b]|41');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'42', $b=>$b1.'(ii) Nafkah|42');
		$p[$k][]=array($a=>'43', $b=>$b1.'(iii) Biasiswa/Dermasiswa/Fellowships|43');
		$p[$k][]=array($a=>'44', $b=>$b1.'(iv) Pencen|44');
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil selain pendapatan diperoleh:<br>'
		. '(v)Pembayaran lain berkala yg diterima:';
		$p[$k][]=array($a=>'45a', $b=>$b1.'a. Elaun yg diterima oleh kerabat diraja |45a');
		$p[$k][]=array($a=>'45b', $b=>$b1.'b. Bantuan yg diterima secara bulanan drp '
		. 'Jab. Kebajikan Masyarakat dan/atau agensi kerajaan lain secara berkala |45b');
		$p[$k][]=array($a=>'45c', $b=>$b1.'c. Penerimaan wang secara berkala drp'
		. ' harta pusaka/tabung wang amanah|45c');
		$p[$k][]=array($a=>'45d', $b=>$b1.'d. Pembayaran insurans secara berkala'
		. ' disebabkan oleh kecederaan|45d');
		$p[$k][]=array($a=>'45e', $b=>$b1.'e. Pampasan diberikan oleh majikan kpd'
		. 'staf disebabkan kecacatan akibat kemalangan semasa bekerja. Pembayaran'
		. ' diberi secara berkala setiap bulan berbentuk wang tunai|45e');
		$p[$k][]=array($a=>'45f', $b=>$b1.'f. Elaun yg diterima oleh imam, bilal,'
		. ' & siak yg dibayar bawah peruntukan masjid|45f');
		$p[$k][]=array($a=>'45g', $b=>$b1.'g. Elaun yg diterima oleg sami/paderi'
		. ' yang dibayar oleh rumah ibadat|45g');
		$p[$k][]=array($a=>'45h', $b=>$b1.'h. Elaun bulanan ahli sukan (bukan profesional)'
		. ' yg diterima drp Majlis Sukan Negara Malaysia|45h');
		$p[$k][]=array($a=>'45i', $b=>$b1.'i. Lain-lain elaun(cth: undang, kumpulan'
		. ' wang amanah, dll|45i');
		$p[$k][]=array($a=>'45j', $b=>$b1.'j. Bantuan Sara Hidup/BRIM|45j');
		$p[$k][]=array($a=>'45k', $b=>$b1.'k. Bantuan persekolahan|45k');
		$p[$k][]=array($a=>'45l', $b=>$b1.'l. Baucer Buku 1Malaysia(BB1M)/'
		. 'Kad Debit Pelajar(KADS1M)|45l');
		$p[$k][]=array($a=>'45', $b=>$b1.'Jumlah [45a+45b+...45l] |45');
		#-----------------------------------------------------------------------------------
		$b1 = 'Hasil selain pendapatan diperoleh:<br>'
		. '(vi)Hadiah berupa ';
		$p[$k][]=array($a=>'46a(i)', $b=>$b1.'Tunai: a(i). Kerajaan Persekutuan|46a(i)');
		$p[$k][]=array($a=>'46a(ii)', $b=>$b1.'Tunai: a(ii). Kerajaan Negeri|46a(ii)');
		$p[$k][]=array($a=>'46a', $b=>$b1.'Tunai: JUMLAH [46a(i)+46a(ii)|46a');
		$p[$k][]=array($a=>'46b', $b=>$b1.'Tunai: b. NGO/Swasta|46b');
		$p[$k][]=array($a=>'46c', $b=>$b1.'Tunai: c. Individu|46c');
		$p[$k][]=array($a=>'46d(i)', $b=>$b1.'Mata benda:a(i). Kerajaan Persekutuan|46d(i)');
		$p[$k][]=array($a=>'46d(ii)', $b=>$b1.'Mata benda:a(ii). Kerajaan Negeri|46d(i)');
		$p[$k][]=array($a=>'46d', $b=>$b1.'Mata benda:JUMLAH [46d(i)+46d(ii)|46d');
		$p[$k][]=array($a=>'46e', $b=>$b1.'Mata benda: b. NGO/Swasta c. Individu|46e');
		$p[$k][]=array($a=>'46f', $b=>$b1.'Mata benda: c. Individu|46f');
		$p[$k][]=array($a=>'46', $b=>$b1.'Jumlah [46d(i)+46d(ii)|46');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'05', $b=>'[D]JUMLAH PINDAHAN SEMASA YG DITERIMA<br>'
		. '[INCS{(41)+(42)+(43)+(44)(45)+(46)}]|05');
		$p[$k][]=array($a=>'TP73', $b=>'[E]JUMLAH PINDAHAN SEMASA<br>'
		. ' [TP 73 (Rujuk JR-C PPIR 3)]|TP73');
		$p[$k][]=array($a=>'06', $b=>'[F]JUMLAH PINDAHAN SEMASA BERSIH YG DITERIMA<br>'
		. ' [INCS 05 - TP73]|06');
		$p[$k][]=array($a=>'07', $b=>'JUMLAH KASAR[INCS{(01)+(02)+(03)+(05)}]|07' );
		$p[$k][]=array($a=>'08', $b=>'JUMLAH BERSIH[INCS{(01)+(02)+(03)+(06)}]|08');
	#***************************************************************************************
		$k = 'kod_bayarpindahansemasa';
		$b1 = 'Bayaran wajib/denda (TP 73A):';
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'61a', $b=>$b1.'1a. Cukai pendapatan|61a');
		$p[$k][]=array($a=>'61b', $b=>$b1.'1b. Zakat pendapatan|61b');
		$p[$k][]=array($a=>'61c', $b=>$b1.'1c. lain2 zakat (cth: harta, perniagaan,'
		. 'dll kecuali zakat fitrah|61c');
		$p[$k][]=array($a=>'61', $b=>$b1.'Jumlah [61a+61b+61c]|61');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'62', $b=>$b1.'2. Cukai lain (cth:cukai jalan, cukai lapangan'
		. ' terbang, dll.)|62');
		$p[$k][]=array($a=>'63', $b=>$b1.'3. Bayaran wajib & denda(cth:bayaran pasport,'
		. ' ujian memandu, pendaftaran kereta motor, lesen memandu, dll.)|63');
		#-----------------------------------------------------------------------------------
		$b2 = '(pencaruman majikan & pekerja)';
		$p[$k][]=array($a=>'64a', $b=>$b1.'4. Pencaruman kpd KWSP/EPF'.$b2.'|64a');
		$p[$k][]=array($a=>'64b', $b=>$b1.'4. Pencaruman kpd PERKESO/SOCSO'.$b2.'|64b');
		$p[$k][]=array($a=>'64c', $b=>$b1.'4. Pencaruman kpd Lain-lain'.$b2.'|64c');
		$p[$k][]=array($a=>'64', $b=>$b1.'Jumlah[64a+64b+64c]|64');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'65', $b=>$b1.'5. Bayaran pampasan kerana kecederaan, ganti rugi'
		. ' berdasarkan undang-undang, dll.|65');
		$p[$k][]=array($a=>'66', $b=>$b1.'6. Bayaran nafkah atau harta warisan|66');
		$p[$k][]=array($a=>'67', $b=>$b1.'7. Bayaran pinjaman pelajaran|67');
		$p[$k][]=array($a=>'73A', $b=>$b1.'Jumlah INCS 73A=(TP61 + TP62 +...+ TP67)|73A');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'68', $b=>$b1.'8. Pemberian kpd badan agama atau'
		. ' derma amal|68');
		$p[$k][]=array($a=>'69', $b=>$b1.'9. Yuran keahlian kpd kesatuan sekerja,'
		. ' parti politik,kelab sosial, dll.|69');
		$p[$k][]=array($a=>'70', $b=>$b1.'10. Hadiah berupa wang tunai/mata benda|70');
		$p[$k][]=array($a=>'71', $b=>$b1.'11. Pindahan lain(cth:zakar fitrah,dll)|71');
		$p[$k][]=array($a=>'72A', $b=>$b1.'12. Pemberian kpd isi rumah lain:a)Malaysia'
		. ' |72a');
		$p[$k][]=array($a=>'72B', $b=>$b1.'12. Pemberian kpd isi rumah lain:b)'
		. ' Negara2 lain|72b');
		$p[$k][]=array($a=>'72C', $b=>$b1.'12. Pemberian kpd isi rumah lain:c)'
		. ' Nyatakan Negara|72c');
		$p[$k][]=array($a=>'73B', $b=>$b1.'Jumlah 73B=(TP68 + TP69 +...+'
		. ' TP72a + TP72b)|73B');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'TP73', $b=>$b1.'Jumlah TP73=(73A + 73B)|73');
		$p[$k][]=array($a=>'TP73', $b=>'Jumlah simpanan tunai 12 bulan yg lalu|74');
	#***************************************************************************************
		$k = 'kod_kerjabergaji_hk1';
		$p[$k][]=array($a=>'PK', $b=>'Pekerjaan|PK' );
		$p[$k][]=array($a=>'PN', $b=>'Industri|PN' );
		$p[$k][]=array($a=>'Tp', $b=>'Tempoh|Tp' );
		$p[$k][]=array($a=>'11', $b=>'Upah & gaji(sebelum potongan cukai pendapatan,'
		. ' pencaruman KWSP, dll.)|11' );
		$p[$k][]=array($a=>'12', $b=>'Elaun(cth:elaun sara hidup, elaun pakar, elaun'
		. ' perumahan, elaun luar negeri, dll.)|12' );
		$p[$k][]=array($a=>'13', $b=>'Bonus|13' );
		$p[$k][]=array($a=>'14', $b=>'Wang tunai lain(cth:komisen, tip, pendapatan'
		. ' daripada kerja lebih masa, dll.)|14' );
		$p[$k][]=array($a=>'15', $b=>'Makanan percuma/konsesi|15' );
		$p[$k][]=array($a=>'16', $b=>'Tempat menginap percuma/konsesi|16' );
		$p[$k][]=array($a=>'17', $b=>'Barang pengguna & perkhidmatan percuma/konsesi|17' );
		$p[$k][]=array($a=>'18', $b=>'Pembayaran lain yg diterima berupa mata benda'
		. ' (cth:padi, getah, kelapa, dll.)|18' );
		$p[$k][]=array($a=>'19a', $b=>'Pencaruman majikan kpd KWSP|19a' );
		$p[$k][]=array($a=>'19b', $b=>'Pencaruman majikan kpd PERKESO, dll.|19b' );
		$p[$k][]=array($a=>'19c', $b=>'Pencaruman majikan kpd dll.|19c' );
		$p[$k][]=array($a=>'19', $b=>'Jumlah [19a+19b+19c]|19' );
		$p[$k][]=array($a=>'01', $b=>'[A]JUMLAH PENDAPATAN PEKERJAAN BERGAJI'
		. ' [INCS{(11)+(12)+ ... +(19)}]|01' );
		$p[$k][]=array($a=>'HK1', $b=>'Ringkasan:Jumlah pendapatan pekerjaan bergaji'
		. ' utk setiap ahli isi rumah' );
	#***************************************************************************************
		$k = 'kod_xtvttani_hk2';
		$p[$k][]=array($a=>'PK', $b=>'Pekerjaan|PK' );
		$p[$k][]=array($a=>'A1', $b=>'1.Penerimaan drp jualan barang2 keluaran|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Jumlah belanja|A2');
		$p[$k][]=array($a=>'B1', $b=>'2.Keuntungan bersih sebagaimana tercatat dlm'
		. ' penyata kira-kira|B1');
		$p[$k][]=array($a=>'B2', $b=>'3.Anggaran semula perkara B1 utk tahun rujukan |B2');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan sama ada [A1 - A2]'
		. ' atau [B1 atau B2]|C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. '  ahli-ahli isi rumah|C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2|C3');
		$p[$k][]=array($a=>'C4A', $b=>'4.Jumlah nilai bagi keluaran sendiri yg'
		. ' digunakan utk:(a) Kegunaan sendiri|C4A');
		$p[$k][]=array($a=>'C4B', $b=>'4.Jumlah nilai bagi keluaran sendiri yg'
		. ' digunakan utk:(b) Lain-lain (seperti zakat, biji benih,'
		. ' pemberian, dll.)|C4B');
		$p[$k][]=array($a=>'C4', $b=>'4.Jumlah nilai bagi keluaran sendiri yg'
		. ' digunakan : C4=(a)+(b)|C4');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah C5=C3+C4|C5');
		$b1 = 'C5| Hasil drp pertanian:';
		$p[$k][]=array($a=>'21A(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus dll'
		. '|21A(i)');
		$p[$k][]=array($a=>'21A(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. '|21A(ii)');
		$p[$k][]=array($a=>'21A(iii)', $b=>$b1.' bukan dlm talian|21A(iii)');
		#-----------------------------------------------------------------------------------
	#***************************************************************************************
		$k = 'kod_perikanan_hk3';
		$p[$k][]=array($a=>'A1', $b=>'1.Nilai jumlah jualan(termasuk ikan kolam/sangkar,'
		. 'air tawar & air payau/laut)|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Pendapatan yg diterima daripada sewaan bot'
		. '/perkakas dlm dua belas (12) bulan yg lalu|A2');
		$p[$k][]=array($a=>'A3', $b=>'3.Lain-lain|A3');
		$p[$k][]=array($a=>'A4', $b=>'Jumlah A4=A1+A2+A3|A4');
		$p[$k][]=array($a=>'B', $b=>'1.Jumlah belanja | B');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan (A4 - B)|C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. ' ahli isi rumah|C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3');
		$p[$k][]=array($a=>'C4', $b=>'4.Anggaran barangan keluaran yg digunakan'
		. ' sendiri setahun|C4');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah C5=C3+C4|C5');
		$b1 = 'C5| Hasil drp perikanan:';
		$p[$k][]=array($a=>'21A(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus dll'
		. '|21A(i)');
		$p[$k][]=array($a=>'21A(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. '|21A(ii)');
		$p[$k][]=array($a=>'21A(iii)', $b=>$b1.' bukan dlm talian|21A(iii)');
		#-----------------------------------------------------------------------------------
	#***************************************************************************************
		$k = 'kod_xtxtict_hk4';
		$p[$k][]=array($a=>'PN', $b=>'Industri|PN' );
		$p[$k][]=array($a=>'A1', $b=>'1.Jumlah bulan berniaga dlm setahun|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Purata penerimaan drp jualan bulanan bagi'
		. ' brg & perkhidmatan ICT|A2');
		$p[$k][]=array($a=>'A3', $b=>'3.Purata belanja bulanan|A3');
		$p[$k][]=array($a=>'A4', $b=>'4.Purata keuntungan bersih bulanan A4=A2-A3|A4');
		$p[$k][]=array($a=>'B1', $b=>'1.Keuntungan bersih dlm penyata kira-kira|B1');
		$p[$k][]=array($a=>'B2', $b=>'2.Anggaran semua B1 utk tahun rujukan|B2');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan sama ada'
		. '(A4 X A1] ATAU [B1 ATAU B2])|C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. ' ahli isi rumah|C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3');
		$p[$k][]=array($a=>'C4', $b=>'4.Anggaran barangan keluaran yg digunakan'
		. ' sendiri setahun|C4');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah C5=C3+C4|C5');
		$b1 = 'C5| Hasil drp ict:';
		$p[$k][]=array($a=>'21A(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus dll'
		. '|21A(i)');
		$p[$k][]=array($a=>'21A(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. '|21A(ii)');
		$p[$k][]=array($a=>'21A(iii)', $b=>$b1.' bukan dlm talian|21A(iii)');
		#-----------------------------------------------------------------------------------
	#***************************************************************************************
		$k = 'kod_pengangkutan_hk5';
		$p[$k][]=array($a=>'PN', $b=>'Industri|PN' );
		$p[$k][]=array($a=>'A1', $b=>'1.Jumlah bulan berniaga dlm setahun|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Purata penerimaan drp jualan bulanan bagi'
		. ' brg & perkhidmatan ICT|A2');
		$p[$k][]=array($a=>'A3', $b=>'3.Purata belanja bulanan|A3');
		$p[$k][]=array($a=>'A4', $b=>'4.Purata keuntungan bersih bulanan A4=A2-A3|A4');
		$p[$k][]=array($a=>'B1', $b=>'1.Keuntungan bersih dlm penyata kira-kira|B1');
		$p[$k][]=array($a=>'B2', $b=>'2.Anggaran semua B1 utk tahun rujukan|B2');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan sama ada'
		. '(A4 X A1] ATAU [B1 ATAU B2])|C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. ' ahli isi rumah|C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3');
		$p[$k][]=array($a=>'C4', $b=>'4.Anggaran barangan keluaran yg digunakan'
		. ' sendiri setahun|C4');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah C5=C3+C4|C5');
		$b1 = 'C5| Hasil drp pengangkutan:';
		$p[$k][]=array($a=>'21d(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt grab,uber,mycar,website khusus'
		. ' dll' . $b2 . '|21d(i)');
		$p[$k][]=array($a=>'21d(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. $b2 .'|21d(ii)');
		$p[$k][]=array($a=>'21d(iii)', $b=>$b1.' bukan dlm talian'.$b2.'|21d(iii)');
		#-----------------------------------------------------------------------------------
	#***************************************************************************************
		$k = 'kod_lain2_hk6';
		$p[$k][]=array($a=>'PN', $b=>'Industri|PN' );
		$p[$k][]=array($a=>'A1', $b=>'1.Jumlah bulan berniaga dlm setahun|A1');
		$p[$k][]=array($a=>'A2', $b=>'2.Purata penerimaan drp jualan bulanan bagi'
		. ' brg & perkhidmatan ICT|A2');
		$p[$k][]=array($a=>'A3', $b=>'3.Purata belanja bulanan|A3');
		$p[$k][]=array($a=>'A4', $b=>'4.Purata keuntungan bersih bulanan A4=A2-A3|A4');
		$p[$k][]=array($a=>'B1', $b=>'1.Keuntungan bersih dlm penyata kira-kira|B1');
		$p[$k][]=array($a=>'B2', $b=>'2.Anggaran semua B1 utk tahun rujukan|B2');
		$p[$k][]=array($a=>'C1', $b=>'1.Pendapatan bersih tahunan sama ada'
		. '(A4 X A1] ATAU [B1 ATAU B2])|C1');
		$p[$k][]=array($a=>'C2', $b=>'2.Peratus pembahagian yg dipegang oleh'
		. ' ahli isi rumah|C2');
		$p[$k][]=array($a=>'C3', $b=>'3.Nilai Mutlak bagi C2 | C3');
		$p[$k][]=array($a=>'C4', $b=>'4.Anggaran barangan keluaran yg digunakan'
		. ' sendiri setahun|C4');
		#-----------------------------------------------------------------------------------
		$p[$k][]=array($a=>'C5', $b=>'5.Pendapatan bersih yg diterima oleh'
		. ' ahli isi rumah C5=C3+C4|C5');
		$b1 = 'C5| Hasil drp lain2:';
		$p[$k][]=array($a=>'21A(i)', $b=>$b1.' dlm talian melalui traksaksi edagang'
		. '(cth: menerima pesanan melalui marketplace spt shopee,lazada,website khusus dll'
		. '|21A(i)');
		$p[$k][]=array($a=>'21A(ii)', $b=>$b1.' dlm talian melalui traksaksi bukan edagang'
		. '(cth: menerima pesanan melalui whatsapp,facebook,email dll'
		. '|21A(ii)');
		$p[$k][]=array($a=>'21A(iii)', $b=>$b1.' bukan dlm talian|21A(iii)');
		#-----------------------------------------------------------------------------------
	#***************************************************************************************
		$k = 'kod_kegunaansendiri_hk7';
		$p[$k][]=array($a=>'NOAIR', $b=>'no. ahli isi rumah|NOAIR');
		$items = array('sayur-sayuran','kelapa','ikan','ayam','itik','telur','rambutan',
		'durian','pisang','kayu api','lain2 0','lain2 1','lain2 2');
		foreach($items as $item):
			$p[$k][]=array($a=>$item, $b=>$item.'(purata sebulan)(jumlah setahun)');
		endforeach;
	#***************************************************************************************
		$k = 'kod_sewabersih_hk8';
		$p[$k][]=array($a=>'NOAIR', $b=>'no. ahli isi rumah|NOAIR');
		#-----------------------------------------------------------------------------------
		$b1 = 'sewa rumah yg diduduki sendiri: ';
		$p[$k][]=array($a=>'22.1', $b=>$b1.'1.jenis rumah|22.1');
		$p[$k][]=array($a=>'22.2', $b=>$b1.'2.jum kasar sewa tahunan|22.2');
		$p[$k][]=array($a=>'22.3', $b=>$b1.'3.jum belanja tahunan(i+ii+iii)|22.3');
		$p[$k][]=array($a=>'22.3(i)', $b=>$b1.'3(i)pembaikan & penyelenggaraan|22.3(i)');
		$p[$k][]=array($a=>'22.3(ii)', $b=>$b1.'3(i)cukai tanah|22.3(ii)');
		$p[$k][]=array($a=>'22.3(iii)', $b=>$b1.'3(i)cukai pintu|22.3(iii)');
		$p[$k][]=array($a=>'22', $b=>$b1.'4.jum sewa bersih tahunan (2-3)|22');
		#-----------------------------------------------------------------------------------
		$b1 = 'rumah/harta lain yg disewakan: ';
		$p[$k][]=array($a=>'23.1', $b=>$b1.'1.jenis rumah/harta lain|23.1');
		$p[$k][]=array($a=>'23.2', $b=>$b1.'2.bil rumah/harta lain|23.2');
		$p[$k][]=array($a=>'23.3', $b=>$b1.'3.jum kasar sewa tahunan|23.3');
		$p[$k][]=array($a=>'23.4', $b=>$b1.'4.jum belanja tahunan(i+ii+iii)|23.4');
		$p[$k][]=array($a=>'23.4(i)', $b=>$b1.'4(i)pembaikan & penyelenggaraan|23.4(i)');
		$p[$k][]=array($a=>'23.4(ii)', $b=>$b1.'4(i)cukai tanah|23.4(ii)');
		$p[$k][]=array($a=>'23.4(iii)', $b=>$b1.'4(i)cukai pintu|23.4(iii)');
		$p[$k][]=array($a=>'23.1', $b=>$b1.'5.jum sewa bersih tahunan (3-4)|23');
		#-----------------------------------------------------------------------------------
		$b1 = 'sewa tanah pertanian :';
		$p[$k][]=array($a=>'32a.1', $b=>$b1.'1.jum kasar sewa tahunan|32a.1');
		$p[$k][]=array($a=>'32a.2', $b=>$b1.'2.jum belanja tahunan(i+ii)|32a.2');
		$p[$k][]=array($a=>'32a.2(i)', $b=>$b1.'2(i)penyelenggaraan|32a.2(i)');
		$p[$k][]=array($a=>'32a.2(ii)', $b=>$b1.'2(ii)cukai tanah|32a.2(ii)');
		$p[$k][]=array($a=>'32a', $b=>$b1.'3.jum sewa bersih tahunan (1-2)|32a');
		#-----------------------------------------------------------------------------------
		$b1 = 'sewa tanah bukan pertanian: ';
		$p[$k][]=array($a=>'32b.1', $b=>$b1.'1.jum kasar sewa tahunan|32b.1');
		$p[$k][]=array($a=>'32b.2', $b=>$b1.'2.jum belanja tahunan(i+ii+iii)|32b.2');
		$p[$k][]=array($a=>'32b.2(i)', $b=>$b1.'2(i)penyelenggaraan|32b.2(i)');
		$p[$k][]=array($a=>'32b.2(ii)', $b=>$b1.'2(ii)cukai tanah|32b.2(ii)');
		$p[$k][]=array($a=>'32b.2(iii)', $b=>$b1.'2(iii)cukai pintu|32b.2(iii)');
		$p[$k][]=array($a=>'32b', $b=>$b1.'3.jum sewa bersih tahunan (1-2)|32b');
		#-----------------------------------------------------------------------------------
	#***************************************************************************************
		return ($p);
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
}
