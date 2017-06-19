<?php
$section = "confirmation";
$nav = "trans";
$footer = "hide";
$bg = "white";
include('../inc/connect.php');

if(isset($_POST['success_status']) && $_POST['success_status']=="103"){
   $newQuote="insert into confirm_details set `Agent_ID`='".mysqli_real_escape_string($connect,$_POST['agentid'])."', `Created_On`=now(), `Cnf_From`='Consumer', `First_Name`='".mysqli_real_escape_string($connect,$_POST['clientFirstName'])."', `Last_Name`='".mysqli_real_escape_string($connect,$_POST['clientLastName'])."', `Email`='".mysqli_real_escape_string($connect,$_POST['clientEmail'])."', `Mobile`='".mysqli_real_escape_string($connect,$_POST['clientNumber'])."', `CC_BelongTo`='".mysqli_real_escape_string($connect,$_POST['ccBelong'])."', `CC_Name`='".mysqli_real_escape_string($connect,$_POST['ccName'])."', `CC_Number`='".mysqli_real_escape_string($connect,$_POST['ccNumber'])."', `CC_Cvv`='".mysqli_real_escape_string($connect,$_POST['ccCvv'])."', `CC_Exp`='".mysqli_real_escape_string($connect,$_POST['ccExpMonth']."-".$_POST['ccExpYear'])."',`Billing_Address1`='".mysqli_real_escape_string($connect,$_POST['billingAddress1'])."', `Billing_Address2`='".mysqli_real_escape_string($connect,$_POST['Billing_Address2'])."', `Billing_City`='".mysqli_real_escape_string($connect,$_POST['city'])."', `Billing_State`='".mysqli_real_escape_string($connect,$_POST['state'])."', `Billing_Country`='".mysqli_real_escape_string($connect,$_POST['country'])."', `Billing_ZipCode`='".mysqli_real_escape_string($connect,$_POST['zipcode'])."',`Total_Passenger`='".mysqli_real_escape_string($connect,$_POST['passengerTotal'])."'";
    if(mysqli_query($connect,$newQuote)){
      $newCnfId= mysqli_insert_id($connect);
      for($i=0;$i<trim($_POST['passengerTotal']);$i++)
      {
          $newPassenger="insert into confirm_passenger_details set `Cnf_ID`='".$newCnfId."', `First_Name`='".mysqli_real_escape_string($connect,$_POST['passengerFirstName'][$i])."', `Middle_Name`='".mysqli_real_escape_string($connect,$_POST['passengerMiddleName'][$i])."', `Last_Name`='".mysqli_real_escape_string($connect,$_POST['passengerLastName'][$i])."', `DOB`='".mysqli_real_escape_string($connect,date('Y-m-d',strtotime($_POST['passengerDOB'][$i])))."', `Gender`='".mysqli_real_escape_string($connect,$_POST['passengerGender'][$i])."', `Seat_Preference`='".mysqli_real_escape_string($connect,$_POST['passengerSeatType'][$i])."', `Meal_Request`='".mysqli_real_escape_string($connect,$_POST['passengerMeal'][$i])."', `Progam_Name`='".mysqli_real_escape_string($connect,$_POST['passengerProgramName'][$i])."', `Program_Number`='".mysqli_real_escape_string($connect,$_POST['passengerProgramNameNumber'][$i])."', `Traveler_Number`='".mysqli_real_escape_string($connect,$_POST['passengerTSA'][$i])."'";
            mysqli_query($connect,$newPassenger);
      }      
    }else{
        $err_msg="Error in submitting quote. Please try after sometime.";
    }
}

