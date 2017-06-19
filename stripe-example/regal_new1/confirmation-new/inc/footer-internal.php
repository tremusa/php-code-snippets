<footer class="<?php if ($footer === "hide") {echo "hide";} ?>">
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-1 crest">
              <img src="<?php echo("$base_url") ?>images/crest.png" width="85px" alt="Regal Wings">
          </div>
          <div class="col-xs-6 col-sm-2 col-sm-offset-1 fh">
              <h3>Company</h3>
              <ul>
                <li><a href="<?php echo("$base_url") ?>company/">About</a></li>
              </ul>
          </div>
          <div class="col-xs-6 col-sm-2 hidden-xs">
              <h3>Discover</h3>
              <ul>
                <li><a href="/jets" target="blank">Private Charter</a></li>
                <li><a href="<?php echo("$base_url") ?>careers/">Careers</a></li>
              </ul>
          </div>
          <div class="col-xs-6 col-sm-3 fh">
              <h3>Get In Touch</h3>
              <ul>
                <li><a href="tel:+1888.734.2594"><i class="ion-ios-telephone-outline"></i> 1.888.REGAL.WINGS (888.734.2594)</a></li>
                <li><a href="<?php echo("$base_url") ?>contact/">Contact Us</a></li>
              </ul>
          </div>
          <div class="col-xs-6 col-sm-offset-1 col-sm-2">
              <img src="<?php echo("$base_url") ?>images/inc-500.png"  width="170px" alt="Regal Wings">
          </div>
      </div>
      <div class="footer-lower">
        <span class="copyright pull-right"><a href="<?php echo("$base_url") ?>legal/">Terms of Service</a> | Copyright <?php echo date("Y"); ?></span>
      </div>
  </div>
</footer>
<div id="videoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <iframe id="video" width="560" height="315" src="//www.youtube.com/embed/wh0GQzeq0cA" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="dist/js/parsley.js"></script>
<link rel="stylesheet" href="dist/css/flatpickr.css">
<script src="dist/js/flatpickr.js"></script>
<!-- new account form -->
<script type="text/javascript">
// init datepicker
  $(".date").flatpickr({
      dateFormat: "m-d-Y",
      maxDate: "today",
  });
//new account form
$(function () {
  var $sections = $('.form-section');

  function navigateTo(index) {
    // Mark the current section with the class 'current'
    $sections
      .removeClass('current')
      .eq(index)
        .addClass('current');
    // Show only the navigation buttons that make sense for the current section:
    $('.form-navigation .previous').toggle(index > 0);
    var atTheEnd = index >= $sections.length - 1;
    $('.form-navigation .next').toggle(!atTheEnd);
    $('.form-navigation [type=submit]').toggle(atTheEnd);    
  }

  function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter('.current'));
  }

  // Previous button is easy, just go back
  $('.form-navigation .previous').click(function() {
    navigateTo(curIndex() - 1);
  });

  // Next button goes forward iff current block validates
  $('.form-navigation .next').click(function() {
    if ($('.new-account-registration').parsley().validate({group: 'block-' + curIndex()}))
      navigateTo(curIndex() + 1);
  });

  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
  $sections.each(function(index, section) {
    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
  });
  navigateTo(0); // Start at the beginning
});
// Show refereal source field of other is selected
$('#referalSource').on('change',function(){
    if( $(this).val()==="other"){
    $("#referalSourceOther").show()
    }
    else{
    $("#referalSourceOther").hide()
    }
});
// Show organzation number if anything other than NA is selected
$('#agencyOrganization').on('change',function(){
    if( $(this).val()!="na"){
    $("#organziationNumber").show()
    }
    else{
    $("#organziationNumber").hide()
    }
});
// Show host agency name field if yes is selected
$('#hostAgency').on('change',function(){
    if( $(this).val()==="yes"){
    $("#selectAgency").show()
    }
    else{
    $("#selectAgency").hide()
    }
});
// Show add a host agency section
$('#hostAgencyName').on('change',function(){
    if( $(this).val()==="not_shown"){
    $("#hostAgencyAdd").show()
    }
    else{
    $("#hostAgencyAdd").hide()
    }
});
//hide agency if no is selcted
$('#hostAgency').on('change',function(){
    if( $(this).val()==="no"){
    $("#hostAgencyAdd").hide()
    }
});
//
//end new account form, start invoice form
//
$('#internal-invoice').parsley();
// show client referral field if new is selected.
$('#clientType').on('change',function(){
    if( $(this).val()==="new"){
    $("#clientReferred").show()
    }
    else{
    $("#clientReferred").hide()
    }
});
// show net options if net is selected
$('#fareType').on('change',function(){
    if( $(this).val()==="net"){
    $("#netType").show()
    }
    else{
    $("#netType").hide()
    }
});
// show paid by if there is an extra cost
$('#ticketExtraCost').on('change',function(){
    if( $(this).val()==="yes"){
    $("#ticketExtraCostPaidContain").show()
    }
    else{
    $("#ticketExtraCostPaidContain").hide()
    }
});
//
//end new account form, start change form
//
$('#internal-change').parsley();
// show client referral field if new is selected.
$('#changeType').on('change',function(){
    if( $(this).val()==="voluntary"){
    $("#paymentInformation").show()
    }
    else{
    $("#paymentInformation").hide()
    }
});
</script>
</body>
</html>
