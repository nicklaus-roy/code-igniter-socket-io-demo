<html>
    <body>
        <h5>Orders</h5>
        <button id="add_order_btn">Add Order</button>
        <ul id='orders_list'>
            <?php foreach ($orders as $order):?>
                <li><?= $order['id'] ?>: <?= $order['date_ordered'] ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="/socket.io/socket.io.js"></script>
    <script>
        $(function() {
            var ip = 'localhost:3000';
            var socket = io(ip);
            $('#add_order_btn').click(function() {
                axios.post('/orders/store')
                    .then(({data})=> {
                        data = data.split('}')[0]+'}';
                        data = JSON.parse(data);
                        console.log(data);
                        socket.emit('order_added',  data);
                    }).catch((e) => {
                        console.log(e);
                    });                
            });
            socket.on('new_order', function(order) {
                console.log(order);
                $('#orders_list').append('<li>'+order.id+':'+order.date_ordered+'</li>');
            });
        });
    </script>
    
</html>
