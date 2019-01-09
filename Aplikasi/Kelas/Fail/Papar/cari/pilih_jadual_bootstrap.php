	<table border="1" class="table">
	<?php echo '<h3>'. $tajukjadual . '</h3>';
	$printed_headers = false; # mula bina jadual
	#-----------------------------------------------------------------
	for ($kira=0; $kira < count($row); $kira++)
	{
		if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
		{
			?><thead><tr><th>#</th><?php
			foreach ( array_keys($row[$kira]) as $tajuk )
			{
				?><th><?php echo $tajuk ?></th><?php
			}
			?></tr></thead>
	<?php	$printed_headers = true;
		}
	# papar data $row ------------------------------------------------
	?><tr><td align="center"><?php echo $kira+1 ?></td><?php
		//$html = new \Aplikasi\Kitab\Html_TD;
		$html = new \Aplikasi\Kitab\Jadual01;
		foreach ( $row[$kira] as $key=>$data )
		{
			$dataKey = $this->_meta[$myTable][$key]['key'];
			$dataType = $this->_meta[$myTable][$key]['type'];
			$semua = array($key,$data,$dataKey,$dataType,
			$this->_meta,$this->c1,$this->c2);
			$html::paparData($semua);
			//$html::gaya01($dataType,$data);
		}
		?></tr>
	<?php
	}#-----------------------------------------------------------------
	?></table>
