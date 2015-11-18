(function(angular){
	var app = angular.module('SM');

	app.controller('GenderbreadController', ['$scope', '$location', 'UserService', '$resource', function($scope, $location, UserService, $resource){
		$scope.identity = {
			visibility: null,
			value: 0
		};
		$scope.expression = {
			visibility: null,
			value: 0
		};
		$scope.asex = {
			visibility: null,
			value: 0
		};
		$scope.attracted = {
			visibility: null,
			value: 0
		};

		$scope.message = {
			show: false,
			type: 'info',
			text: ''
		};

		$scope.submit = function(){
			var data = {
				userid: UserService.getId(),
				identity: $scope.identity,
				expression: $scope.expression,
				asex: $scope.asex,
				attracted: $scope.attracted
			};

			var gender = $resource('server/web/gender');

			var newGender = new gender();

			for(dat in data)
				newGender[dat] = data[dat];

			newGender.$save(function(data){
				if(data.success){
					$scope.message.text = 'Submit Successful';
					$scope.message.type = 'success';
				}

				else{
					for(attr in data.errors){
						for(message in data.errors[attr])
							$scope.message.text = data.errors[attr][message];
					}

					$scope.message.type = 'danger';
				}

				$scope.message.show = true;
				console.log(data);
			});
		};

		$scope.hideMessage = function(){
			$scope.message.show = false;
		};
	}]);
})(angular);