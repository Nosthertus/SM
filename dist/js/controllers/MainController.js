(function(angular){
	var app = angular.module('SM');

	app.controller('MainController', ['$scope', '$location', 'UserService', function($scope, $location, UserService){
		$scope.navbar = {
			links: []
		};

		$scope.$on('UserLogged', function(event){
			var links = [
				{
					route: '/',
					content: 'home',
					active: true
				},
				{
					route: '/line',
					content: 'line',
					active: false
				}
			];

			$scope.navbar.links = links;
		});

		$scope.route = function(route){
			$location.path(route);
		};

		$scope.$on('$locationChangeSuccess', function(obj, url){
			if(UserService.isGuest)
				$location.path('/');

			else{
				for(i in $scope.navbar.links){
					var link = $scope.navbar.links[i];

					if($location.path() == link.route)
						link.active = true;

					else
						link.active = false;
				}
			}
		});
	}]);
})(angular);