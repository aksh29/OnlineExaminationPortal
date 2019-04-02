
app.controller('examCtrl', function($scope,$http,examService){
    $http.get("angt.php")
    .then(function (response){
      $scope.que = response.data.records;

      for(var op=0;op<$scope.que.length;op++){
         $scope.que[op].visited = 0;
         $scope.que[op].review=0;
      }

      $scope.currQue = $scope.que[0];
      $scope.que[0].visited = 1; 

      $scope.arr = [];
      for (var i = 0; i < $scope.que.length ; i++) {
        $scope.arr.push($scope.que[i].answer);
        console.log("arr["+i+"]="+$scope.arr[i]);
      }

       $scope.ansmap = new Map();
       for (var i = 0; i < $scope.que.length ; i++){
        $scope.ansmap.set((i+1),undefined);
      }
      
    });
    

     
    
    $scope.next = function(current){
        examService.next(current,$scope);
    }
    $scope.previous = function(current){
        examService.previous(current);
    }
    $scope.review=function(current)
    {

      document.getElementById(current).style.background="blue";
      $scope.currQue.review=1;
    }
    $scope.un_mark=function(current)
    {
      $scope.currQue.review=0;
      if($scope.currQue.visited>0 && $scope.userAnswer[current]==null && $scope.currQue.review==0)
      {
       document.getElementById($scope.currQue.q_id).style.background="red";
      }
      else if($scope.currQue.visited>0 && $scope.userAnswer[current]!=null && $scope.currQue.review==0)
      {
          document.getElementById($scope.currQue.q_id).style.background="green";
      }

    }
    $scope.currentq=function(code,current)
    {
      examService.currentq(code,current);
    }
        
        
    $scope.clear = function(current)
    {
      examService.clear(current);
    }

    $scope.submit= function(){
        var no_of_correct=0,no_of_wrong=0;
        for (var i = 0;i < $scope.arr.length;i++) {
            var marked=$scope.ansmap.get(i+1);
            var correct=($scope.arr[i]);//converting A,B,C,D to 1,2,3,4;
            //console.log(correct-64);
            
            if(marked==undefined || marked==NaN || marked==null){
              marked=0;
            }
            if(correct==marked){
              no_of_correct++;
            }
            else{
              no_of_wrong++;
            }

           }
           
        //console.log("correct="+no_of_correct);
          //  console.log("wrong="+no_of_wrong);
          //document.open();
        document.write("<h3>Number of Correct</h3>="+no_of_correct+"<br>");
        document.write("<h3>Number of Correct</h3> ="+no_of_wrong);
        //document.close();
    }
         
});