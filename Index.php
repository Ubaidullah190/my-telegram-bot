<?php
// Bot Token and Chat ID
$botToken = '7871629986:AAEtg46kmlNVNyfVGKcULkGa_5V_wc8y5To';
$chatId = '-1002579764784';

function generateSignal() {
    $colors = ['RED', 'GREEN', 'VIOLET'];
    $sizes = ['BIG', 'SMALL'];
    $color = $colors[array_rand($colors)];
    $size = $sizes[array_rand($sizes)];
    $issue = rand(100000000000000000, 999999999999999999);
    $accuracy = round(mt_rand(5200, 5999) / 100, 2);
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

if (isset($_POST['send'])) {
    $text = generateSignal();
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $text
    ];

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $msg = json_decode($result, true);

    if ($msg["ok"]) {
        echo "<script>alert('✅ Signal sent successfully!');</script>";
    } else {
        echo "<script>alert('❌ Failed to send signal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>60s Signal Sender</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 60px;
        }
        button {
            padding: 15px 30px;
            font-size: 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        p {
            margin-top: 40px;
            font-size: 16px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>🔮 60s Signal Sender Bot</h1>
    <form method="post">
        <button name="send" type="submit">Send Signal</button>
    </form>
    <p>
        Bot: <a href="https://t.me/hgzy_signal_bangla_bot" target="_blank">@hgzy_signal_bangla_bot</a> |
        Admin: @inbox80 |
        Group ID: -1002579764784
    </p>
</body>
</html>
