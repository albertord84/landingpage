angular.module('dumbuApp')

.controller('MainController', [
  '$scope', '$timeout', 'InstagProfile', 
  function _MainController($scope, $timeout, InstagProfile) {
    $scope.profName = '@user';
    // Para coger parametros que pudieran pasarse a la pagina
    // Esta funcion la tome de:
    // http://stackoverflow.com/questions/901115/
    //   how-can-i-get-query-string-values-in-javascript/901144#901144
    $scope.getParamByName = function _getParamByName(name) {
      var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
      return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    };
    // Jugar con la K o la M si son cientos, miles,
    // cientos de miles o millones la cantidad de
    // usuarios devueltos
    $scope.setKMSubscribersCount = function _setKMSubscribersCount() {
      // Obtener esto por AJAX mas adelante, pero por ahora,
      // usar un numero aleatorio.
      $scope.userCount = Math.round(Math.random() * 1000);
      var _suffix = '';
      if ($scope.userCount > 999 && $scope.userCount < 999999) {
        $scope.userCount = Math.round($scope.userCount / 1000)
        _suffix = 'K';
      }
      if ($scope.userCount > 999999) {
        $scope.userCount = Math.round($scope.userCount / 1000000)
        _suffix = 'M';
      }
      $scope.countUpOptions = {
        suffix: _suffix
      };
    };

    $scope.setLangSelectorEvents = function _setLangSelectorEvents() {
      // Eventos del selector de idioma
      $('.top-stripe .lang-selector ul li').click(function _clickLang()
      {
        var origVal = $(this).text();
        var val = $(this).text().trim().toLowerCase();
        var img = $(this).find('img');
        $timeout(function _delayLangSelection(){
          // Al cambiar de idioma se pierde la flecha que
          // indica que es un menu desplegable
          var ddToggle = $('.top-stripe .lang-selector .dropdown-toggle');
          var caret = document.createElement('span');
          $(caret).attr('class', 'caret');
          $(ddToggle).text(origVal + ' ');
          $(ddToggle).prepend(img);
          $(ddToggle).append(caret);
          // Crear formulario de redireccion/recargar la pagina
          // al seleccionar un idioma diferente
          var frm = document.createElement('form');
          $(frm).attr('method', 'get');
          $(frm).attr('action', '.');
          $(document.body).append(frm);
          // Redireccionar de acuerdo al idioma
          if (val.indexOf('pt')!=-1) {
            // Cargar pagina en portugues por defecto
            if (console) console.log('redirect to portuguese version...');
            $(frm).submit();
          }
          else {
            // Cargar pagina traducida al idioma seleccionado
            if (console) console.log('redirect to translated version...');
            var tr = val.split('-')[0].trim();
            var inp = document.createElement('input');
            // Agregar el campo al formulario que sera el parametro
            // con el idioma
            $(inp).attr('type', 'hidden');
            $(inp).attr('name', 'l');
            $(inp).attr('value', tr);
            $(frm).append(inp);
            $(frm).submit();
          }
        }, 300);
      });
    }; // Fin de los eventos del selector de idioma

    $scope.checkInstagProfile = function _checkInstagProfile() {
      InstagProfile.checkProfile($scope);
    };

    $scope.redirect = function _redirect() {
      if (console) {
        console.log('redirect with user: ' + $scope.instagProf + 
          ', and email ' + $scope.eMail);
      }
      var utmSrc = $scope.getParamByName('utm_source');
      $scope.loading = true;
      var l = $('#dropdownLang').text().trim().toLowerCase();
      var isPtg = l == "pt - br";
      var isEng = l == "en - us";
      var dst = isPtg ? 'dumbu.pro' : 'dumbu.one';
      var frm = document.createElement('form');
      $(frm).attr('method', 'get');
      $(frm).attr('action', 'https://' + dst);
      $(document.body).append(frm);
      var inp = document.createElement('input');
      $(inp).attr('type', 'hidden');
      $(inp).attr('name', 'username');
      $(inp).attr('value', $scope.instagProf);
      $(frm).append(inp);
      inp = document.createElement('input');
      $(inp).attr('type', 'hidden');
      $(inp).attr('name', 'email');
      $(inp).attr('value', $scope.eMail);
      $(frm).append(inp);
      // Parametro que indica que la llamada a la pagina provenia
      // de un sitio de compras
      if (utmSrc) {
        inp = document.createElement('input');
        $(inp).attr('type', 'hidden');
        $(inp).attr('name', 'utm_source');
        $(inp).attr('value', utmSrc);
        $(frm).append(inp);
      }
      $timeout(function _delaySubmit() {
        $scope.loading = false;
        $(frm).submit();
      }, 600);
    };

    $scope.profLowerCase = function _profLowerCase() {
      if ($scope.instagProf) {
        $scope.instagProf = $scope.instagProf.toLowerCase();
      }
    };

    $scope.validateMail = function _validateMail() {
      if ($scope.eMail) {
        $scope.eMail = $scope.eMail.toLowerCase();
        // RegExp tomada de http://stackoverflow.com/questions/46155/
        //   validate-email-address-in-javascript
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        $scope.validMail = re.test($scope.eMail);
        return;
      }
      $scope.validMail = false;
    }

    $scope.setKMSubscribersCount();
    $scope.setLangSelectorEvents();

  }
]);

