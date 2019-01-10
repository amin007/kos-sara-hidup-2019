	<table class="excel">
	<?php
	$class = $a = $b = null;
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
	?><tbody>
	<tr><td align="center"><?php echo $kira+1 ?></td><?php
		$html = new \Aplikasi\Kitab\Html_TD;
		$html2 = new \Aplikasi\Kitab\HTML_Input_Biasa();
		foreach ( $row[$kira] as $key=>$data )
		{
			$html->paparURL($key, $data, $myTable,$this->c1, $this->c2);
			$paparData = $html2->addInput($class, $myTable,
			$a, $b, $key, $data);
		}	//echo '<td>' . $paparData . '</td>';
		?></tr>
	</tbody>
	<?php
	}#-----------------------------------------------------------------
	?></table>
