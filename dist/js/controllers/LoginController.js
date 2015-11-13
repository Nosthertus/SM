(function(angular){
	var app = angular.module('SM');

	app.controller('LoginController', ['$scope', 'UserService', function($scope, UserService){
		$scope.username = null;
		$scope.password = null;

		$scope.message = {
			show: false,
			type: 'info',
			text: ''
		};

		$scope.submit = function(){
			
			var login = {
				username: $scope.username,
				password: $scope.password
			};

			if($scope.message.show)
				$scope.hideMessage();

			UserService.login(login, function(success, errors){
				if(!success){
					for(attr in errors){
						for(message in errors[attr])
							$scope.message.text = errors[attr][message];
					}

					$scope.message.type = 'danger';
				}

				else{
					$scope.message.text = 'Login successful';

					$scope.message.type = 'success';
				}

				$scope.message.show = true;
			});
		};

		$scope.hideMessage = function(){
			$scope.message.show = false;
		};
	}]);
})(angular);