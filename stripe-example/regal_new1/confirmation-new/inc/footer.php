<footer>
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-1 crest">
              <img src="<?php echo("$base_url") ?>images/crest.png" width="85px" alt="Regal Wings">
          </div>
          <div class="col-xs-6 col-sm-2 col-sm-offset-1 fh">
              <h3>Company</h3>
              <ul>
                <li><a href="<?php echo("$base_url") ?>company/">About</a></li>
                <!-- <li><a href="<?php echo("$base_url") ?>help/">FAQ</a></li> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
$('[id*="tab-"]').click(function (e) {
    if(this.id=="tab-1"){
        $('.services').css('background', 'url(./images/service-air.jpg)');
    }
    else if(this.id=="tab-2"){
        $('.services').css('background', 'url(./images/service-jet.jpg)');
    }
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    var url = $("#video").attr('src');
    $("#videoModal").on('hide.bs.modal', function(){
        $("#video").attr('src', '');
    });
    $("#videoModal").on('show.bs.modal', function(){
        $("#video").attr('src', url);
    });
});
</script>
</body>
</html>
