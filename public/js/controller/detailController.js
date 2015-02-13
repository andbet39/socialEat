/**
 * Created by andrea.terzani on 13/02/2015.
 */

app.controller('detailController', function($scope, $http, $routeParams) {

    $scope.events = [];
    $scope.loading = false;



    $scope.init = function() {
        $scope.loading = true;
        $scope.eventid=$routeParams.eventID;
        $http({
            url: '/api/event/detail',
            method: "GET",
            params: {id:  $routeParams.eventID}
        }).success(function (data, status, headers, config) {

            $scope.data = data;
            $scope.loading = false;

        });
    };




    $scope.init();

});