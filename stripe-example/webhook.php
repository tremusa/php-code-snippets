<?php
	require_once('stripe/autoload.php');
	require_once('connect.php');
	error_log("0:".print_r(error_get_last(),true));

	error_log("1:".print_r(error_get_last(),true));

	\Stripe\Stripe::setApiKey(STRIPE_TEST_SEC_KEY);
	$input = @file_get_contents("php://input");
	$event_json = json_decode($input,true);
	$err = fopen('xx_sql_errors.txt','a');
	$f2 = fopen('new_log/'.$event_json['data']['object']['object'].'_'.time().'.txt','w');
	fwrite($f2,var_export($input,true));
	fclose($f2);

	error_log("1:".print_r(error_get_last(),true));

	if($event_json['data']['object']['object']=='customer'){
		fwrite($err, '1');
	}
	else if($event_json['data']['object']['object']=='subscription'){
		fwrite($err, '2');	
		// Handle the payment renewal with event customer.subscription.updated
		if($event_json['type']=='customer.subscription.updated'){
			// for testing pupose
			$f3 = fopen("new_log/renewed_".time().".txt","w");
			fclose($f3);
			$cust_id = $event_json['data']['object']['customer'];
			$sub_id = $event_json['data']['object']['id'];;
			$start = $event_json['data']['object']['current_period_start'];
			$end = $event_json['data']['object']['current_period_end'];

			$q = "update aa_stripe_users set current_period_start=$start,current_period_end=$end, payment_count = payment_count+1 where customer_id='$cust_id' and subscription_id='$sub_id'";
			if(mysqli_query($conn,$q)){
				fwrite($err, 'success in update');
			}
			else{
				fwrite($err, 'error:Query=>$q:'.mysqli_error($conn));	
			}

		}
		else{
			$f4 = fopen("new_log/not_".time().".txt","w");
			fclose($f4);
			error_log("1:".print_r(error_get_last(),true));
		}
	}
	else if($event_json['data']['object']['object']=='charge'){
		fwrite($err, '3');


	}	
	else if($event_json['data']['object']['object']=='invoice'){
		// Subscription payment success
		if($event_json['type']=='invoice.payment_succeeded'){
			$cust_id = $event_json['data']['object']['customer'];
			$sub_id = $event_json['data']['object']['lines']['data'][0]['id'];;
			$start = $event_json['data']['object']['lines']['data'][0]['period']['start'];
			$end = $event_json['data']['object']['lines']['data'][0]['period']['end'];

			
			$q = "update aa_stripe_users set current_period_start=$start,current_period_end=$end where customer_id='$cust_id' and subscription_id='$sub_id'";
			if(mysqli_query($conn,$q)){
				fwrite($err, 'success in update');
			}
			else{
				fwrite($err, 'error:Query=>$q:'.mysqli_error($conn));	
			}


		}
		else{
			// Payment failed set appropriate flags
			fwrite($err, '4');
		}

	}
	else{
		// Handle different type of events such as balance,cancel.subscription etc
	fwrite($err, '5');
	}

	error_log("2:".print_r(error_get_last(),true));


	// $cust_id = $event_json['id'];
 //    $sub_id = $event_json['subscriptions']['data'][0]['id'];
 //    $selected_plan = $event_json['subscriptions']['data'][0]['items']['data'][0]['plan']['id'];
 //    $plan_type = $event_json['subscriptions']['data'][0]['plan']['interval'];
 //    $currency = $event_json['subscriptions']['data'][0]['items']['data'][0]['plan']['currency'];
 //    $default_card = $event_json['default_source'];

    fclose($err);

// Do something with $event_json

//http_response_code(200); // PHP 5.4 or greater
	
?>
