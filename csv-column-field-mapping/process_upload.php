<?php
//var_dump($_POST);
if(isset($_POST['upload'])){
	$filename = $_POST['filename'];
	$file = fopen($filename,'r');

	// Just skips first line in the file if its a header
	if($_POST['header']=='yes'){
		$line = fgetcsv($file);
	}
}
?>

<h3> Imported data </h3>
<table>
	<tr>
		<th> Code </th>
		<th> Name </th>
		<th> Price </th>
		<th> Qty </th>
		<th> Img </th>
	</tr>
	
	<?php
		// Create array to sort the keys based on the values so that they can be used for the ordering
		$srt = array('0'=>$_POST['0'],'1'=>$_POST['1'],'2'=>$_POST['2'],'3'=>$_POST['3'],'4'=>$_POST['4']);
		//var_dump($srt);
		// Sort the columns acording to the values
		//var_dump($srt);
		asort($srt);
		//var_dump($srt);
		
		$kys = array_keys($srt);
		//var_dump($kys);
		while($line = fgetcsv($file)){
			//var_dump($line);
			?>
			<tr>
				<td> <?=$line[$kys[0]]?> </td>
				<td> <?=$line[$kys[1]]?> </td>
				<td> <?=$line[$kys[2]]?> </td>
				<td> <?=$line[$kys[3]]?> </td>
				<td> <?=$line[$kys[4]]?> </td>
			</tr>
			<?php
		}
	?>
</table>