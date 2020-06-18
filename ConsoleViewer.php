<?php

require_once('ViewerInterface.php');

class ConsoleViewer implements ViewerInterface
{
    public function show(FortuneTellerInterface $teller): void
    {
        foreach ($teller->tell() as $arr) {
            echo $arr;
        }
    }
}
