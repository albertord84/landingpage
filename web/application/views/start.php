<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en" data-ng-app="dumbuApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DUMBU</title>

    <link rel="shortcut icon" href="<?php echo uri_string(); ?>assets/img/icon.png">

    <link href="<?php echo uri_string(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo uri_string(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo uri_string(); ?>assets/css/sweetalert.css" rel="stylesheet">

    <!-- For IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body data-ng-controller="MainController">

    <div class="container-fluid">
      
      <div class="top-stripe row text-center">
        <img src="<?php echo uri_string(); ?>assets/img/logo-black.png" />
        <span class="lang-selector dropdown">
          <a class="btn btn-default dropdown-toggle" 
                  type="button" id="dropdownLang" data-toggle="dropdown" 
                  aria-haspopup="true" aria-expanded="true">
                  <?php echo $trans['lang']; ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownLang">
            <?php foreach ($langList as $key => $lang) {
              if ($key != $_l) { ?>
                <li><a href="#"><?php echo $lang; ?></a></li>
              <?php }
            } ?>
          </ul>
        </span>
      </div>

      <div class="top-header row">

        <div class="left col-xs-12 col-sm-6 col-md-7 col-lg-7">
          <div class="row">
            <div class="info-globe col-xs-12 col-md-3">
              <img src="<?php echo uri_string(); ?>assets/img/info-globe.png" />
              <div class="user-count">
                <span count-up end-val="userCount" 
                      options="countUpOptions"></span>
              </div>
            </div>
            <div class="info col-xs-12 col-md-9 col-lg-9">
              <p class="h4"><?php echo $trans['h4-1']; ?></p>
              <p class="h4"><?php echo $trans['h4-2']; ?></p>
            </div>
          </div>
        </div> <!-- end top left contents -->

        <div class="right col-xs-12 col-sm-6 col-md-5 col-lg-5">
          <p class="flags"><img src="<?php echo uri_string(); ?>assets/img/flags.png" /></p>
          <p class="text-uppercase">
            <b><?php echo $trans['p-upper']; ?></b>
          </p>
          <div class="small">
            <p class="gray"><?php echo $trans['small1']; ?></p>
            <p class="gray"><?php echo $trans['small2']; ?></p>
          </div>
        </div> <!-- end top right contents -->

      </div> <!-- end top contents -->

      <div class="middle-content row">
        <h4 class="form-signin-heading text-center">
          <?php echo $trans['center']; ?>
        </h4>
      </div>

      <div class="middle-form row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4 col-lg-push-1">
          <div class="phone-img text-center">
            <img class="" src="<?php echo uri_string(); ?>assets/img/phone.png" />
            <div class="prof-name">
              <b data-ng-bind="profName">@user</b>
            </div>
            <div class="prof-picture hidden"></div>
          </div>
        </div>
        <div class="form-container col-xs-12 col-sm-6 col-sm-pull-1 col-md-7 col-md-push-1 col-lg-6">
          <form class="form-signin">
            <fieldset data-ng-disabled="loading">
              <h4 class="form-signin-heading text-center">
                <?php echo $trans['frm_title']; ?>
              </h4>
              <label for="inputProf" 
                     class="sr-only text-left"><?php echo $trans['lb_user']; ?></label>
              <input type="text" id="inputProf" 
                     class="form-control text-left" 
                     placeholder="<?php echo $trans['lb_user']; ?>" 
                     data-ng-change="profLowerCase()" 
                     required data-ng-model="instagProf">
              <label for="inputEMail" class="sr-only">
                <?php echo $trans['lb_email']; ?>
              </label>
              <input type="email" id="inputEMail" class="form-control"
                     placeholder="<?php echo $trans['lb_email']; ?>" 
                     required data-ng-model="eMail">
              <button class="btn btn-lg btn-primary btn-block" 
                      data-ng-if="!profVerified" 
                      data-ng-click="checkInstagProfile()" 
                      data-ng-disabled="!instagProf || !eMail" 
                      type="button"><?php echo $trans['frm_bt']; ?></button>
              <button class="btn btn-lg btn-primary btn-block" 
                      data-ng-if="profVerified"
                      data-ng-click="redirect()" 
                      data-ng-disabled="!instagProf || !eMail" 
                      type="button"><?php echo $trans['frm_bt2']; ?></button>
            </fieldset>
          </form>
        </div>
      </div>

      <div class="map row">
        <div class="h3 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
          <span class=""><?php echo $trans['map_title']; ?></span>
        </div>
        <div class="map-left col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
          <img src="<?php echo uri_string(); ?>assets/img/map-l.png">
        </div>
        <div class="map-right col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
          <img src="<?php echo uri_string(); ?>assets/img/map-r.png">
        </div>
      </div>

      <div class="footer row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p><img src="<?php echo uri_string(); ?>assets/img/logo-white-plus.png" /></p>
          <p class="text-uppercase">
            DUMBU <?php echo date('Y'); ?> - <?php echo $trans['copy_r']; ?>
          </p>
        </div>
      </div>

    </div>

    <script src="<?php echo uri_string(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo uri_string(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo uri_string(); ?>assets/js/angular.js"></script>
    <script src="<?php echo uri_string(); ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo uri_string(); ?>assets/js/app/app.js"></script>
    <script src="<?php echo uri_string(); ?>assets/js/app/services.js"></script>
    <script src="<?php echo uri_string(); ?>assets/js/app/controllers.js"></script>

  </body>
</html>