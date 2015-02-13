app.config(function($routeProvider) {
    $routeProvider

        // route for the about page
        .when('/detail/:eventID', {
            templateUrl : '/pages/detail.html',
            controller  : 'detailController'
        })

        .when('/', {
            templateUrl : '/pages/list.html',
            controller  : 'eventController'
        })
});

