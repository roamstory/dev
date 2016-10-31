//Define an angular module for our app
var app = angular.module('photoApp', []);

app.controller('photoController', function($scope, $http) {

    getItem(); // Load all available items
    function getItem(){
        $http.post("template/getPhoto.php").success(function(data){
            $scope.items = data;
        });
    };


});
