<?php
	require_once('connect.php');

	$result = mysqli_query($conn,"select * from aa_stripe_users");
?>

<table border="1" style="border-collapse: collapse;">

	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Cust ID</th>
		<th> Sub ID</th>
		<th> Plan </th>
		<th> Plan Type </th>
		<th> Start </th>
		<th> End </th>
		<th> Renewal Count</th>
		<th> Status </th>		
	</tr>

	<?php
		while($row = mysqli_fetch_assoc($result)){
			?>
			<tr>
			<td> <?=$row['user_id']?> </td>
			<td> <?=$row['email']?> </td>
			<td> <?=$row['customer_id']?> </td>
			<td> <?=$row['subscription_id']?> </td>
			<td> <?=$row['plan']?> </td>
			<td> <?=$row['plan_type']?> </td>
			<td> <?=date('d-m-Y h:m:s',$row['current_period_start']);?> </td>
			<td> <?=date('d-m-Y h:m:s',$row['current_period_end']);?> </td>
			<td> <?=$row['payment_count']?> </td>
			<td> <?php if($row['current_period_end']<time()) echo '<span style="color:red;"> Expired </span>'; else echo "<span style='color:green;'> Active </span>"; ?></td>
			</tr>
			<?php
		}
	?>

</table>