<!DOCTYPE html>
<html lang="en" data-ng-app="dumbuApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DUMBU</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- For IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body data-ng-controller="MainController">

    <div class="container-fluid">
      
      <div class="top-stripe row text-center">
        <img src="img/logo-black.png" />
        <span class="lang-selector dropdown">
          <a class="btn btn-default dropdown-toggle" 
                  type="button" id="dropdownLang" data-toggle="dropdown" 
                  aria-haspopup="true" aria-expanded="true">EN - EU
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownLang">
            <li><a href="#">PT - BR</a></li>
          </ul>
        </span>
      </div>

      <div class="top-header row">

        <div class="left col-xs-12 col-sm-6 col-md-7 col-lg-7">
          <div class="row">
            <div class="info-globe col-xs-12 col-md-3">
              <img src="img/info-globe.png" />
              <div class="user-count">
                <span count-up end-val="userCount" 
                      options="countUpOptions"></span>
              </div>
            </div>
            <div class="info col-xs-12 col-md-9 col-lg-9">
              <p class="h4">Actual Instagram results updated!</p>
              <p class="h4">Check your account below:</p>
            </div>
          </div>
        </div> <!-- end top left contents -->

        <div class="right col-xs-12 col-sm-6 col-md-5 col-lg-5">
          <p class="flags"><img src="img/flags.png" /></p>
          <p class="text-uppercase"><b>DUMBU is global!</b></p>
          <div class="small">
            <p class="gray">We have customers in more than 200 countries.</p>
            <p class="gray">Take advantage of one of the most growing Startups nowadays!</p>
          </div>
        </div> <!-- end top right contents -->

      </div> <!-- end top contents -->

      <div class="middle-content row">
        <h4 class="form-signin-heading text-center">After checking your account will be redirected to your site</h4>
      </div>

      <div class="middle-form row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-lg-push-1">
          <div class="phone-img text-center">
            <img class="" src="img/phone.png" />
          </div>
        </div>
        <div class="form-container col-xs-12 col-sm-6 col-sm-pull-1 col-md-7 col-md-push-1 col-lg-7">
          <form class="form-signin">
            <h4 class="form-signin-heading text-center">Ckeck your Instagram here</h4>
            <label for="inputEmail" 
                   class="sr-only text-left">Instagram user</label>
            <input type="email" id="inputEmail" 
                   class="form-control text-left" 
                   placeholder="Usuario de Instagram" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control"
                   placeholder="Contrase&ntilde;a" required>
            <button class="btn btn-lg btn-primary btn-block" 
                    type="submit">Verify</button>
          </form>
        </div>
      </div>

      <div class="footer row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p><img src="img/logo-white-plus.png" /></p>
          <p class="text-uppercase">DUMBU 2017 - All rights reserved</p>
        </div>
      </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/app/app.js"></script>

  </body>
</html>