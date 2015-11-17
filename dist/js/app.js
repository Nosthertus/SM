(function(angular){
	var app = angular.module('SM', ['ui.bootstrap', 'ngRoute', 'ngResource', 'flow']);

	app.config(['$routeProvider', function($routeProvider){
		$routeProvider.when('/login', {
			controller: 'LoginController',
			templateUrl: 'views/login.html'
		});
		$routeProvider.when('/', {
			controller: 'SiteController',
			templateUrl: 'views/site/index.html'
		});
		$routeProvider.when('/line', {
			controller: 'LineController',
			templateUrl: 'views/line/index.html'
		});
		$routeProvider.when('/profile', {
			controller: 'ProfileController',
			templateUrl: 'views/profile/index.html'
		});
		$routeProvider.otherwise('/');
	}]);
})(angular);