<?php
	require_once('connect.php');
	
	if(isset($_POST['subscribe'])){
		$currency = "USD";
		$cycle = $_POST['sub_type'];
		$end = $_POST['cycle_end'];
		$product_name = "Paragon Slippers";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];

		if($cycle == 'D'){
			$amount = 5;
		}
		else if($cycle == 'W'){
			$amount = 30;
		}
		else if($cycle == 'M'){
			$amount = 135;
		}
		else if($cycle == 'Y'){
			$amount = 1600;
		}

		$user_id = $_POST['user_id'];

		// Check if user already has a profile
		if(mysqli_num_rows(mysqli_query($conn,"select profile_id from AA_payments_profile where user_id=$user_id"))>0){
			die(" Already payments profile exists !");
		}
		else{
			$query = "insert into AA_payments_profile (user_id,first_name,last_name,email,subscription_type,amount,currency_code,start_date) values ($user_id,'$fname','$lname','$email','$cycle',$amount,'$currency',now())";
			$result = mysqli_query($conn,$query) or die(" Query: $query , Error: ".mysqli_error($conn));
			$profile_id = mysqli_insert_id($conn);
			//echo $profile_id."<<";
			//die("Success:".$query.":$profile_id");
		}
	?>

	<div style="margin-left: 38%"><img src="images/ajax-loader.gif"/><img src="images/processing_animation.gif"/></div>
	<form name = "myform" action = "<?php echo PAYPAL_SANDBOX; ?>" method = "post" target = "_top">
		<input type="hidden" name="cmd" value="_xclick-subscriptions">
		<input type = "hidden" name = "business" value = "<?php echo MERCHANT_EMAIL; ?>">
		<input type="hidden" name="lc" value="IN">
		<input type = "hidden" name = "item_name" value = "<?php echo $product_name; ?>">
		<input type="hidden" name="no_note" value="1">
		<input type="hidden" name="src" value="1">
		<!-- <?php if (!empty($end)) { ?>
			<input type="hidden" name="srt" value="<?php echo $end; ?>">
		<?php } ?> -->
		<input type="hidden" name="a3" value="<?php echo $amount; ?>">
		<input type="hidden" name="p3" value="1">
		<input type="hidden" name="custom" value="<?=$user_id?>">
		<input type="hidden" name="t3" value="<?php echo $cycle; ?>">
		<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
		<input type="hidden" name = "cancel_return" value = "<?php echo CANCEL_URL ?>">
		<input type="hidden" name = "return" value = "<?php echo SUCCESS_URL; ?>">
		<input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
	</form>

	<script type="text/javascript">
		document.myform.submit();
	</script>
<?php 
	}
?>