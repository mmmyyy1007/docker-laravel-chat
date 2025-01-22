<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <title>Chat</title>
</head>

<body>
    <div id="app">
        <h1>Real-Time Chat</h1>
        <div id="messages" style="border: 1px solid #ddd; padding: 10px; max-height: 300px; overflow-y: auto;"></div>
        <form id="chat-form">
            <input type="text" id="username" placeholder="Enter your name" required>
            <input type="text" id="message" placeholder="Enter your message" required>
            <button type="submit">Send</button>
        </form>
    </div>
    <script>
        document.getElementById('chat-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const message = document.getElementById('message').value;

            await fetch('/send-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    username,
                    message
                })
            });

            document.getElementById('message').value = '';
        });
    </script>
</body>

</html>
