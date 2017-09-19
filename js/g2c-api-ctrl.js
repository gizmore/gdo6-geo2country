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
		if (position.length > 5) {
			position = JSON.parse(position);
			$scope.tryLocation({lat:position[0], lng:position[1]});
		}
	};
	
	$scope.tryLocation = function(position) {
		console.log('G2CApiCtrl.tryLocation()', position);
		var lat = position.lat;
		var lng = position.lng;
		var url = sprintf('/index.php?mo=Geo2Country&me=Api&lat='+lat+'&lng='+lng);
		GDORequestSrvc.send(url).then($scope.probedLocation);
	};
	
	$scope.probedLocation = function(result) {
		console.log('G2CApiCtrl.probedLocation()', result.data);
		if (result && result.data && result.data.c_iso) {
			alert("Detected: "+result.data.c_iso);
		}
		else {
			alert(JSON.stringify(result.data));
		}
	};
	
});
