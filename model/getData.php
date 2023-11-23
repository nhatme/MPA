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
// print_r(($coinOrigin));

// $valueId = getId($getLatestList, 10);
// print_r($valueId);

// $valueInfos = getInfo($getInfo, getId($getLatestList, 10));
// return logo 
// print_r($valueInfos);


$conn = connectDB();

if ($conn !== null) {

    $sqlQueries = array();
    // $idArr = array();
    // $nameArr = array();
    // $logoArr = array();
    // $symbolArr = array();
    // $rankArr = array();
    // $priceArr = array();
    // $change_1hArr = array();
    // $change_24hArr = array();

    $arrBigsMulti = [];
    $arrBigs = array();


    foreach (getCoinOrigin($getLatestList, 10) as $key => $value) {
        // $id = uniqid();
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

        $arrBigs = array(
            'id' => uniqid(),
            'name_product' => $name,
            'logo' => $logo,
            'symbol' => $symbol,
            'cmc_rank' => $rank,
            'price' => $price,
            'change_1h' => $change_1h,
            'change_24h' => $change_24h,
            'change_7d' => $change_7d,
            'market_cap' => $market_cap,
            'volume_24h' => $volume_24h,
            'circulating_supply' => $circulating_supply,
            'max_supply' => $max_supply,
            'created_at' => $created_at
        );

        $arrBigsMulti = [
            $key => $arrBigs
        ];
    }

    print_r($arrBigsMulti);


    foreach ($arrBigs as $data) {
        $sql = "INSERT INTO crypto (id, name_product, logo, symbol, cmc_rank, price, change_1h, change_24h, change_7d, market_cap, volume_24h, circulating_supply, max_supply, created_at)
        VALUES (
                    '{$data['id']}', '{$data['name_product']}', '{$data['logo']}', '{$data['symbol']}',
                    '{$data['cmc_rank']}', '{$data['price']}', '{$data['change_1h']}', '{$data['change_24h']}', '{$data['change_7d']}',
                    '{$data['market_cap']}', '{$data['volume_24h']}', '{$data['circulating_supply']}', '{$data['max_supply']}', '{$data['created_at']}'

                )";
                
        $conn->exec($sql);
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