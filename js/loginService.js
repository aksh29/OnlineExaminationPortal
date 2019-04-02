'use strict';

app.factory('loginService',function($http,$location,sessionService){
    return{
        login:function(user,scope){
           var $promise=$http.post('validation.php',user);
           $promise.then(function(msg){
               var uid=msg.data;
               if(uid)
               {
                   sessionService.set('user',uid);
                   $location.path('/exam');
               }
               else{
                   $location.path('/login');
               }

           });
        },
        logout:function(){
            sessionService.destroy('user');
            $location.path('/login');
        }
    }
});