<?php

sendMessage($_POST);
 
function tg($url, $params)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $params); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    $content = curl_exec($ch);
    curl_close($ch);
    return json_decode($content, true);

}

function sendMessage($test) 
{
    $key = 'bot1037893467:AAG4RVfohWQQRy0AwOuv-s4KyDVyZi4bqKs';
    // echo 'l';
    $chat = tg('https://api.telegram.org/' . $key . '/getUpdates', '');
//     var_dump($chat); die;
    if ($chat['ok']) { 
        $text = 'nama depan : ' . $test['depan'] . ' nama belakang : ' . $test['belakang'];
        $text = urlencode($text);
    }

    return tg('https://api.telegram.org/' . $key . '/sendMessage', '?chat_id=-479075393&text=' . $text);
}
