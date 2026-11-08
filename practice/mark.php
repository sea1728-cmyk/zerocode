<?php

$me = 'そら';

$talks = [
    ['name' => 'はな', 'body' => 'こんばんは'],
    ['name' => 'そら', 'body' => 'こんばんは。いま練習しています'],
    ['name' => 'はな', 'body' => 'わたしもです'],
];

foreach ($talks as $talk) {
    if ($talk['name'] === $me) {
        echo '自分: ' . $talk['body'];
    } else {
        echo $talk['name'] . 'さん: ' . $talk['body'];
    }
    echo "\n";
}
