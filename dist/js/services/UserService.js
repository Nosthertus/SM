(function(angular){
	var app = angular.module('SM');

	app.service('UserService', ['$resource', '$rootScope', function($resource, $rootScope){
		var self = this;

		self._data = {
			id: null,
			username: null,
			email: null,
			authkey: null
		};

		self.isGuest = true;
		
		self._populate = function(data){
			self._data = data;
		};

		self.getName = function(){
			return self._data.username;
		}

		self.login = function(credentials, callback){
			var handler = $resource('server/web/user/access', null, {
				access: {
					method: 'POST'
				}
			});

			handler.access(credentials).$promise.then(function(data){
				if(callback)
					callback(data.success, data.errors);

				if(data.success)
				{
					self.isGuest = false;
					self._populate(data.data);
					$rootScope.$broadcast('UserLogged');
				}
			});
		};

		self.register = function(credentials, callback){
			var user = $resource('server/web/user');

			var newUser = new user();

			for(data in credentials)
				newUser[data] = credentials[data];

			newUser.$save(function(data){
				if(callback)
					callback(data.success, data.errors);
			});
		};
	}]);
})(angular);