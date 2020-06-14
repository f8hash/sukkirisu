<?php

require_once('ViewerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    public function show(Array $array): void
    {
        foreach ($array as $arr) {
            echo $arr;
        }
    }
}
