angular.module('dumbuApp')

.service('InstagProfile', [
  '$resource', '$timeout', '$log', 
  function _InstagProfile($resource, $timeout, $log){
    return {
      checkProfile: function _checkProfile($scope) {
        // Bloquear la interfaz
        $scope.loading = true;
        // Hacer peticion AJAX para chequear si existe
        // el perfil en Instagram
        var _r = $resource('igram.php', { 'instagProf': $scope.instagProf });
        _r.get().$promise.then(function _getProfileInfoSuccess(_json) {
          $timeout(function _delayProfilePhotoShow() {
            if (console) console.log(_json);
            // Reflejar nombre del perfil
            $scope.profName = _json.user.username;
            // Mostrar imagen del perfil
            $('div.prof-picture.hidden').css({
              'background-image': 'url(' + _json.user.profile_pic_url + ')'
              //'background-image': 'url(img/icon.png)'
            });
            // Dar efecto de que la imagen va apareciendo
            $('div.prof-picture.hidden').hide()
              .removeClass('hidden').fadeIn(600);
            $scope.loading = false;
            // Cambiar campos del formulario
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
