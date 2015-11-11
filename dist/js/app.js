(function(angular){
	var app = angular.module('SM', ['ui.bootstrap', 'ngRoute']);

	app.config(['$routeProvider', function($routeProvider){
		$routeProvider.when('/', {
			redirectTo: '/login',
		})
		.when('/login', {
			controller: 'LoginController',
			templateUrl: 'views/login.html'
		})
	}]);
})(angular)