angular.module('dumbuApp')

.service('InstagProfile', [
  '$resource', '$timeout', '$log', 
  function _InstagProfile($resource, $timeout, $log){
    return {
      checkProfile: function _checkProfile($scope) {
        // Hacer peticion AJAX para chequear si existe
        // el perfil en Instagram
        if (console) console.log($scope.instagProf + ' ' + 
          $scope.eMail);
      }
    };
  }
]);
