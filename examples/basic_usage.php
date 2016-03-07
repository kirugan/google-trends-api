<?php
require_once __DIR__ . '/../vendor/autoload.php';

$hv = new Kirugan\GoogleTrendsAPI\HotVideos();
$hv->setClient(new GuzzleHttp\Client());
$v = $hv->getVideos(new \DateTime('-1 day'), 'RU');
var_dump($v);