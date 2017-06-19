<?php
//error_reporting(E_ALL);
require_once('connect.php');

$txt = date('Y-m-d h:i:sa');

$txt.= " \n " . print_r($_REQUEST,true);

$txt.= " \n " . print_r($_SERVER,true);

$myfile = fopen("log/".time()."_test.txt", "w");

fwrite($myfile, $txt);

fclose($myfile);

		$file = fopen("log/ipnErrors.txt","a");
		$endline = " \n ";

if(isset($_POST)){

	// Handle subscription type of transactions
	if(isset($_POST['txn_type']) && $_POST['txn_type']=='subscr_payment'){


		$isFirst = '0';
		$userID = intval($_POST['custom']);
			//$subscriptionQuery = "update AA_payments_profile set paypal_sub_id='{$_POST['subscr_id']}' where user_id=$userID";


		// update transaction table with data

		$insertTransaction = "insert into AA_subscription_transactions (user_id,paid_on,payment_date,txn_type,subscr_id,item_name,payment_gross,mc_currency,business,payment_type,verify_sign,payer_email,txn_id,receiver_email,payer_id,receiver_id,payment_status,payment_fee,mc_gross,custom,ipn_track_id,is_first_payment) values ($userID,now(),'{$_POST['payment_date']}','{$_POST['txn_type']}','{$_POST['subscr_id']}','{$_POST['item_name']}',{$_POST['payment_gross']},'{$_POST['mc_currency']}','{$_POST['business']}','{$_POST['payment_type']}','{$_POST['verify_sign']}','{$_POST['payer_email']}','{$_POST['txn_id']}','{$_POST['receiver_email']}','{$_POST['payer_id']}','{$_POST['receiver_id']}','{$_POST['payment_status']}',{$_POST['payment_fee']},{$_POST['mc_gross']},'{$_POST['custom']}','{$_POST['ipn_track_id']}','$isFirst')";

		if(!mysqli_query($conn,$insertTransaction)){
			$error = date('Y-m-d h:i:sa') . "SQLERROR:$insertTransaction :".mysqli_error($conn).$endline; 
			fwrite($file,$error);
		}
		fclose($file);
	}
	else if(isset($_POST['txn_type']) && $_POST['txn_type']=='subscr_signup'){
		// Handle first time subscription
		$userID = intval($_POST['custom']);
		$subscriptionQuery = "update AA_payments_profile set paypal_sub_id='{$_POST['subscr_id']}' where user_id=$userID limit 1";
		$firstPaymentUpdate = "Update AA_subscription_transactions set is_first_payment='1' where payer_id='{$_POST['payer_id']} and ipn_track_id='{$_POST['ipn_track_id']}' limit 1";

		$error = '\n Check:'.$firstPaymentUpdate;
		fwrite($file,$error);

		$error = '\n Check2:'.$subscriptionQuery;
		fwrite($file,$error);

		if(!mysqli_query($conn,$subscriptionQuery)){
			$error = date('Y-m-d h:i:sa') . "SQLERROR:$subscriptionQuery :".mysqli_error($conn).$endline; 
			fwrite($file,$error);
		}

		if(!mysqli_query($conn,$firstPaymentUpdate)){
			$error = date('Y-m-d h:i:sa') . "SQLERROR:$firstPaymentUpdate :".mysqli_error($conn).$endline; 
			fwrite($file,$error);
		}
		fclose($file);
	}


	// Just dump the ipn post
	$txt = date('Y-m-d h:i:sa');

	$txt.= " \n " . print_r($_REQUEST,true);

	$txt.= " \n " . print_r($_SERVER,true);

	$myfile = fopen("log/get_post_log_".time().".txt", "w");

	fwrite($myfile, $txt);

	fclose($myfile);
}


// Just dump the get content
$txt = date('Y-m-d h:i:sa');

$txt.= " \n " . print_r($_REQUEST,true);

$txt.= " \n " . print_r($_SERVER,true);

$myfile = fopen("log/getlog_".time().".txt", "w");

fwrite($myfile, $txt);

fclose($myfile);

?>