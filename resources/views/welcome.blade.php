<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="https://rawgit.com/gdi2290/angular-websocket/v1.0.9/angular-websocket.js"></script>
<div ng-app="app">
    <section ng-controller="TestController">
        <form ng-submit="send(message)">
            msg: <input type="text" ng-model="message" value="msg"><br>
            <input type="submit" value="Submit">
        </form>


        <ul>
            <li ng-repeat="data in TestSocket.collection track by $index">
              @{{ data }}
            </li>
        </ul>
    </section>
</div>
<script>
  angular.module('app', [
    'ngWebSocket' // you may also use 'angular-websocket' if you prefer
  ])
  //                          WebSocket works as well
  .factory('TestSocket', function($websocket) {
      //Math.floor((Math.random()*20)+1)
      var account_id = Math.floor((Math.random()*4)+1);
      var ws = $websocket('ws://192.168.10.10:8080?account_id=' + account_id + '&token=' + 'eenMooieEnToffeToken');
      var collection = [];


      ws.onOpen( function (event) {
          // nu niks meer :p
      });

      ws.onMessage( function (message) {
          var newMsg = JSON.parse(message.data);
          console.debug(newMsg);
          collection.push(newMsg.client.event);
      });

      return {
        collection: collection,
        status: function() {
            return ws.readyState;
        },
        send: function(message) {
          if (angular.isString(message)) {
              ws.send(message);
          }
          else if (angular.isObject(message)) {
              ws.send(JSON.stringify(message));
          }
        },
        account_id: function () {
            return account_id;
        }

      };
  })
  .controller('TestController', function ($scope, TestSocket) {
      $scope.TestSocket = TestSocket;

      // $scope.send = function (msg) {
      //     var obj = {
      //       message: msg,
      //       account_id: TestSocket.account_id,
      //     }
      //     TestSocket.send(obj);
      // //    TestSocket.send(msg);
      // //    console
      // }
  });
</script>
