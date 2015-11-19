(function(angular){
	var app = angular.module('SM');
	app.controller('ProfileController', ['$scope', '$location', 'UserService', '$http', function($scope, $location, UserService, $http){
		$scope.name=UserService.getName();
		$scope.success = function(file, message, flow){
			console.log(JSON.parse(message));
		};

		$scope.friends = [];

		$scope.getFriends = function(){
			$http.get('server/web/friends/find', {
				params: {
					id: UserService.getId()
				}
			}).then(function(response){
				$scope.friends = response.data;
			});
		};
	}]);
})(angular);