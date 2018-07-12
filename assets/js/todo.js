angular.module('todoApp', [])
  .controller('TodoListController', function() {
    var todoList = this;
    todoList.todos = [];
 
    todoList.addTodo = function() {
      todoList.todos.push({no:todoList.todoNo, nama:todoList.todoNama});
      todoList.todoText = '';
    };

    todoList.random = function() {
      return 0.5 - Math.random();
    }
    
    todoList.shuffleArray = function() {
      //for(var i = 0; i < todoList.todos.length; i++)
        //  $( "#test"+todoList.todos[i].no ).slideUp( 300 ).delay( 800 );//.fadeIn( 400 );
      var m = todoList.todos.length, t, i;

      // While there remain elements to shuffle
      while (m) {
        // Pick a remaining element…
        i = Math.floor(Math.random() * m--);

        // And swap it with the current element.
        t = todoList.todos[m];
        todoList.todos[m] = todoList.todos[i];
        todoList.todos[i] = t;
      }

      console.log(todoList.todos);
    }

    todoList.shuffleanim = function(){
      //for(var i = 5; 0 <-- i;){
      
      
      for(var i = 0; i < todoList.todos.length; i++)
          $( "#test"+todoList.todos[i].no ).slideUp( 30, function(){
            todoList.shuffleArray();
          } ).fadeIn( 500 );
                 //todoList.shuffleA5ray();
      //}

    }
    });