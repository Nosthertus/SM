(function(angular){
	var app = angular.module('SM');

	app.controller('ListController', ['$scope', '$location', 'UserService', '$http', function($scope, $location, UserService, $http){
		$scope.selected = null;
		$scope.added = [];

		$scope.add = function(){
			if($scope.selected){
				$http.get('server/web/user/add', {
					params: {
						user_id: UserService.getId(),
						user_id1: $scope.selected
					}
				}).then(function(response){
					if(response.data.success){
						$scope.added.push($scope.selected);
						$scope.selected = null;
					}
					console.log(response);
				});
			}
		};

		$scope.getUser = function(user){
			return $http.get('server/web/user', {
				params: {
					find: user
				}
			}).then(function(response){
				return response.data.map(function(e){
					return e.username;
				});
			});
		};
	}]);
})(angular);