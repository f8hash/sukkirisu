<?php

require_once './vendor/autoload.php';
require_once './ConsoleViewer.php';
require_once './SukkirisuCrawler.php';

use Goutte\Client;

$crawler = new Sukkirisu\SukkirisuCrawler(new Client());
$viewer = new Sukkirisu\ConsoleViewer($crawler);
$viewer->show($crawler->get());
