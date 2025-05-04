<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Signal Bot</title>
</head>
<body>
    <h2>Telegram Signal Bot</h2>
    <p>এটি একটি সিগনাল বট। সিগনাল পাঠানোর জন্য নিচে বটের টোকেন এবং গ্রুপ চ্যাট আইডি দিন।</p>

    <form method="post" action="">
        <label for="chat_id">Chat ID:</label><br>
        <input type="text" id="chat_id" name="chat_id" required><br><br>

        <label for="bot_token">Bot Token:</label><br>
        <input type="text" id="bot_token" name="bot_token" required><br><br>

        <input type="submit" value="Send Signal">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get data from the form
        $chat_id = $_POST['chat_id'];
        $bot_token = $_POST['bot_token'];

        // Function to generate signal
        function generate_signal() {
            $colors = ['RED', 'GREEN', 'VIOLET'];
            $sizes = ['BIG', 'SMALL'];
            $color = $colors[array_rand($colors)];
            $size = $sizes[array_rand($sizes)];
            $issue = rand(100000000000000000, 999999999999999999);
            $accuracy = round(rand(5200, 5999) / 100, 2);
            $updated_time = date("Y-m-d H:i:s");

            $message = "
━━━━━━━━━━━━━━━━━━━━━━
⚡ 𝟲𝟬 𝗦𝗘𝗖 𝗕𝗗𝗧 𝗣𝗥𝗘𝗗𝗜𝗖𝗧𝗜𝗢𝗡 ⚡
━━━━━━━━━━━━━━━━━━━━━━

🏁 𝗦𝘁𝗮𝘁𝘂𝘀      : ✅ success  
🕘 𝗜𝘀𝘀𝘂𝗲       : $issue  
📊 𝗣𝗿𝗲𝗱𝗶𝗰𝘁𝗶𝗼𝗻 : $size  
⚠️ 𝗠𝗲𝘀𝘀𝗮𝗴𝗲    : ⚠️ এটি Follow না করাই ভালো ⚠️  

🔮 𝗔𝗰𝗰𝘂𝗿𝗮𝗰𝘆   : $accuracy%  
🕓 𝗨𝗽𝗱𝗮𝘁𝗲𝗱    : $updated_time

━━━━━━━━━━━━━━━━━━━━━━
💎 𝗕𝘂𝘆 𝗣𝗿𝗲𝗺𝗶𝘂𝗺 𝗕𝗼𝘁: @inbox80
━━━━━━━━━━━━━━━━━━━━━━

⚠️ 𝗡𝗼𝘁𝗲: এটা একটি ঝুঁকিপূর্ণ খেলা।  
দয়া করে দায়িত্ব নিয়ে খেলুন।
            ";
            return $message;
        }

        // Send message to Telegram
        function send_message($chat_id, $message, $bot_token) {
            $api_url = "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chat_id&text=" . urlencode($message);
            file_get_contents($api_url);
        }

        // Generate and send the signal
        $signal = generate_signal();
        send_message($chat_id, $signal, $bot_token);

        // Show message
        echo "<p>সিগনাল পাঠানো হয়েছে!</p>";
    }
    ?>
</body>
</html>
