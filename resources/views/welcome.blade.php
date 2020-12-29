<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7ac00b14ce06bac0f9b5', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('product-1');
    channel.bind('product-event', function(data) {
      alert(JSON.stringify(data.product.name));
      Console.log(data)
    });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
</body>
