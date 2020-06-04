<?php
require('vendor/symfony/http-client/HttpClient.php');
require('vendor/symfony/http-client/HttpClientTrait.php');
require('vendor/psr/log/Psr/Log/LoggerAwareTrait.php');
require('vendor/psr/log/Psr/Log/LoggerAwareInterface.php');
require('vendor/symfony/http-client-contracts/HttpClientInterface.php');
require('vendor/symfony/service-contracts/ResetInterface.php');
require('vendor/symfony/http-client/CurlHttpClient.php');
require('vendor/symfony/http-client/Internal/ClientState.php');
require('vendor/symfony/http-client/Internal/DnsCache.php');
require('./vendor/symfony/http-client-contracts/ChunkInterface.php');
require('./vendor/symfony/http-client/Chunk/DataChunk.php');
require('./vendor/symfony/http-client/Chunk/LastChunk.php');
require('vendor/symfony/http-client/Response/ResponseTrait.php');
require('./vendor/symfony/http-client-contracts/ResponseInterface.php');
require('./vendor/symfony/http-client/Chunk/FirstChunk.php');
require('vendor/symfony/http-client/Response/CurlResponse.php');
require('vendor/symfony/http-client/Internal/CurlClientState.php');


use Symfony\Component\HttpClient\HttpClient;

function RetrieveAllInfo()
{
    $client = HttpClient::create();
    $response = $client->request('GET', 'https://api.github.com/users/spyrit/events');
    $content = $response->getContent();
    $json = json_decode($content);
    return ($json);
}

function RetrieveInfo($json)
{
    $i = 0;
    $type_array = array();
    $name_array = array();
    $avatar_array = array();
    $date_array = array();
    $all_array = array();
    while ($i < 13) {
        $type_array[$i] = $json[$i]->{'type'};
        $name_array[$i] = $json[$i]->{'repo'}->{'name'};
        $avatar_array[$i] = $json[$i]->{'actor'}->{'avatar_url'};
        $date_array[$i] = $json[$i]->{'created_at'};
        $i += 1;
    }
    $all_array[0] = $type_array;
    $all_array[1] = $name_array;
    $all_array[2] = $avatar_array;
    $all_array[3] = $date_array;
    return ($all_array);
}

function FormatDate($date)
{
    for ($i = 0; $i < 13; $i += 1) {
        $date[$i] = substr($date[$i], 0, 10);
    }
    return ($date);
}

$all_info = RetrieveAllInfo();
$info = RetrieveInfo($all_info);
$type = $info[0];
$name = $info[1];
$avatar = $info[2];
$date = FormatDate($info[3]);

