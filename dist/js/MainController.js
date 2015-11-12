(function(angular){
	var app = angular.module('SM');

	app.controller('MainController', ['UserService', '$location', '$scope', function(UserService, $location, $scope){
		$scope.menu = [
			{
				header: 'Login',
				view: 'views/login.html',
				controller: 'LoginController'
			},
			{
				header: 'Sign up',
				view: 'views/signup.html',
				controller: 'LoginController'
			}
		];
	}]);
})(angular);