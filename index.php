<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

$client = new Client();

$res = $client->get('https://feeds.feedburner.com/bashinform/all');
$body = $res->getBody()->getContents();


$crawler = new Crawler($body);
$text = $crawler->filterXPath('//channel//item//title');

foreach ($text as $domElement) {
    $data[] = $domElement->textContent;
}

$arrayText = json_encode($data);

$text = json_decode($arrayText);

foreach ($text as $item){
    echo $item.'<br>';
}