include('../inc/header-consumer.php');
?>
<style type="text/css">
ul{
  list-style-type: none;
}
</style>
<main class="confirmation">
<section>
<div class="container">
  <?php if(isset($err_msg) && $err_msg!=""){ ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $err_msg; ?>
  </div>
  <?php } ?>
  <div class="row">
    <div class="col-xs-12 col-sm-4">
      <h1>Credit Card Details</h1>
    </div>
    <div class="hidden-xs col-sm-7">
      <ul class="step-count">
        <li><i class="ion-plane"></i><span>Flight</span></li>
        <li class="active"><i class="ion-card"></i><span>Payment</span></li>
      </ul>
    </div>
  </div>
    <div class="row">
      <div class="col-xs-12 col-sm-11">
        <!--start form  -->
          <form id="confirmation-form" method="post" action="secure-payment-consumer-temp.php" autocomplete="off" data-parsley-validate>
            <input type="hidden" name="agentid" value="<?php echo $_POST['agentid']; ?>">           
            <input type="hidden" name="clientFirstName" value="<?php echo $_POST['clientFirstName']; ?>">
            <input type="hidden" name="clientLastName" value="<?php echo $_POST['clientLastName']; ?>">
            <input type="hidden" name="clientEmail" value="<?php echo $_POST['clientEmail']; ?>">
            <input type="hidden" name="clientNumber" value="<?php echo $_POST['clientNumber']; ?>">
            <input type="hidden" name="passengerTotal" value="<?php echo $_POST['passengerTotal']; ?>">
            <?php for($k=1;$k<=$_POST['passengerTotal'];$k++){ ?>
            <input type="hidden" name="passengerFirstName[]" id="passengerFirstName<?php echo $k; ?>" value="<?php if(isset($_POST['passengerFirstName'.$k]) && $_POST['passengerFirstName'.$k]!="") echo $_POST['passengerFirstName'.$k]; ?>" />
            <input type="hidden" name="passengerMiddleName[]" id="passengerMiddleName<?php echo $k; ?>" value="<?php if(isset($_POST['passengerMiddleName'.$k]) && $_POST['passengerMiddleName'.$k]!="") echo $_POST['passengerMiddleName'.$k]; ?>" />
            <input type="hidden" name="passengerLastName[]" id="passengerLastName<?php echo $k; ?>" value="<?php if(isset($_POST['passengerLastName'.$k]) && $_POST['passengerLastName'.$k]!="") echo $_POST['passengerLastName'.$k]; ?>" />
            <input type="hidden" name="passengerDOB[]" id="passengerDOB<?php echo $k; ?>" value="<?php if(isset($_POST['passengerDOB'.$k]) && $_POST['passengerDOB'.$k]!="") echo $_POST['passengerDOB'.$k]; ?>" />
            <input type="hidden" name="passengerGender[]" id="passengerGender<?php echo $k; ?>" value="<?php if(isset($_POST['passengerGender'.$k]) && $_POST['passengerGender'.$k]!="") echo $_POST['passengerGender'.$k]; ?>" />
            <input type="hidden" name="passengerSeatType[]" id="passengerSeatType<?php echo $k; ?>" value="<?php if(isset($_POST['passengerSeatType'.$k]) && $_POST['passengerSeatType'.$k]!="") echo $_POST['passengerSeatType'.$k]; ?>" />
            <input type="hidden" name="passengerMeal[]" id="passengerMeal<?php echo $k; ?>" value="<?php if(isset($_POST['passengerMeal'.$k]) && $_POST['passengerMeal'.$k]!="") echo $_POST['passengerMeal'.$k]; ?>" />
            <input type="hidden" name="passengerProgramName[]" id="passengerProgramName<?php echo $k; ?>" value="<?php if(isset($_POST['passengerProgramName'.$k]) && $_POST['passengerProgramName'.$k]!="") echo $_POST['passengerProgramName'.$k]; ?>" />
            <input type="hidden" name="passengerProgramNameNumber[]" id="passengerProgramNameNumber<?php echo $k; ?>" value="<?php if(isset($_POST['passengerProgramNameNumber'.$k]) && $_POST['passengerProgramNameNumber'.$k]!="") echo $_POST['passengerProgramNameNumber'.$k]; ?>" />
            <input type="hidden" name="passengerTSA[]" id="passengerTSA<?php echo $k; ?>" value="<?php if(isset($_POST['passengerTSA'.$k]) && $_POST['passengerTSA'.$k]!="") echo $_POST['passengerTSA'.$k]; ?>" />            
            <?php } ?>
            
          <div class="box">            
            <!--  -->
            <div class="row">
              <div class="col-xs-12 col-sm-7">
                <div class="form-group">
                  <label for="">Name On Card</label>
                  <input class="form-control" type="text" name="ccName" value="" required="" data-parsley-error-message="Please enter the name on card.">
                </div>
              </div>
            </div>
            <!--  -->
            <div class="row">
              <div class="col-xs-12 col-sm-7">
                <div class="form-group">
                  <label for="">Card Number</label>
                  <input class="form-control input-credit-card" type="text" name="ccNumber" value=""  required="" data-parsley-type="number" data-parsley-minlength="13" data-parsley-maxlength="17" data-parsley-error-message="Please enter card number.">
                </div>
              </div>
                <div class="col-xs-12 col-sm-3">
                  <div class="form-group">
                    <label for="">CVV</label>
                    <input class="form-control"type="text" name="ccCvv" value=""  required="" required="" data-parsley-type="number" data-parsley-minlength="3" data-parsley-maxlength="4" data-parsley-error-message="Please enter cvv.">
                  </div>
                </div>
            </div>
            <!--  -->
            <div class="row">
              <div class="col-xs-12 col-sm-3">
                <div class="form-group">
                  <label for="">Exp Month</label>
                  <select class="form-control" name="ccExpMonth"  required="">
                    <option value="" selected disabled>Choose One</option>
                    <?php
                    for($m=1;$m<=12;$m++)
                    {
                      ?>
                      <option value="<?php echo str_pad($m, 2, "0", STR_PAD_LEFT)?>"><?php echo date("M - m",strtotime("2014-".$m."-01")); ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
                <div class="col-xs-12 col-sm-3">
                  <div class="form-group">
                    <label for="">Exp Year</label>
                    <select class="form-control" name="ccExpYear"  required="">
                      <option value="" selected disabled>Choose One</option>
                     <?php
                      $currentYear = date("Y",time());
                      $next6Year = $currentYear + 8;
                      for($y=$currentYear;$y<=$next6Year;$y++)
                      {
                      ?>
                      <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
            </div>
            <!--  -->
            <h2>Credit Card Billing Address</h2>
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                  <label for="">Billing Address Line 1</label>
                  <input class="form-control"type="text" name="billingAddress1" value="" required="" data-parsley-error-message="Please enter billing address.">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                  <label for="">Billing Address Line 2</label>
                  <input class="form-control"type="text" name="billingAddress2" value="" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="">City</label>
                  <input class="form-control"type="text" name="city" value="" required="" data-parsley-error-message="Please enter city name.">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="">State</label>
                  <input class="form-control"type="text" name="state" value="" required="" data-parsley-error-message="Please enter state name.">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="">Postal Code</label>
                  <input class="form-control"type="text" name="zipcode" value="">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="">Country</label>
                  <select class="form-control" name="country" required="" data-parsley-error-message="Please select country.">
                    <option value="" disabled selected>Choose Country</option>
                    <?php
                    $countrySql = "select * from countries order by Country_Name";
                    $countryRs = mysqli_query($connect,$countrySql) or die("Cannot Execute Query: <P>".$countrySql."<P>".mysql_error());
                    while($countryRow=mysqli_fetch_array($countryRs))
                    {
                    ?>
                      <option value="<?php echo $countryRow['Country_Name']; ?>"><?php echo $countryRow['Country_Name']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>        
          </div>
          <!--  -->
          <div class="checkbox">
            <label></label>
              <input type="checkbox" required="" data-parsley-mincheck="1" data-parsley-error-message="Please accept this"> I have read and understand the fare rules and authorize my credit card to be charged by Regal Wings.
            
          </div>
          <input type="hidden" name="success_status" id="success_status" value="">
          <input type="submit" id="confirm_booking" class="btn btn-primary" name="" value="Confirm Booking">
        </form>
      <!--  -->
      </div>
    </div>
</section>
</main>
<?php include('../inc/footer-consumer.php'); ?>
<script type="text/javascript">
$("#confirm_booking").click(function(){
 if ($('#confirmation-form').parsley().isValid()){
   $("#success_status").val("103");
}
});
</script>

