<?php
    require_once(__DIR__ . '/../vendor/autoload.php');

    use Cowsayphp\Farm;
    $cow = Farm::create(\Cowsayphp\Farm\Whale::class);
    echo $cow -> say("Omg I'm cow moo!");