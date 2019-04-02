
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
      $scope.ansmap.set(parseInt(current),parseInt($scope.userAnswer[current]));
      console.log(ansmap);
      
      if($scope.currQue.visited>0 && $scope.userAnswer[current]==null && $scope.currQue.review==0)
        {
         document.getElementById($scope.currQue.q_id).style.background="red"; //scope.currQue.status;$scope.userAnswer[$scope.currQue.Qno];
        }
        else if($scope.currQue.visited>0 && $scope.userAnswer[current]!=null && $scope.currQue.review==0)
        {
          document.getElementById(currQue.q_id).style.background="green";
        }
        else if($scope.currQue.visited>0 && $scope.userAnswer[current]!=null && $scope.currQue.review!=0)
        {
          document.getElementById($scope.currQue.q_id).style.background="blue";
        }
    if($scope.i<$scope.que.length-1)
    {
      $scope.i = $scope.i + 1;
      $scope.currQue = $scope.que[i];
    }  
    if($scope.que[i].visited==0)
    {
      $scope.que[i].visited=1;
    }     
    }
    $scope.previous = function(current){
      $scope.ansmap.set(parseInt(current),parseInt($scope.userAnswer[current]));
      console.log($scope.ansmap);
       if($scope.currQue.visited>0 && $scope.userAnswer[current]==null && $scope.currQue.review==0)
          {
           document.getElementById($scope.currQue.q_id).style.background="red";
          }
          else if($scope.currQue.visited>0 && $scope.userAnswer[current]!=null && $scope.currQue.review==0)
          {
            document.getElementById($scope.currQue.q_id).style.background="green";
          }
          else if($scope.currQue.visited>0 && $scope.userAnswer[current]!=null && $scope.currQue.review!=0)
          {
            document.getElementById($scope.currQue.q_id).style.background="blue";
          }
        if($scope.i>0)
        {
          $scope.i = $scope.i - 1;
          $scope.currQue = $scope.que[$scope.i];

      }
      if($scope.que[i].visited==0)
      {
        $scope.que[i].visited=1;
      }    
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
      $scope.i=code-1;
      $scope.currQue=$scope.que[i];
        if($scope.que[i].visited==0)
        {
          $scope.que[i].visited=1;
        }     
    }
        
        
    $scope.clear = function(current)
    {
      $scope.userAnswer[current]=null;
    }

    $scope.submit= function(){
      var no_of_correct=0,no_of_wrong=0;
        for (var i = 0;i < $scope.arr.length;i++) {
            var marked=$scope.ansmap.get(i+1);
            var correct=($scope.arr[i].charCodeAt(0))-64;//converting A,B,C,D to 1,2,3,4;
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