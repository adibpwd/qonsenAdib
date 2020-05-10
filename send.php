<?php

sendMessage($_POST);
 
function tg($url, $params)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url . $params);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 3);
    $content = curl_exec($curl);
    curl_close($curl);
    return json_decode($content, true);
}

function sendMessage($test) 
{ 
 $key = 'bot1007203428:AAGcf2X38w1nOuYDMa6U01JACr6C1ETFxaE';
    $chat = tg('https://api.telegram.org/' . $key . '/getUpdates', '');

    if ($chat['ok']) { 
        $text = 'nama depan : ' . $test['depan'] . ' nama belakang : ' . $test['belakang'];
        $text = urlencode($text);
    }

    return tg('https://api.telegram.org/' . $key . '/sendMessage', '?chat_id=-1001417167352&text=' . $text);
}
