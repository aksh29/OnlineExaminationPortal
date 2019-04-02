<!DOCTYPE html>
<html>
 <head>
 	<title>Angular Testing</title>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Angular Material style sheet -->
  <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.css"> -->
  <script src="node_modules/angular/angular.js"></script>
  <script src="node_modules/angular-animate/angular-animate.js"></script>
<script src="node_modules/angular-aria/angular-aria.js"></script>
<script src="node_modules/angular-messages/angular-messages.js"></script>
<script src="node_modules/angular-material/angular-material.js"></script>
<link rel="stylesheet" href="node_modules/angular-material/angular-material.css" />
<script src="js/timer.js"></script>
   <style>
   
   </style>
 </head>
 <body onload="f1()" ng-app="Exam" >
 <div ng-controller="questionCtrl" ng-init="i=0" layout-padding ng-cloak>
  <md-toolbar>
      <div class="md-toolbar-tools"><img src="images/logo1.png" height="60px" width="60px" style="float:left;">&nbsp;&nbsp;<h1 style="font-size: 35px;">St Thomas' College of Engineering Technology</h1></div>
  </md-toolbar><br/>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">Question:{{i+1}}</div>
      <div class="col-md-4">
        <span id="showtime">TIMER</span>
      </div>
    </div>
  </div>
  <div class="grid-container">
  <div  class="grid-item1" md-whiteframe="3">
  <form> 
    <p>{{i+1}}:{{ currQue.question }}</p>
    
       <md-radio-group ng-model="userAnswer[currQue.q_id]">

          <md-radio-button value="{{ 1 }}">{{ currQue.opt1 }}</md-radio-button>
          <md-radio-button value="{{ 2 }}">{{ currQue.opt2 }}</md-radio-button>
          <md-radio-button value="{{ 3 }}">{{ currQue.opt3 }}</md-radio-button>
          <md-radio-button value="{{ 4 }}">{{ currQue.opt4 }}</md-radio-button>

        </md-radio-group>
    <md-button class="md-raised md-primary" ng-click="previous(currQue.q_id)">Previous</md-button>
    <md-button class="md-raised md-primary" ng-click="next(currQue.q_id)">Next</md-button>
    <md-button class="md-raised md-primary" ng-click="clear()">Clear</md-button>
    
     <p>{{userAnswer[currQue.q_id]}}</p>
     <p>{{currQue.visited}}</p>

     <md-button class="md-raised md-warn" ng-click="submit()">Finish</md-button>
     </form>
     </div>
     <div  class="grid-item3" md-whiteframe="3"><center>Instructions</center><br>&nbsp;
     <md-button  class="md-fab md-mini" style="background-color:gray;"> </md-button>
     <md-button  class="md-fab md-mini" style="background-color:red;"> </md-button>
     <md-button  class="md-fab md-mini" style="background-color:green;"> </md-button>
     </div>
     
                <div  class=" grid-item2" md-whiteframe="3">
                <center><h4>Question Palette</h4></center>
                <ul>
                   &nbsp;
                   <md-button  class="md-fab md-mini" style="background-color:gray;" ng-repeat="x in que" id="{{x.q_id}}" ng-click="currentq(x.q_id,currQue.q_id)">
                   <span>{{$index+1}}</span>
                   </md-button>
                </ul>
                </div>
      </div>
  </div>

<script src="js/test.js"></script>
 </body>
</html>