<?php

date_default_timezone_set('Asia/Tokyo');

$hour = (int) date('G');

if ($hour < 12) {
    $greeting = 'おはようございます';
} elseif ($hour < 18) {
    $greeting = 'こんにちは';
} else {
    $greeting = 'こんばんは';
}

echo $greeting . '。いまは' . $hour . '時です';
echo "\n";

$messages = [
    ['name' => 'はな', 'text' => 'そうですね'],
    ['name' => 'そら', 'text' => 'ですね、ではおやすみなさい'],
];

foreach ($messages as $message) {
    echo $message['name'] . ': ' . $message['text'];
    echo "\n";
}

echo '全部で' . count($messages) . '件のメッセージがあります';
echo "\n";
