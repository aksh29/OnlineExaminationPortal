<!-----<!DOCTYPE html>
<html>
 <head>
    <title>Angular Testing</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">-->
        <!-- Bootstrap-->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--->
    <!-- Include all compiled plugins (below), or include individual files as needed --->
    <!---- <script src="js/bootstrap.min.js"></script>
   


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script language ="javascript" src="js/timer.js"></script>
 </head>
 <body class="body" onload="f1()">
  <?php
 # session_start();
 # $arr=$_SESSION['array'];
  ?>
<div class="header"><h1 style="color:black;">Online examination!!!!</h1></div><br><br>
<div class="container">
    <div  ng-app="myApp" ng-controller="questionCtrl" ng-init="i=0">
  <div>Question:{{currQue.Qno}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="showtime">TIMER</div></div>
  <div class="grid-container">
  <div  class="grid-item1">
    {{ currQue.Question }}<br><br>
    <label class="container"><input type="radio" id="opt1" ng-value=" currQue.OptionA " ng-model = "currQue.status" name="{{ currQue.question }}">{{ currQue.OptionA }}<span class="checkmark"></span></label><br>
    <label class="container"><input type="radio" id="opt2" ng-value=" currQue.OptionB " ng-model = "currQue.status" name="{{ currQue.question }}">{{ currQue.OptionB }}<span class="checkmark"></span></label><br>
    <label class="container"><input type="radio" id="opt3" ng-value=" currQue.OptionC " ng-model = "currQue.status" name="{{ currQue.question }}">{{ currQue.OptionC }}<span class="checkmark"></span></label><br>
    <label class="container"><input type="radio" id="opt4" ng-value="currQue.OptionD " ng-model = "currQue.status" name="{{ currQue.question }}">{{ currQue.OptionD }}<span class="checkmark"></span></label><br>
  
     <button ng-click="previous(currQue.Qno)">Previous</button>
     <button ng-click="next(currQue.Qno)">Next</button>
     <button ng-click="clear(currQue.Question)">clear</button>
     <p>{{currQue.status}}</p>
     <p>{{currQue.visited}}</p>
     </div>

     <div  class="grid-item3"><center>Instructions</center><br>

     </div>
     
                <div  class="grid-item2">
                <center><h4>Question Palette</h4></center>
                <ul>
                   &nbsp; <li id="{{ x.Qno }}"  ng-repeat="x in que" class="dot" ng-click="currentq(x.Qno,currQue.Qno)">{{x.Qno}}</li>&nbsp;
                </ul>
                </div>
      </div>
</div>
  </div>

  <div id="demo">
    
  </div>

<script>
var app = angular.module('myApp', []);
app.controller('questionCtrl', function($scope, $http){
    $http.get("ang2.php")
    .then(function (response) {$scope.que = response.data.records;
      for(var op=0;op<$scope.que.length;op++){
        $scope.que[op].status = 0;
         $scope.que[op].visited = 0;
       // console.log($scope.que[op]);
        
      }
      $scope.currQue = $scope.que[0];
      $scope.que[0].visited = 1;

      
      
      
          $scope.next = function(){

        if($scope.currQue.visited>0 && $scope.currQue.status==0)
          {
           document.getElementById($scope.currQue.Qno).style.background="red";
          }
          else if($scope.currQue.visited>0 && $scope.currQue.status!=0)
          {
            document.getElementById($scope.currQue.Qno).style.background="green";
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
       var marked=$scope.currQue.question.value;
      document.getElementById("demo").innerHTML=marked;
        
    }
    $scope.previous = function(){
       if($scope.currQue.visited>0 && $scope.currQue.status==0)
          {
           document.getElementById($scope.currQue.Qno).style.background="red";
          }
          else if($scope.currQue.visited>0 && $scope.currQue.status!=0)
          {
            document.getElementById($scope.currQue.Qno).style.background="green";
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
    $scope.currentq=function(code,current){
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
        
     /*  $scope.clear = function(current){
        
        var e = document.getElementById("opt1");
        for(int i=0;i<e.length;i++)
        {
          e[i].checked=false;
        }
       }*/
        
});

});
</script>
 </body>
</html>-->




<!DOCTYPE html>
<html>
 <head>
  <title>Angular Testing</title>
  <link rel="stylesheet" href="css/style.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.9/angular-material.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body onload="f1()" ng-app="Exam" >
  <!-- Angular Material Dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular-messages.min.js"></script>
    
    <!-- Angular Material Javascript now available via Google CDN; version 1.1.9 used here -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.9/angular-material.min.js"></script>



 <div ng-controller="questionCtrl" ng-init="i=0" layout-padding ng-cloak>
  <div class="navbar">  
    <md-toolbar>
      <div class="md-toolbar-tools media"><img class="media-object" src="images/logo.jpg">
        <p class="navbar-text">St Thomas' College of Engineering Technology</p>
      </div>
  </md-toolbar>
</div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">Question:{{i+1}}</div>
      <div class="col-md-4">
        <span id="showtime">TIMER</span>
      </div>
    </div>
  </div>
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-8 grid-container">
  <div  class="grid-item1" md-whiteframe="3">
  <form> 
    <p>{{i+1}}:{{ currQue.Question }}</p>
    
       <md-radio-group ng-model="userAnswer[currQue.Qno]">

          <md-radio-button value="{{ 1 }}">{{ currQue.OptionA }}</md-radio-button>
          <md-radio-button value="{{ 2 }}">{{ currQue.OptionB }}</md-radio-button>
          <md-radio-button value="{{ 3 }}">{{ currQue.OptionC }}</md-radio-button>
          <md-radio-button value="{{ 4 }}">{{ currQue.OptionD }}</md-radio-button>

        </md-radio-group>
    <md-button class="md-raised md-primary" ng-click="previous(currQue.Qno)">Previous</md-button>
    <md-button class="md-raised md-primary" ng-click="next(currQue.Qno)">Next</md-button>
    <md-button class="md-raised md-primary" ng-click="clear()">Clear</md-button>
    
     <p>{{userAnswer[currQue.Qno]}}</p>
     <p>{{currQue.visited}}</p>

     <md-button class="md-raised md-warn" ng-click="submit()">Finish</md-button>
  </form>
     </div>
     <div  class="grid-item3" md-whiteframe="3"><center>Instructions</center><br>

     </div>
   </div>
     
      <div  class=" col-md-4 grid-item2" md-whiteframe="3">
                <center><h4>Question Palette</h4></center>
                <ul>
                   &nbsp;
                   <md-button  class="md-fab md-mini" style="background-color:gray;" ng-repeat="x in que" id="{{x.Qno}}" ng-click="currentq(x.Qno,currQue.Qno)">
                   <span>{{$index+1}}</span>
                   </md-button>
                </ul>
        </div>
      </div>
    </div>
</div>


<script src="examctrl.js"></script>
 </body>
</html>