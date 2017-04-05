var dumbuApp = angular.module('dumbuApp', ['countUpModule']);

dumbuApp.controller('MainController', [
	'$scope', '$timeout',
	function _MainController($scope, $timeout) {
		// jugar con la K o la M si son miles o millones
		// la cantidad de usuarios devueltos
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
		// eventos del selector de idioma
		$('.top-stripe .lang-selector ul li').click(function _clickLang()
		{
			var origVal = $(this).text();
			var val = $(this).text().trim().toLowerCase();
			$timeout(function _delayLangSelection(){
				var ddToggle = $('.top-stripe .lang-selector .dropdown-toggle');
				var caret = document.createElement('span');
				$(caret).attr('class', 'caret');
				$(ddToggle).text(origVal + ' ');
				$(ddToggle).append(caret);
				if (val.indexOf('pt')!=-1) {
					// cargar pagina en portugues
					if (console) console.log('redirect to portuguese version..');
					window.location.href = '/index.php';
				}
				if (val.indexOf('en')!=-1) {
					// cargar pagina en ingles
					if (console) console.log('redirect to english version..');
					window.location.href = '/index-en.php';
				}				
			}, 300);

		});
	}
]);

