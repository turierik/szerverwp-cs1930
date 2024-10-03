<?php
    require_once(__DIR__ . "/../vendor/autoload.php");

    $faker = Faker\Factory::create('hu_HU');
    for ($i = 0; $i < 10; $i++)
        echo $faker -> name() . PHP_EOL;