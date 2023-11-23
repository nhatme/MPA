<?php

include_once "./connectDB.php";
// Create a stream

$limit = 20;
$getLatestList = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
$getInfo = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/info';

$idStr = "";

function getId($endpoint, $idStr, $limit)
{

    global $valueArr;
    $valueArr = array();

    $opts = [
        "http" => [
            "method" => "GET",
            "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
        ]
    ];

    // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
    // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
    $file = file_get_contents($endpoint . "?limit=$limit", false, $context);

    $data = json_decode($file, TRUE)["data"];
    foreach ($data as $key => $value) {
        array_push($valueArr, $value);
        $idStr .= $value["id"];
        if (next($data)) {
            $idStr .= ",";
        }
    }
    // return $valueArr;
    return $idStr;
    // print_r($idStr);
}


function getInfo($endpoint, $id)
{

    global $valueArr;
    $valueArr = array();

    $opts = [
        "http" => [
            "method" => "GET",
            "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
        ]
    ];

    // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
    // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
    $file = file_get_contents($endpoint . "?id=$id", false, $context);

    $data = json_decode($file, TRUE)["data"];
    foreach ($data as $key => $value) {
        // return $value;
        array_push($valueArr, $value);
    }

    return $valueArr;
}



$valueInfos = getInfo($getInfo, getId($getLatestList, $idStr, $limit));

connectDB();
foreach ($valueInfos as $key => $value) {
    $name = $value["name"];
    // $sql = "INSERT INTO crypto (id, name_product, symbol, price, change_1h, change_24h, change_7d, market_cap, volume_24h, circulating_supply, max_supply, created_at)
    // VALUES ('#123456', '$name', "")";
    // use exec() because no results are returned
    $conn->exec($sql);
}
