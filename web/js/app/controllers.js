angular.module('dumbuApp')

.controller('MainController', [
  '$scope', '$timeout', 'InstagProfile', 
  function _MainController($scope, $timeout, InstagProfile) {

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
        $timeout(function _delayLangSelection(){
          // Al cambiar de idioma se pierde la flecha que
          // indica que es un menu desplegable
          var ddToggle = $('.top-stripe .lang-selector .dropdown-toggle');
          var caret = document.createElement('span');
          $(caret).attr('class', 'caret');
          $(ddToggle).text(origVal + ' ');
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

    $scope.setKMSubscribersCount();
    $scope.setLangSelectorEvents();

  }
]);

