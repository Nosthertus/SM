(function(angular){
	var app = angular.module('SM');

	app.controller('MainController', ['$scope', '$location', 'UserService', function($scope, $location, UserService){
		$scope.navbar = {
			left: [],
			right: []
		};

		$scope.$on('UserLogged', function(event){
			var links = {
				left: [
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
				],
				right: [
					{
						content: UserService.getName(),
						dropdown: true,
						menu: [
							{
								route: '/profile',
								content: 'profile'
							}
						]
					}
				]
			};

			$scope.navbar.left = links.left;
			$scope.navbar.right = links.right;
		});

		$scope.route = function(route){
			$location.path(route);
		};

		$scope.$on('$locationChangeSuccess', function(obj, url){
			if(UserService.isGuest)
				$location.path('/');

			else{
				for(i in $scope.navbar.left){
					var link = $scope.navbar.left[i];

					if($location.path() == link.route)
						link.active = true;

					else
						link.active = false;
				}
			}
		});
	}]);
})(angular);