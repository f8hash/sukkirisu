<?php

require_once('FortuneTellerInterface.php');

Interface ViewerInterface
{
    public function show(FortuneTellerInterface $fortuneTeller);
}
