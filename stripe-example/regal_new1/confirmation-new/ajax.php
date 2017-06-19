<?php 
include('inc/connect.php');
if(isset($_REQUEST['action']) && $_REQUEST['action']=="addpassenger"){
$count= $_REQUEST['start']+1;
$total= $_REQUEST['total'];
for($i=$count;$i<=$total;$i++){
?>
	<div id="passenger<?php echo $i ?>"> 
	<h3>Passenger <?php echo $i ?></h3>
	<div class="row">
	  <div class="col-xs-4">
	    <div class="form-group">
	      <label for="passengerFirstName">First Name</label>
	      <input type="text" class="form-control" name="passengerFirstName<?php echo $i ?>" required="" data-parsley-error-message="Please enter the first name.">
	    </div>
	  </div>
	  <div class="col-xs-4">
	    <div class="form-group">
	      <label for="passengerMiddleName">Middle Name</label>
	      <input type="text" class="form-control" name="passengerMiddleName<?php echo $i ?>" required="" data-parsley-error-message="Please enter the middle name.">
	    </div>
	  </div>
	  <div class="col-xs-4">
	    <div class="form-group">
	      <label for="passengerMiddleName">Last Name </label>
	      <input type="text" class="form-control" name="passengerMiddleName<?php echo $i ?>" required="" data-parsley-error-message="Please enter the last name.">
	    </div>
	  </div>
	</div>
	<!--  -->
	<div class="row">
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerDOB">Date of Birth</label>
	      <input type="text" class="form-control date" name="passengerDOB<?php echo $i ?>" required="" data-parsley-error-message="Please enter the date of birth.">
	    </div>
	  </div>
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerGender">Gender</label>
	      <select class="form-control" name="passengerGender<?php echo $i ?>" required="" data-parsley-error-message="Please select a gender.">
	        <option value="" disabled selected>Choose One</option>
	        <option value="male">Male</option>
	        <option value="female">Female</option>
	      </select>
	    </div>
	  </div>
	</div>
	<!--  -->
	<hr>
	<h2>Passenger Flight Details</h2>
	<div class="row">
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerSeatType">Seat Preference</label>
	      <select class="form-control" name="passengerSeatType<?php echo $i ?>">
	        <option value="" disabled selected>Choose One</option>
	        <option value="aisle">Aisle</option>
	        <option value="window">Window</option>
	      </select>
	    </div>
	  </div>
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerMeal">Meal Request</label>
	      <select class="form-control" name="passengerMeal<?php echo $i ?>">
	        <option value="" disabled selected>Choose One</option>
	        <option value="Diabetic">Diabetic</option>
	        <option value="Gluten Free">Gluten Free</option>
	        <option value="Vegetarian">Vegetarian</option>
	        <option value="Kosher">Kosher</option>
	        <option value="Muslim">Muslim</option>
	        <option value="Hindu">Hindu</option>
	      </select>
	    </div>
	  </div>
	</div>
	<hr>
	<h2>Passenger Frequent Flyer Program</h2>
	<div class="row">
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerProgramName">Program Name</label>
	        <select class="form-control" name="passengerProgramName<?php echo $i ?>">
	          <option value="" disabled selected>Choose One</option>
	          <?php
	          $programSql = "select * from flyer_programs order by Program_Name";
	          $programRs = mysqli_query($connect,$programSql) or die("Cannot Execute Query: <P>".$programSql."<P>".mysql_error());
	          while($programRow=mysqli_fetch_array($programRs))
	          {
	          ?>
	            <option value="<?php echo $programRow['Program_Name']; ?>"><?php echo $programRow['Program_Name']; ?></option>
	          <?php
	          }
	          ?>
	        </select>
	    </div>
	  </div>
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerProgramNameNumber">Program Number</label>
	      <input type="text" class="form-control" name="passengerProgramNameNumber<?php echo $i ?>">
	    </div>
	  </div>
	</div>
	<hr>
	<h2>Global Entry / TSA / Known Traveler </h2>
	<div class="row">
	  <div class="col-xs-12 col-sm-4">
	    <div class="form-group">
	      <label for="passengerTSA">ID Number</label>
	      <input type="text" class="form-control" name="passengerTSA<?php echo $i ?>">
	    </div>
	  </div>
	</div>
	</div>
	<?php
}
}


?>