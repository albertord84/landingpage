var dumbuApp = angular.module('dumbuApp', ['countUpModule']);

dumbuApp.controller('MainController', [
	'$scope',
	function _MainController($scope) {
		$scope.userCount = 102;
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
	}
]);

