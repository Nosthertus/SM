(function(angular){
	var app = angular.module('SM');

	app.controller('SignupController', ['$scope', 'UserService', function($scope, UserService){
		$scope.username = null;
		$scope.lastname = null;
		$scope.email = null;
		$scope.password = null;
		$scope.passwordRepeat = null;
		$scope.dateBirth = null;

		$scope.hasErrors = false;

		$scope.errors = {};

		$scope.date = {
			open: false
		};

		$scope.submit = function(){
			var signup = {
				username: $scope.username,
				lastname: $scope.lastname,
				email: $scope.email,
				password: $scope.password,
				dateBirth: $scope.dateBirth
			};

			console.log(signup);
		};
	}]);
})(angular);