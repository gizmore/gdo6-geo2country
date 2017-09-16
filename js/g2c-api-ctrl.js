'use strict';
angular.module('gdo6').
controller('G2CApiCtrl', function($scope, GDOPositionSrvc, GDORequestSrvc) {

	$scope.data = {
		position: GDOPositionSrvc.CURRENT,
		fix: false,
		fixLat: null,
		fixLng: null,
	};
	$scope.tryUserLocation = function() {
		console.log('G2CApiCtrl.tryUserLocation()');
		GDOPositionSrvc.withPosition().then(function(position){
			console.log(position);
			$scope.tryLocation(position);
		});

	};
	$scope.tryPickedLocation = function() {
		console.log('G2CApiCtrl.tryPickedLocation()');
		var position = $('#gdo_pos_pick_position').val();
		position = JSON.parse(position);
		
		$scope.tryLocation({lat:position[0], lng:position[1]});
	};
	
	$scope.tryLocation = function(position) {
		console.log('G2CApiCtrl.tryLocation()', position);
		var lat = position.lat;
		var lng = position.lng;
		var url = sprintf('/index.php?mo=Geo2Country&me=Api&lat='+lat+'&lng='+lng);
		GDORequestSrvc.send(url).then($scope.probedLocation);
	};
	
	$scope.probedLocation = function(result) {
		console.log('G2CApiCtrl.probedLocation()', result);
		alert(JSON.stringify(result.data));
	};
	
	//////////
	// Pick //
	//////////
	$scope.pickedLocation = function() {
		console.log('G2CApiCtrl.pickedLocation()');
		var url = '/index.php?mo=Geo2Country&me=Api&lat='+latlng.lat()+'&lng='+latlng.lng();
		GDORequestSrvc.send(url).then($scope.countryDetected);
	};
	
	$scope.countryDetected = function(result) {
		console.log('G2CApiCtrl.countryDetected()', result);
	};
	
	$scope.locationNotPicked = function(error) {
		console.log('G2CApiCtrl.locationNotPicked()', error);
	};
	
	$scope.onProbe = function() {
		console.log('G2CApiCtrl.onDetect()');
		GDOPositionSrvc.probe().then($scope.detected(), $scope.probeFailed);
	};
	
	$scope.detected = function(position) {
		console.log('G2CApiCtrl.detected()', position);
		setTimeout($scope.$apply.bind($scope), 1);
	};
			
	$scope.probeFailed = function(error) {
		console.log('G2CApiCtrl.probeFailed()', error);
		GDOErrorSrvc.showError(error.message, "Position Error");
	};

});
