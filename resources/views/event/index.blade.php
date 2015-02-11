@extends('app')

@section('content')
    <div class="container" ng-app="eventApp" ng-controller="eventController">
        <div class="row">
            <div class="col-md-4" ng-repeat="event in events" ng-animate="'animate'">
                <div class="panel panel-default">
                    <div class="panel-heading"><% event.title %></div>
                    <div class="panel-body">
                        <div class="thumbnail">
                            <img src="/picture/get/<% event.picture_id %>" alt="ALT NAME" class="img-responsive" />
                            <div class="caption">
                                <p><% event.description %></p>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-success" ng-click="loadMore()">Load More <i class="fa fa-spinner fa-spin" ng-show="loading"></i></button>
        </div>

    </div>
@endsection