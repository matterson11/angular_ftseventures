var app = angular.module('project', ['ngRoute'])

app.config(function($routeProvider) {
 
  $routeProvider
    .when('/', {
      controller:'mainController',
      templateUrl:'views/mainPage.html'
    })
    .when('/dealing', {
      controller:'dealingController',
      templateUrl:'views/dealingPage.html'
    })
    .when('/about', {
      templateUrl:'views/aboutPage.html'
    })
    .otherwise({
      redirectTo:'/'
    });
});
 
app.controller('mainController', 
  function(
  $location, 
  $scope, 
  $http,
  $timeout,
  $window){

$http.get("php/main_page_details.php").then(function(response){
    $scope.top_movers = response.data;
    $scope.ftse100_table = response.data.ftse100table;
    $scope.ftse250_table = response.data.ftse250table;
    $scope.top_ftse100_table = response.data.topftse100;
    $scope.top_ftse250_table = response.data.topftse250;
    $scope.sell_ftse100_table = response.data.sellftse100;
    $scope.sell_ftse250_table = response.data.sellftse250;
  });
});

app.controller('dealingController', 
  function(
  $location, 
  $scope, 
  $http,
  $timeout,
  $window){

$http.get("php/dealing_page_details.php").then(function(response){
  $scope.buy = response.data.buy;
  $scope.sell = response.data.sell;
  });


});