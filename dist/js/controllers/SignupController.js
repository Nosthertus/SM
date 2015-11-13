(function(angular){
	var app = angular.module('SM');

	app.controller('SignupController', ['$scope', 'UserService', function($scope, UserService){
		$scope.username = null;
		$scope.lastname = null;
		$scope.email = null;
		$scope.password = null;
		$scope.passwordRepeat = null;
		$scope.dateBirth = new Date();

		$scope.message = {
			show: false,
			type: 'info',
			text: ''
		};

		$scope.date = {
			open: false
		};

		$scope.submit = function(){
			var signup = {
				username: $scope.username,
				lastname: $scope.lastname,
				email: $scope.email,
				password: $scope.password,
				dateBirth: getDate($scope.dateBirth)
			};	

			UserService.register(signup, function(success, errors){
				if(!success){
					for(attr in errors){
						for(message in errors[attr])
							$scope.message.text = errors[attr][message];
					}

					$scope.message.type = 'danger';
				}

				else{
					$scope.message.text = 'Signup successful';

					$scope.message.type = 'success';
				}

				$scope.message.show = true;
			});
		};

		$scope.hideMessage = function(){
			$scope.message.show = false;
		};

		function getDate(data){
			return data.getFullYear() + '-' + (data.getMonth() + 1) + '-' + data.getDate();
		}
	}]);
})(angular);