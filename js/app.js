
var app = angular.module('YO', ['ngRoute','ngMaterial','ngMessages']);
app.config(['$routeProvider',function($routeProvider){
$routeProvider.when('/login',{templateUrl:'js/login.html',controller:'loginCtrl'});
$routeProvider.when('/exam',{templateUrl:'exam.html',controller:'examCtrl'});
$routeProvider.otherwise({redirectTo:'/login'});
}]);