<?php

require_once './vendor/autoload.php';
require_once './ConsoleViewer.php';

use Goutte\Client;

$url = 'http://www.ntv.co.jp/sukkiri/sukkirisu/index.html';

$client = new Client();

if (empty($argv[1])) {
    echo '誕生月を入力してください';
    exit;
}
$month = $argv[1];

$crawler = $client->request('GET', $url);

$viewer = new Sukkirisu\ConsoleViewer;
$viewer->show($crawler->filter('#month'.$month)->text());
