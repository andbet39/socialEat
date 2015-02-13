@extends('app')

@section('content')
    <div class="container" ng-app="itemApp" ng-controller="itemsController">
        <div class="row">
           <ul>
                <li ng-repeat="item in items"> <% item.title %></li>
           </ul>
            <button class="btn btn-success" ng-click="loadMore()">Load More</button>
        </div>
    </div>


    <script>
        var itemApp = angular.module('itemApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });

        itemApp.controller('itemsController', function($scope, $http) {

            $scope.items = [];
            $scope.loading = false;
            $scope.lastpage=1;

            $scope.init = function() {
                $scope.lastpage=1;
                $scope.loading = true;
                $http({
                    url: '/api/items',
                    method: "GET",
                    params: {page:  $scope.lastpage}
                }).success(function(data, status, headers, config) {
                    $scope.items = data.data;
                    $scope.currentpage = data.current_page;
                    $scope.loading = false;

                });
            };

            $scope.loadMore = function() {
                $scope.loading = true;
                $scope.lastpage +=1;
                $http({
                    url: '/api/items',
                    method: "GET",
                    params: {page:  $scope.lastpage}
                }).success(function (data, status, headers, config) {

                    $scope.items = $scope.items.concat(data.data);
                    $scope.loading = false;

                });
            };



            $scope.init();

        });


    </script>
@endsection
