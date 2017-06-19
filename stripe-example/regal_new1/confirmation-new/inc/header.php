<?php
 $base_url = "/";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Regal Wings</title>
    <link href="<?php echo("$base_url") ?>dist/css/regal-wings.min.css" rel="stylesheet">
    <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  </head>
  <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-54N7DL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-54N7DL');</script>
<!-- End Google Tag Manager -->
  <body>
    <div class="pre-nav hidden-xs">
      <div class="container">
        <a href="tel:+1888.734.2594" class="active"><i class="ion-ios-telephone-outline"></i> 1.888.REGAL.WINGS (888.734.2594)</a>
        <span class="pull-right">
            <a href="#" class="active">Premium Air Consolidation</a> |
            <a href="<?php echo("$base_url") ?>jets">Private Aviation</a>
        </span>
      </div>
    </div>
    <nav class="navbar navbar-default <?php if ($nav === "trans") {echo "navbar-solid";} ?>">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo("$base_url") ?>"><img src="<?php echo("$base_url") ?>images/logo.png" width="230px" alt="Regal Wings"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo("$base_url") ?>">Home</a></li>
            <!-- <li><a href="<?php echo("$base_url") ?>careers/">Become a Rep</a></li> -->
            <li><a href="<?php echo("$base_url") ?>company/">About Regal Wings</a></li>
            <a href="<?php echo("$base_url") ?>quote/" class="btn btn-primary navbar-btn">Book Now</a>
          </ul>
        </div>
      </div>
    </nav>
