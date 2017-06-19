<?php
$section = "confirmation";
$nav = "trans";
$footer = "hide";
$bg = "white";
include('../inc/connect.php');
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
  <div class="row">
    <div class="col-xs-12 col-sm-8">
      <h1>Ticket Confirmation</h1>
    </div>
    <div class="hidden-xs col-sm-3">
      <ul class="step-count">
        <li class="active"><i class="ion-plane"></i><span>Flight</span></li>
        <li><i class="ion-card"></i><span>Payment</span></li>
      </ul>
    </div>
  </div>
    <div class="row">
      <div class="col-xs-12 col-sm-11">
        <!--start form  -->
        <form id="confirmation-form" action="secure-payment-consumer-temp.php" method="post" autocomplete="off" data-parsley-validate>
          <input type="hidden" name="agentid" id="agentid" value="<?php echo $_GET['agentid']; ?>" >          
          <div class="box">
            <h2>Your Contact Details</h2>
            <div class="row">
              <div class="col-xs-6 col-sm-4">
                <div class="form-group">
                  <label for="clientFirstName">First Name</label>
                  <input type="text" class="form-control" name="clientFirstName" required="" data-parsley-error-message="Please enter your first name.">
                </div>
              </div>
              <div class="col-xs-6 col-sm-4">
                <div class="form-group">
                  <label for="clientLastName">Last Name</label>
                  <input type="text" class="form-control" name="clientLastName" required="" data-parsley-error-message="Please enter your last name.">
                </div>
              </div>
            </div>
            <!--  -->
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                  <label for="clientEmail">Email Address</label>
                  <input type="email" class="form-control" name="clientEmail" required="" data-parsley-error-message="Please enter a valid email address.">
                </div>
              </div>
            </div>
            <!--  -->
            <div class="row">
               <!--<div class="col-xs-4 col-sm-2">
                <div class="form-group">
                  <label for="countryCode">Country Code</label>
                  <select class="form-control" id="countryCode" name="countryCode" required="" data-parsley-error-message="Required value">
                    <option value="us" selected>US</option>
                  </select>
                </div>
              </div> -->
              <div class="col-xs-8 col-sm-8">
                <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="text" class="form-control input-phone" name="clientNumber" required="" data-parsley-error-message="Please enter a valid phone number.">
                </div>
              </div>
            </div>
            <!--  -->
          </div>
          <div class="box">
            <h2>Passenger Details</h2>
            <p>Please provide the full passenger name, including middle names or initials, exactly as it reads on the goverment issued I.D you travel with.</p>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Total Passengers</label>
                  <select class="form-control" name="passengerTotal" id="passengerTotal">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                  </select>
                </div>
              </div>
            </div>
            <h3>Passenger 1</h3>
            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label for="passengerFirstName">First Name</label>
                  <input type="text" class="form-control" name="passengerFirstName1" required="" data-parsley-error-message="Please enter the first name.">
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label for="passengerMiddleName">Middle Name</label>
                  <input type="text" class="form-control" name="passengerMiddleName1" required="" data-parsley-error-message="Please enter the middle name.">
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label for="passengerMiddleName">Last Name </label>
                  <input type="text" class="form-control" name="passengerLastName1" required="" data-parsley-error-message="Please enter the last name.">
                </div>
              </div>
            </div>
            <!--  -->
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="passengerDOB">Date of Birth</label>
                  <input type="text" class="form-control date" name="passengerDOB1" required="" data-parsley-error-message="Please enter the date of birth.">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="passengerGender">Gender</label>
                  <select class="form-control" name="passengerGender1" required="" data-parsley-error-message="Please select a gender.">
                    <option value="" disabled selected>Choose One</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
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
                  <select class="form-control" name="passengerSeatType1">
                    <option value="" disabled selected>Choose One</option>
                    <option value="aisle">Aisle</option>
                    <option value="window">Window</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="passengerMeal">Meal Request</label>
                  <select class="form-control" name="passengerMeal1">
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
                    <select class="form-control" name="passengerProgramName1">
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
                  <input type="text" class="form-control" name="passengerProgramNameNumber1">
                </div>
              </div>
            </div>
            <hr>
            <h2>Global Entry / TSA / Known Traveler </h2>
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                  <label for="passengerTSA">ID Number</label>
                  <input type="text" class="form-control" name="passengerTSA1">
                </div>
              </div>
            </div>
            <div id="extraPassenger"></div>
          </div>
          
          <input type="submit" class="btn btn-primary" name="" value="Continue">
        </form>
    </div>
  </div>
</div>
</section>
</main>
<?php include('../inc/footer-consumer.php'); ?>

<script type="text/javascript">
var rows=1;
$("#passengerTotal").change(function(){
  
  if($("#passengerTotal").val()>rows){
    $.ajax({
         url:'../ajax.php',
         type:'post',
         data:'action=addpassenger&start='+rows+'&total='+$("#passengerTotal").val(),
         success:function(res){
              $("#extraPassenger").append(res);
              rows=$("#passengerTotal").val();
               $(".date").flatpickr({
                  dateFormat: "m-d-Y",
                  maxDate: "today",
              });
         } 
      }); 
  }else if($("#passengerTotal").val()<rows){
      for(var k=rows; k>$("#passengerTotal").val();k--){
        $("#passenger"+k).remove();
      }
       rows=$("#passengerTotal").val();
  }
  
});


</script>

