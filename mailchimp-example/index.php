<?php
	/*
		This sample provides most commonly used mail chimp api servcies
		These are very simple features. For more advanced, refer to 
		https://developer.mailchimp.com/documentation/mailchimp/reference/campaigns/content/#
	*/
	require_once('connect.php');
	require_once 'mailchimp-api/vendor/autoload.php';
	use \DrewM\MailChimp\MailChimp;
	$mc = new MailChimp(MAILCHIMP_API_KEY);

	// check if last action was successful
	// if ($mc->success()) {
	// 	print_r($result);	
	// } else {
	// 	echo $mc->getLastError();
	// }

	// Add an email/user to subscription list
	if(isset($_POST['signup'])){
		
		$merge_vars = array(
        	'FNAME'     => $_POST['fname'],
        	'LNAME'     => $_POST['lname']
    	);	

	    // add the email to your list
	    // 'double_optin'      => false
	    $result = $mc->post('/lists/'.TEST_LIST_ID.'/members', array(
	            'email_address' => $_POST['email'],
	            'merge_fields'  => $merge_vars,
	            //'status'        => 'pending'     // double opt-in
	             'status'     => 'subscribed'  // single opt-in
	        )
	    );

	    if(isset($result['detail'])){
	    	echo "<div style='color:red;'> {$result['detail']} </div>";
	    }
	    else{
	    	echo "ID: {$result['id']} <br>";
	    	echo "Email: {$result['email_address']} <br>";
	    	echo "unique_email_id: {$result['unique_email_id']} <br>";
	    	echo "email_type: {$result['email_type']} <br>";
	    	echo "status: {$result['status']} <br>";
	    	echo "fname: {$result['merge_fields']['FNAME']} <br>";
	    	echo "lname: {$result['merge_fields']['LNAME']} <br>";
	    	echo "ip_opt: {$result['ip_opt']} <br>";
	    	echo "timestamp_opt: {$result['timestamp_opt']} <br>";
	    	echo "vip: {$result['vip']} <br>";
	    	echo "list_id: {$result['list_id']} <br>";
	    }
	    echo "<hr>";
	    //var_dump($result);
	    //return json_encode($result);
	}

	// fetch all list details
	if(isset($_POST['getLists'])){
		$result = $mc->get('lists');
		$cnt = 0;
		while($cnt < count($result['lists'])){
			echo "List ID : {$result['lists'][$cnt]['id']} <br>";
			echo "List Name : {$result['lists'][$cnt]['name']} <br>";
			echo "Company Name : {$result['lists'][$cnt]['contact']['company']} <br>";
			echo "Address 1: {$result['lists'][$cnt]['contact']['address1']} <br>";
			echo "Address 2: {$result['lists'][$cnt]['contact']['address2']} <br>";
			echo "City: {$result['lists'][$cnt]['contact']['city']} <br>";
			echo "State: {$result['lists'][$cnt]['contact']['state']} <br>";
			echo "Zip: {$result['lists'][$cnt]['contact']['zip']} <br>";
			echo "Country: {$result['lists'][$cnt]['contact']['country']} <br>";
			echo "Permission Reminder: {$result['lists'][$cnt]['permission_reminder']} <br>";
			echo "Use Archive Bar: {$result['lists'][$cnt]['use_archive_bar']} <br>";
			echo "From Name: {$result['lists'][$cnt]['campaign_defaults']['from_name']} <br>";
			echo "From Email: {$result['lists'][$cnt]['campaign_defaults']['from_email']} <br>";
			echo "Subject: {$result['lists'][$cnt]['campaign_defaults']['subject']} <br>";
			echo "Language: {$result['lists'][$cnt]['campaign_defaults']['language']} <br>";
			echo "Notify On Subscribe: {$result['lists'][$cnt]['notify_on_subscribe']} <br>";
			echo "Notify On Unsubscribe: {$result['lists'][$cnt]['notify_on_unsubscribe']} <br>";
			echo "Date Created: {$result['lists'][$cnt]['date_created']} <br>";
			echo "List Rating: {$result['lists'][$cnt]['list_rating']} <br>";
			echo "Subscribe URL: {$result['lists'][$cnt]['subscribe_url_short']} <br>";
			echo "Visibility: {$result['lists'][$cnt]['visibility']} <br>";
			echo "Member Count: {$result['lists'][$cnt]['stats']['member_count']} <br>";
			echo "<hr/>";
			$cnt++;
		}

		//var_dump($result);
	}

	if(isset($_POST['delete'])){
		$list_id = TEST_LIST_ID;
		$subscriber_hash = $mc->subscriberHash($_POST['email']);

		$res = $mc->delete("lists/$list_id/members/$subscriber_hash");
		echo "<hr>";
		if(isset($res['detail'])){
	    	echo "<div style='color:red;'> {$res['detail']} </div>";
	    }
	    else{
	    	print_r($res);	
	    }
	}

	if(isset($_POST['create'])){
		$result = $mc->post("campaigns", [
	    'type' => 'regular',
	    'recipients' => ['list_id' => TEST_LIST_ID],
	    'settings' => ['subject_line' => 'Hello World?',
	           'reply_to' => 'shri1@intecons.com',
	           'from_name' => 'shri2@intecons.com'
	          ]
	    ]);
	  
		$response = $mc->getLastResponse();
		$responseObj = json_decode($response['body']); 
		var_dump($response);
		echo "<hr>";
		var_dump($responseObj);
	}

	if(isset($_POST['content'])){
		$campagin_id = '6fb706bcca';
		$template_id = 61607;

		$html = "<h1> Hello Robo </h1> ";
		$result = $mc->put('campaigns/' . $campagin_id . '/content', [
      		'template' => ['id' => $template_id, 
        	'sections' => ['body' => $html]
        	],
        	'plain_text' => 'Hi guyz, just testing mail chimp !',
        	'header'=>'Please work !'
      	]);

      	var_dump($result);
	}

	// Get campaign readyness checklist
	if(isset($_POST['check'])){
		$campagin_id = '6fb706bcca';
		$result = $mc->get('campaigns/'.$campagin_id.'/send-checklist');
		var_dump($result);
	}

	if(isset($_POST['send'])){
		$campagin_id = '6fb706bcca';
		$result = $mc->post('campaigns/' . $campagin_id . '/actions/send');
		var_dump($result);
	}
?>

<h1> Add Member </h1>
<form method="post">
	<input type="text" name="fname" placeholder="First Name" /><br/><br/>
	<input type="text" name="lname" placeholder="Last Name" /><br/><br/>
	<input type="text" name="email" placeholder="Email" /><br/><br/>
	<input type="submit" name="signup" value="Register" /> 
	<input type="submit" name="getLists" value="Fetch Lists" />
</form>

<h1> Delete Member </h1>
<form method="post">
	<input type="text" name="email" placeholder="email" /><br><br>
	<input type="submit" name="delete" value="Delete Client" />
</form>

<h1> Create Campaign </h1>
<form method="post">
	<input type="submit" name="create" value="Create Campaign" />
	<input type="submit" name="content" value="Set Content" />
	<input type="submit" name="check" value="check" />
	<input type="submit" name="send" value="Send Mail" />
</form>