<?php

$talks = [
    ['name' => 'はな', 'body' => 'こんばんは'],
    ['name' => 'そら', 'body' => 'こんばんは。いま練習しています'],
    ['name' => 'はな', 'body' => 'わたしもです'],
    ['name' => 'そら', 'body' => 'いっしょにがんばりましょう'],
];

foreach ($talks as $talk) {
    echo $talk['name'] . ': ' . $talk['body'];
    echo "\n";
}
