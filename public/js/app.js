(function() {
  "use strict";

  var app = angular.module("myApp", ['ngRoute', 'ngTable']);

  app.config(['$routeProvider',
              function ($routeProvider) {
     $routeProvider.
         when('/', {
             templateUrl: 'lib/partials/details.html',
             controller: 'introController',
             controllerAs: 'vm'
         })
 }]).
 controller("introController", function($scope, $http, $log, NgTableParams) {

	 introController();

    function introController() {
      $log.debug('introController');

      refreshData();
    }

    function refreshData() {
      $http.get('api/v1/search')
        .then(function(response) {
          $log.debug('refreshData');
          $scope.tableData = response.data.data;
          configureTable();
        });

    }

    function configureTable() {
      $log.debug('configureTable', $scope.tableData);
      $scope.tableParams = new NgTableParams({
        page: 1,
        count: 15,
      }, {
    	  dataset: $scope.tableData
      });
    }

  });

  //simple filter to display the record's index
  app.filter('itemIndex', function() {
    return function(input, sourceArray) {
      input = input || {};
      sourceArray = sourceArray || [];
      return sourceArray.indexOf(input);

    };
  })

})();