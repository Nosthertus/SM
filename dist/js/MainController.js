(function(angular){
	var app = angular.module('SM');

	app.controller('MainController', ['UserService', '$location', function(UserService, $location){
		if(UserService.isGuest())
			$location.path('/login');
	}]);
})(angular);