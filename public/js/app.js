var app = angular.module('eventApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('eventController', function($scope, $http) {

    $scope.events = [];
    $scope.loading = false;
    $scope.lastpage=1;
    $scope.currentpage =0;



    $scope.init = function() {
        $scope.lastpage=1;
        $scope.loading = true;
        $http.get('/api/events?page=1').
            success(function(data, status, headers, config) {
                $scope.events = data.data;
                $scope.currentpage = data.current_page;
                $scope.loading = false;

            });
    };

    $scope.loadMore = function() {
        $scope.loading = true;
        $scope.lastpage +=1;


        $http({
            url: '/api/events',
            method: "GET",
            params: {page:  $scope.lastpage}
        }).success(function (data, status, headers, config) {

            $scope.events = $scope.events.concat(data.data);
            $scope.loading = false;

        });
    };



    $scope.init();

});