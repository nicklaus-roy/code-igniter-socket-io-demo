var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

io.on('connection', function(socket){
    console.log('a user connected');
    socket.on('order_added', function(order){
        console.log('message: ' + order);
        io.sockets.emit("new_order", order);
    });
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});
