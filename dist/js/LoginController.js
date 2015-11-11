(function(angular){
	var app = angular.module('SM');

	app.controller('LoginController', ['$scope', function($scope){
		$scope.username = null;
		$scope.password = null;

		$scope.submit = function(){
			alert("welcome " + $scope.username);
		};
	}]);
})(angular);