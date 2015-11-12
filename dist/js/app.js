(function(angular){
	var app = angular.module('SM', ['ui.bootstrap', 'ngRoute', 'ngResource']);

	app.config(['$routeProvider', function($routeProvider){
		$routeProvider.when('/login', {
			controller: 'LoginController',
			templateUrl: 'views/login.html'
		});
		$routeProvider.when('/', {
			//controller: 'LoginController',
			templateUrl: 'views/site.html'
		});
	}]);
})(angular);