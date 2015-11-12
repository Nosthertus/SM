(function(angular){
	var app = angular.module('SM');

	app.controller('SiteController', ['UserService', '$location', '$scope', function(UserService, $location, $scope){
		$scope.menu = [
			{
				header: 'Login',
				view: 'views/site/login.html'
			},
			{
				header: 'Sign up',
				view: 'views/site/signup.html'
			}
		];
	}]);
})(angular);