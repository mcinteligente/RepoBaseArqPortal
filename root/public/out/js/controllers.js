function controllers(){
	var _self = this;
	var $URI = 'http://local.mdeinteligente.co'; // URL del servidor
	this.$PATH = '/out/'; // URL del servidor
	/**
	 * [_init Constructor por defecto]
	 * @return {[type]} [description]
	 */
	this._init = function(){
		console.log('Constructor controllers Class');
	};
	/**
	 * [get Configura los controladores de AngularJS]
	 * @param  {[type]} ctrl [Indetificador del App]
	 * @return {[type]}     [description]
	 */
	this.get = function(ctrl){
		ctrl.config(function($routeProvider, $authProvider) {
			$authProvider.loginUrl = '/api/authenticate';
			$authProvider.signupUrl = '/api/register';
			$routeProvider
			.when('/', {
				templateUrl: function(urlattr){
					var view = '';
						view = 'views/home.html';
					return view;
				},
				controller: 'HomeController'
			})
			.when('/edit/:id', {
				templateUrl: 'views/edit.html',
				controller: 'EditController'
			})
			.when('/create', {
				templateUrl: 'views/create.html',
				controller: 'CreateController'
			})
			.when('/register', {
				templateUrl: 'views/register.html',
				controller: 'RegisterController'
			})
			.when('/login', {
				templateUrl: 'views/login.html',
				controller: 'AuthController'
			})
			.otherwise({
				redirectTo: '/'
			});
		});
		/**
		 * [description]
		 * @param  {[type]} $scope     [description]
		 * @param  {[type]} $route     [description]
		 * @param  {[type]} thematics  [description]
		 * @return {[type]}            [description]
		 */
		ctrl.controller('HomeController', function($scope, $route, thematics) {
			thematics.get(function(data){
				$scope.thematics = data.thematics;
			});
			$scope.remove = function(id){
				thematics.delete({id: id}).$promise.then(function(data){
					if(data.msg){
						$route.reload();
					}
				});
			}
		});
		ctrl.controller('EditController', function($scope, $routeParams, thematics) {
			console.log('EditController');
			var id = $routeParams.id;
			thematics.get({id:id}, function(data){
				$scope.th = data.thematic;
				$scope.name = data.thematic.name;
			});

			$scope.settings = {
				success: ''
			};
			$scope.submit = function(){
				$scope.thematic = {
					thematic: $scope.name
				};
				thematics.update({id: $scope.th.id},$scope.thematic).$promise.then(function(data){
					if(data.msg){
						$scope.settings.success = "Temática actualizada correctamente";
					}
				});
			}
		});
		ctrl.controller('CreateController', function($scope, thematics) {
			console.log('CreateController');
			$scope.settings = {
				success: ''
			};
			$scope.submit = function(){
				$scope.th = {
					thematic: $scope.thematic
				};
				thematics.save($scope.th).$promise.then(function(data){
					if(data.msg){
						angular.copy({}, $scope.th);
						$scope.thematic = '';
						$scope.settings.success = "Temática creada correctamente";
					}
				});
			}
		});
		ctrl.controller('fvappCtrl', function($scope) {
			$scope.user = {
				token: localStorage.getItem('token') ? localStorage.getItem('token') : '',
				current: localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : '',
				session: localStorage.getItem('token') ? true: false,
			};
			$scope.logout = function(){
				localStorage.removeItem('token');
				localStorage.removeItem('user');
				window.location.href = _self.$PATH;
			};

		});

		ctrl.factory('thematics', function($resource){
			return $resource($URI + "/aostest/:id", {id: "@_id"}, {
				update: {method: "PUT", params: {id: "@id"}}
			});
		});

		// Other controllers
		_authenticate.getAuth(ctrl);
	};
}