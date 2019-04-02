
var app = angular.module('Exam', ['ngMaterial', 'ngMessages']);
app.controller('questionCtrl', function($scope, $http){
    $http.get("angt.php")
    .then(function (response) {$scope.que = response.data.records;
      for(var op=0;op<$scope.que.length;op++){
        $scope.que[op].status = 0;
         $scope.que[op].visited = 0;
         
      }
      for(x in $scope.que.q_id)
      {
        $scope.userAnswer[x]=0;
      }
      $scope.currQue = $scope.que[0];
      $scope.que[0].visited = 1;   
    });
    
    
    var ansmap= new Map();
        $scope.next = function(current){
        ansmap.set(current,$scope.que[$scope.i].status);
        
        console.log(ansmap);
        if($scope.currQue.visited>0 && $scope.currQue.status==0)
          {
           document.getElementById($scope.currQue.q_id).style.background="red";
          }
          else if($scope.currQue.visited>0 && $scope.currQue.status!=0)
          {
            document.getElementById($scope.currQue.q_id).style.background="green";
          }
      if($scope.i<$scope.que.length-1)
      {
        $scope.i = $scope.i + 1;
        $scope.currQue = $scope.que[$scope.i];
      }  
      if($scope.que[$scope.i].visited==0)
      {
        $scope.que[$scope.i].visited=1;
      }     
    }
    $scope.previous = function(current){
      ansmap.set(current,$scope.que[$scope.i].status);
      console.log(ansmap);
       if($scope.currQue.visited>0 && $scope.currQue.status==0)
          {
           document.getElementById($scope.currQue.q_id).style.background="red";
          }
          else if($scope.currQue.visited>0 && $scope.currQue.status!=0)
          {
            document.getElementById($scope.currQue.q_id).style.background="green";
          }
    	if($scope.i>0)
    	{
          $scope.i = $scope.i - 1;
          $scope.currQue = $scope.que[$scope.i];
      }
      if($scope.que[$scope.i].visited==0)
      {
        $scope.que[$scope.i].visited=1;
      }    
    }
    $scope.currentq=function(code,current)
    {
          ansmap.set(current,$scope.que[$scope.i].status);
          console.log(ansmap);
          if($scope.currQue.visited>0 && $scope.currQue.status==0)
          {
           document.getElementById(current).style.background="red";
          }
          else if($scope.currQue.visited>0 && $scope.currQue.status!=0)
          {
            document.getElementById(current).style.background="green";
          }
            $scope.i=code-1;
            $scope.currQue=$scope.que[$scope.i];
            if($scope.que[$scope.i].visited==0)
            {
               $scope.que[$scope.i].visited=1;
            }     
        }
        
        
        $scope.clear = function()
        {
        $scope.currQue.status=0;
        ansmap.delete($scope.currQue.q_id);
        console.log(ansmap);
       }

       $scope.submit= function(){
        var formData = { answer: $scope.userAnswer };
                var postData = 'myData='+JSON.stringify(formData);
                $http({
                        method : 'POST',
                        url : 'result.php',
                        data: postData,
                        headers : {'Content-Type': 'application/x-www-form-urlencoded'}  

                }).then(function(res){
                        console.log(res);
                });
        }

              

});