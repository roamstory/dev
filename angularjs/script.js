// Code goes here
(function(){
  var app = angular.module('todo',[]);

  app.controller('TodoCtrl',['$scope',function($scope) {
    $scope.todos = [
      {
        id : 1,
        title: '요가수련',
        completed: false,
        createdAt: Date.now()
      },
      {
        id : 2,
        title: '앵귤러학습',
        completed: false,
        createdAt: Date.now()
      },
      {
        id : 3,
        title: '운동하기',
        completed: true,
        createdAt: Date.now()
      }
    ];

    $scope.remove = function(todo) {
      // find todo index in todos
      var idx = $scope.todos.findIndex(function(item){

        return item.id === todo.id;
      })
      // remove from todos
      if( idx > -1) {
        $scope.todos.splice(idx,1)
      }
    };

    $scope.add = function(newTodoTitle) {
      // create new todo
      var newTodo = {
        title: newTodoTitle,
        completed: false,
        createdAt: Date.now()
      }

      // push into todos
      $scope.todos.push(newTodo)

      // empty form
      $scope.newTodoTitle = "";
    }
  }]);
})();
