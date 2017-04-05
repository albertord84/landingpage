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
                  aria-haspopup="true" aria-expanded="true">PT - BR
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownLang">
            <li><a href="#">EN - EU</a></li>
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
              <p class="h4">Resultados reais para seu Instagram!</p>
              <p class="h4">Analise sua conta abaixo:</p>
            </div>
          </div>
        </div> <!-- end top left contents -->

        <div class="right col-xs-12 col-sm-6 col-md-5 col-lg-5">
          <p class="flags"><img src="img/flags.png" /></p>
          <p class="text-uppercase"><b>&iexcl;DUMBU &eacute; global!</b></p>
          <div class="small">
            <p class="gray">Temos clientes em mais de 200 pa&iacute;ses.</p>
            <p class="gray">Fa&ccedil;a parte de uma das Startups que mais cresce nos &uacute;ltimos tempos!</p>
          </div>
        </div> <!-- end top right contents -->

      </div> <!-- end top contents -->

      <div class="middle-content row">
        <h4 class="form-signin-heading text-center">Ap&oacute;s analisar sua conta voc&ecirc; ser&aacute; direcionado para o site</h4>
      </div>

      <div class="middle-form row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-lg-push-1">
          <div class="phone-img text-center">
            <img class="" src="img/phone.png" />
          </div>
        </div>
        <div class="form-container col-xs-12 col-sm-6 col-sm-pull-1 col-md-7 col-md-push-1 col-lg-7">
          <form class="form-signin">
            <h4 class="form-signin-heading text-center">Verifique seu instagram aqui</h4>
            <label for="inputEmail" 
                   class="sr-only text-left">Usu&aacute;rio do Instagram</label>
            <input type="text" id="inputEmail" 
                   class="form-control text-left" 
                   placeholder="Usu&aacute;rio do Instagram" required autofocus>
            <label for="inputPassword" class="sr-only">E-mail</label>
            <input type="email" id="inputPassword" class="form-control"
                   placeholder="E-mail" required>
            <button class="btn btn-lg btn-primary btn-block" 
                    type="submit">Analisar</button>
          </form>
        </div>
      </div>

      <div class="footer row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p><img src="img/logo-white-plus.png" /></p>
          <p class="text-uppercase">DUMBU 2017 - TODOS OS DIREITOS RESERVADOS</p>
        </div>
      </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/app/app.js"></script>

  </body>
</html>