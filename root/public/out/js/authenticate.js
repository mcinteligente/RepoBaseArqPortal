function authenticate(){
	var _self = this;
	/**
	 * [_init description]
	 * @return {[type]} [description]
	 */
	this._init = function(){
		console.log('Constructor authenticate Class');
	};

	this.getAuth = function(ctrl){
		ctrl.controller('AuthController', function($scope, $auth, $location) {
			$scope.settings = {
				success: '',
				error: ''
			};
			_self.login($scope, $auth, $location);
		});

		ctrl.controller('RegisterController', function($scope, $auth, $location) {
			$scope.settings = {
				success: '',
				error: ''
			};
			$scope.register = function(){
				$scope.userinfo = {
					name: $scope.name,
					lastname: $scope.lastname,
					email: $scope.email,
					password: $scope.password,
					password_confirmation: $scope.password_confirmation
				};
				// console.log($scope.userinfo);
				_self.login($scope, $auth, $location);
				$auth.signup($scope.userinfo)
					.then(function(data){
						console.log(data);
						$scope.login();
					})
					.catch(function(error) {
						var log = [];
						$scope.settings.error = [];
						$scope.addItem = function(value){
							$scope.settings.error.push(value[0]);
						}
						angular.forEach(error.data, function(value, key) {
							$scope.addItem(value);
						}, log);
					});
			};
		});
	}

	this.login = function($scope, $auth, $location) {
		$scope.login = function(){
			$scope.credentials =
			 {
				email: $scope.email,
				password: $scope.password,
			};
			$scope.user = {
				token: null,
			};
			$auth.login($scope.credentials).then(function(data){
				// console.log(data);
				if(data.data.msg){
					$scope.user.token = data.data.token.token;
					$scope.user.current = data.data.user;
					localStorage.setItem("user", JSON.stringify($scope.user.current));
					localStorage.setItem("token", $scope.user.token);
					// $location.path( "/" );
					window.location.href = _controllers.$PATH;
					$scope.settings.success = "Identificado correctamente";
				}
			}, function(error) {
				$scope.settings.error = "Verifica el usuario y la contraseña";
			});
		}
	}
}