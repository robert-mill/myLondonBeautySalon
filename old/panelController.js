$(function(){
	var app = 	angular.module('ImgApp',[]);
	var id="";
	var name="";
	var cats="";
	alert(98);
	app.service("ImgService", function( $http, $q){
		var deferred = $q.defer();
		//$http.get('JSONFiles/services.json').then(function(data){
		//	deferred.resolve(data);
		//});
		this.getImgData = function(){
			return deferred = "fgfg";
		}
	
	}).controller("ImgCtrl", function($scope,ImgService){	
		alert(7888);
		var promise = ImgService.getImgData();
       
		$scope.id = "rtrtrtrtrtrtt";
		$scope.name= "[{\"category\":\"Facials\"},{\"category\":\"Beauty\"}]";]]
		
	});
           
})();