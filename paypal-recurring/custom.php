<?php
// Custom subscription form


?>

<h1> Payment Info </h1>
<form method="post" action="process.php" >

<input type="text" name="fname" id="fname" placeholder="First Name"> <br><Br>
<input type="text" name="lname" id="lname" placeholder="Last Name"> <br><Br>
<input type="text" name="email" id="email" placeholder="Email"> <br><Br>

<label> Subscription Type </label>
<select name="sub_type" id="sub_type" >
	<option value="D">Daily</option>
	<option value="W">Weekly</option>
	<option value="M">Monthly</option>
	<option value="Y">Yearly</option>
</select>
<br><br>
<br><br>
<label> Subscription Cycle Ends In </label>
<select name="cycle_end" id="cycle_end" >
	<option value="2">2 Cycles</option>
	<option value="4">4 Cycles</option>
	<option value="8">8 Cycles</option>
	<option value="10">10 Cycles</option>
</select>
<br><Br>
<input type="text" placeholder="user id" required name="user_id" />
<input type="submit" name="subscribe" id="subscribe" value="Subscribe"/>

</form>