(function(angular){
	var app = angular.module('SM');

	app.service('UserService', ['$resource', function($resource){
		var self = this;

		self._data = {
			id: null,
			username: null,
			email: null
		};

		self.isGuest = function(){
			if(self._data.id)
				return false;

			return true;
		};

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
					self.populate(data.data);
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

		self.populate = function(data){
			self._data = data;
		};
	}]);
})(angular);