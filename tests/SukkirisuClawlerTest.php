<?php

use PHPUnit\Framework\TestCase;
use Goutte\Client;

require_once(dirname(__FILE__).'/../SukkirisuClawler.php');

class SukkirisuClawlerTest extends TestCase
{
    public function testGet() :void
    {
        $sukkirisuPaser = new Sukkirisu\SukkirisuClawler();
        $client = new Client();
        $this->assertIsArray($sukkirisuPaser->get($client));
    }
}