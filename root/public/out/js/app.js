function app(){
	var _self = this;
	/**
	 * [index description]
	 * @return {[type]} [description]
	 */
	this.index = function(){
		var MyApp = angular.module('fvapp', ['ngRoute', 'ngResource', 'satellizer']);
		_controllers.get(MyApp);
	};
	/**
	 * [show description]
	 * @param  {[type]} id [description]
	 * @return {[type]}    [description]
	 */
	this.show = function(id){
		return id;
	};
	/**
	 * [store description]
	 * @return {[type]} [description]
	 */
	this.store = function(){
		return true;	
	};
	/**
	 * [update description]
	 * @param  {[type]} id [description]
	 * @return {[type]}    [description]
	 */
	this.update = function(id){
		return id;
	};
	/**
	 * [destroy description]
	 * @param  {[type]} id [description]
	 * @return {[type]}    [description]
	 */
	this.destroy = function(id){
		return id;
	};
}

var _authenticate = new authenticate(); _authenticate._init();
var _controllers = new controllers(); _controllers._init();
var main = new app(); main.index();