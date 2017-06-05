<!--
	Must create csv folder to store the temp file
	and grant file permission to move the folder.
-->
<div class='push'>
<h3> Upload items </h3>

<form method="post" action="manage_csv.php" onsubmit="return validateForm()" enctype="multipart/form-data">
	<label> Select CSV File </label>
	<input type="file" name="csv" id="csv" accept=".csv" /><br/><br/>
	<label> Header:  </label>
	<input type='radio' name="header" value="yes" /> Yes 
	<input type='radio' name="header" value="no" /> No <br/><br/>
	<input type="submit" name="proceed" id="upload" value="Proceed" />
</form>

<br><br>

</div>

<script type="text/javascript">
	function validateForm(){
		return true;
	}
</script>