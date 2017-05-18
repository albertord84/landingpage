angular.module('dumbuApp')

.service('InstagProfile', [
  '$resource', '$timeout', '$interval', '$log', 
  function _InstagProfile($resource, $timeout, $interval, $log){
    return {
      checkProfile: function _checkProfile($scope) {
        // Mostrar texto de que se esta haciendo algo...
        $scope.changeChkProfileButtonText();
        // Obtener URL base
        var ub = window.location.href;
        if (ub.indexOf('?')!=-1) ub = ub.split('?')[0];
        if (ub.indexOf('index.php')==-1) ub += 'index.php';
        // Bloquear la interfaz
        $scope.loading = true;
        // Hacer peticion AJAX para chequear si existe
        // el perfil en Instagram
        var _r = $resource(ub + '/check/profile');
        _r.save({
          'instagProf': $scope.instagProf,
          'eMail': $scope.eMail
        }).$promise.then(function _getProfileInfoSuccess(_json) {
          if (console) console.log(_json);
          if (angular.isUndefined(_json.username)) {
            swal({
              title: "Error",
              text: "Perfil não existe",
              type: "error"
            });
            $scope.loading = false;
            // Devolver texto del boton
            $scope.restoreChkProfileButtonText();
            return;
          }
          $timeout(function _delayProfilePhotoShow() {
            if (console) console.log(_json.profile_pic_url);
            // Reflejar nombre del perfil
            $scope.profName = _json.username;
            // Mostrar imagen del perfil
            var img = new Image();
            img.onload = function _afterLoadImage() {
              $('div.prof-picture').css({
                'background-image': 'url(' + _json.profile_pic_url + ')'
                //'background-image': 'url(img/icon.png)'
              });
              if (!$('div.prof-picture').hasClass('hidden')) {
                $('div.prof-picture').addClass('hidden');
              }
              // Dar efecto de que la imagen va apareciendo
              $('div.prof-picture').hide()
                .removeClass('hidden').fadeIn(600);
            };
            img.src = _json.profile_pic_url;
            // Cambiar campos del formulario
            $scope.profVerified = true;
            var s = 5;
            var promise = $interval(function _changeSeconds(){
              $scope.loading = false;
              // Agregar al texto del boton el conteo regresivo de 5 seg
              var bt = $('.form-signin button').text();
              if (s == 5) {
                bt = bt + ' - ' + s + 's';
              }
              else {
                bt = bt.split('-')[0] + ' - ' + s + 's';
              }
              $('.form-signin button').text(bt);
              s--;
            }, 1000, 6).then(function _afterSeconds() {
              // Restaurar el texto del boton quitanto el conteo regresivo
              var bt = $('.form-signin button').text();
              bt = bt.split('-')[0];
              $('.form-signin button').text(bt);
              // Restaurar botones
              $scope.profVerified = false;
              // Restaurar imagen del perfil y nombre de usuario
              $('div.prof-picture').fadeOut(600, function _afterFade(){
                $(this).addClass('hidden');
              })
              $scope.profName = '@user';
              // Desbloquear el formulario
              $scope.loading = false;
              // Redirigir...
              $scope.redirect();
            });
          }, 1000);
        }, function _getProfileInfoFailure(){
          $timeout(function _delayFormActivation() {
            $scope.loading = false;
          }, 1000);
        });
        if (console) console.log($scope.instagProf + ' ' + 
          $scope.eMail);
      }
    };
  }
]);
