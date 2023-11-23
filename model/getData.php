<?php

include_once "./connectDB.php";
// Create a stream

$getLatestList = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
$getInfo = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/info';


function getId($endpoint, $limit)
{
    // global $valueArr;
    // $valueArr = array();
    $idStr = "";

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
        // array_push($valueArr, $value);
        $idStr .= $value["id"];
        if (next($data)) {
            $idStr .= ",";
        }
    }
    // return $valueArr;
    return $idStr;
    // print_r($idStr);
}

function getCoinOrigin($endpoint, $limit)
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
    }
    return $valueArr;
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

// $coinOrigin = getCoinOrigin($getLatestList, 10);
// print_r(count($coinOrigin));

// $valueId = getId($getLatestList, 10);
// print_r($valueId);

// $valueInfos = getInfo($getInfo, getId($getLatestList, 10));
// return logo 
// print_r($valueInfos);


$conn = connectDB();

if ($conn !== null) {

    foreach (getCoinOrigin($getLatestList, 10) as $key => $value) {
        try {
            $counter++;
            print_r($value);
            $id = uniqid(); // check duplicate
            $name = $value["name"];
            $logo = getInfo($getInfo, getId($getLatestList, 10))[$key]["logo"];
            $symbol = $value["symbol"];
            $rank = $value["cmc_rank"];
            $price = $value["quote"]["USD"]["price"];
            $change_1h = $value["quote"]["USD"]["percent_change_1h"];
            $change_24h = $value["quote"]["USD"]["volume_change_24h"];
            $change_7d = $value["quote"]["USD"]["percent_change_7d"];
            $market_cap = $value["quote"]["USD"]["market_cap"];
            $volume_24h = $value["quote"]["USD"]["volume_24h"];
            $circulating_supply = $value["circulating_supply"];
            $max_supply = $value["max_supply"];
            $created_at = $value["date_added"];

            $sql = "INSERT INTO crypto (id, name_product, logo, symbol, cmc_rank, price, change_1h, change_24h, change_7d, market_cap, volume_24h, circulating_supply, max_supply, created_at)
            VALUES ('$id', '$name', '$logo',  '$symbol', '$rank', '$price', '$change_1h', '$change_24h', '$change_7d', '$market_cap', '$volume_24h', '$circulating_supply', '$max_supply', '$created_at')";
            $conn->exec($sql);

            echo "Loop $counter times";
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }
} else {
    print_r(connectDB());
}

function generateShortUniqueId()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 2;
    $uniqueId = '';

    for ($i = 0; $i < $length; $i++) {
        $uniqueId .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $uniqueId;
}

// print_r(generateShortUniqueId());