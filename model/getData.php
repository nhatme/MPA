<?php
include_once "./connectDB.php";
include_once "./coin.php";
// Create a stream

$getLatestList = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
$getInfo = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/info';

$getCategories = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/categories";
$getCategoryDetail = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/category";

function getCategories($endpoint, $limit)
{

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
        // print_r($value);
        // echo "<br>";
        insertCategoryDB($value["id"], $value["name"], $value["title"], $value["description"], $value["num_tokens"], $value["avg_price_change"], $value["market_cap"], $value["market_cap_change"], $value["volume"], $value["volume_change"]);
    }
}

// getCategories($getCategories, 10);

function insertCategoryDB($id, $name, $title, $desc, $num_tokens, $avg_price_change, $market_cap, $market_cap_change, $volume, $volume_change)
{
    $conn = connectDB();

    try {
        $sql = "INSERT INTO `mpa_db`.`categories` (`id`, `name`, `title`, `description`, `num_tokens`, `avg_price_change`, `market_cap`, `market_cap_change`, `volume`, `volume_change`)
        VALUES ('$id', '$name', '$title', '$desc', '$num_tokens', '$avg_price_change', '$market_cap', '$market_cap_change', '$volume', '$volume_change'); ";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// getCategories($getCategories, 215);


function getIdCategory()
{
    $listIdcategory = [];
    $conn = connectDB();

    try {
        $sql = "SELECT id FROM categories WHERE SUBSTRING(id, 1, 3) = '605';";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
            $listIdcategory[] = $value;
        }

        return $listIdcategory;
    } catch (PDOException $e) {
        echo $sql . "Error: <br>" . $e->getMessage();
    }
}

// print_r(count(getIdCategory()));

function getCoinDetailByIdCategory($endpoint, $id)
{
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

    return $data;
}

function insertListproducts($id_category, $id_coin)
{
    $listIdcategory = [];
    $conn = connectDB();

    try {
        $sql = "INSERT INTO `mpa_db`.`list_coins_category` (`id`, `id_category`, `id_coin`) VALUES (0, '$id_category', '$id_coin');";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $value) {
            $listIdcategory[] = $value;
        }

        return $listIdcategory;
    } catch (PDOException $e) {
        echo $sql . "Error: <br>" . $e->getMessage();
    }
}

// this function to get id category and id coin in one time/ -- get done
// for ($i = 0; $i < count(getIdCategory()); $i++) {

// Get details for the current category to get coin id
// $categoryDetail = getCoinDetailByIdCategory($getCategoryDetail, implode(getIdCategory()[$i]));

// print_r(getCoinDetailByIdCategory($getCategoryDetail, implode(getIdCategory()[$i])));

// for ($j = 0; $j < count($categoryDetail["coins"]); $j++) {
// insertListproducts($categoryDetail["id"], $categoryDetail["coins"][$j]["id"]);
// }

//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
// }



function getCoinLastest($endpoint, $limit)
{
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
    return $data;
}

function getLogoCoin($endpoint, $id)
{

    $maxRetries = 3;
    $retryDelay = 1; // in seconds, initial delay

    $opts = [
        "http" => [
            "method" => "GET",
            "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
        ]
    ];

    // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
    $context = stream_context_create($opts);

    // // Open the file using the HTTP headers set above
    // // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
    // $file = file_get_contents($endpoint . "?id=$id", false, $context);

    // $data = json_decode($file, TRUE)["data"];
    // return $data;

    for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
        $file = file_get_contents($endpoint . "?id=$id", false, $context);

        if ($file !== false) {
            $data = json_decode($file, TRUE)["data"];
            return $data;
        } else {
            // Retry after exponential backoff
            sleep($retryDelay);
            $retryDelay *= 2; // Exponential backoff: double the delay for each retry
        }
    }

    echo "Failed to fetch data after $maxRetries attempts.";
    return null;
}

function insertLogoCointoDB($logo, $id)
{
    $conn = connectDB();

    try {
        $sql = "INSERT INTO `mpa_db`.`logo_coin` (`logo`, `id_coin`) VALUES ('$logo', '$id');";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $sql . "Error: <br>" . $e->getMessage();
    }
}

$coinDetail = new Coin();
$resultIdCoin = $coinDetail->getIdCoin(100);

foreach ($resultIdCoin as $key => $value) {
    $result = getLogoCoin($getInfo, $value["id"]);
    // Check if the key "id" exists in the result array before accessing it
    $idCoin = isset($result[$value["id"]]["id"]) ? $result[$value["id"]]["id"] : null;

    // Check if the key "logo" exists in the result array before accessing it
    $logoCoin = isset($result[$value["id"]]["logo"]) ? $result[$value["id"]]["logo"] : null;

    // Only proceed with the insertion if both $idCoin and $logoCoin are not null
    if ($idCoin !== null && $logoCoin !== null) {
        insertLogoCointoDB($logoCoin, $idCoin);
    }
    // insertLogoCointoDB($logoCoin, $idCoin);
}

function insertCointoDB($endpoint, $limit)
{
    $conn = connectDB();

    if (!$conn) {
        die("Failed to connect to the database.");
    }

    foreach (getCoinLastest($endpoint, $limit) as $key => $value) {
        $id = $value["id"];
        $name = $value["name"];
        $symbol = $value["symbol"];
        $rank = $value["cmc_rank"];
        $price = $value["quote"]["USD"]["price"];
        $change_1h = $value["quote"]["USD"]["percent_change_1h"];
        $change_24h = $value["quote"]["USD"]["percent_change_24h"];
        $change_7d = $value["quote"]["USD"]["percent_change_7d"];
        $market_cap = $value["quote"]["USD"]["market_cap"];
        $volume_24h = $value["quote"]["USD"]["volume_24h"];
        $circulating_supply = $value["circulating_supply"];
        $max_supply = $value["max_supply"];
        $created_at = $value["date_added"];

        try {
            $sql = "INSERT INTO `mpa_db`.`crypto_currency` (`id`, `name_product`, `symbol`, `cmc_rank`, `price`, `change_1h`, `change_24h`, `change_7d`, `market_cap`, `volume_24h`, `circulating_supply`, `max_supply`, `created_at`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$id, $name, $symbol, $rank, $price, $change_1h, $change_24h, $change_7d, $market_cap, $volume_24h, $circulating_supply, $max_supply, $created_at]);
        } catch (PDOException $e) {
            echo  "Error: " . "<br>" . $e->getMessage();
            echo "<br>SQL: " . $sql;
        }
    }
}

// insertCointoDB($getLatestList, 5000);








// function getSlug($endpoint, $limit)
// {
//     $slugStr = "";

//     $opts = [
//         "http" => [
//             "method" => "GET",
//             "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
//         ]
//     ];

//     // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
//     $context = stream_context_create($opts);

//     // Open the file using the HTTP headers set above
//     // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
//     $file = file_get_contents($endpoint . "?limit=$limit", false, $context);

//     $data = json_decode($file, TRUE)["data"];
//     foreach ($data as $key => $value) {
//         // array_push($valueArr, $value);
//         $slugStr .= $value["slug"];
//         if (next($data)) {
//             $slugStr .= ",";
//         }
//     }
//     // return $valueArr;
//     return $slugStr;
// }

// function getCoinOrigin($endpoint, $limit)
// {
//     global $valueArr;
//     $valueArr = array();

//     $opts = [
//         "http" => [
//             "method" => "GET",
//             "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
//         ]
//     ];

//     // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
//     $context = stream_context_create($opts);

//     // Open the file using the HTTP headers set above
//     // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
//     $file = file_get_contents($endpoint . "?limit=$limit", false, $context);

//     $data = json_decode($file, TRUE)["data"];
//     foreach ($data as $key => $value) {
//         array_push($valueArr, $value);
//     }
//     return $valueArr;
// }


// function getInfo($endpoint, $slug)
// {

//     global $valueArr;
//     $valueArr = array();

//     $opts = [
//         "http" => [
//             "method" => "GET",
//             "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
//         ]
//     ];

//     // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
//     $context = stream_context_create($opts);

//     // Open the file using the HTTP headers set above
//     // DOCS: https://www.php.net/manual/en/function.file-get-contents.php
//     $file = file_get_contents($endpoint . "?slug=$slug", false, $context);

//     $data = json_decode($file, TRUE)["data"];
//     foreach ($data as $key => $value) {
//         // return $value;
//         array_push($valueArr, $value);
//     }

//     return $valueArr;
// }




// ================================================================================

// $coinOrigin = getCoinOrigin($getLatestList, 10);
// print_r(($coinOrigin));

// $valueSlug = getSlug($getLatestList, 5);
// print_r($valueSlug);

// $valueInfos = getInfo($getInfo, getSlug($getLatestList, 5));
// return logo 
// print_r($valueInfos);

// ================================================================================


// function execute($getLatestList, $getInfo)
// {
//     $conn = connectDB();
//     if ($conn !== null) {
//         $arrBigsMulti = [];
//         $arrBigs = array();

//         foreach (getCoinOrigin($getLatestList, 20) as $key => $value) {
//             $id = $value["id"];
//             $name = $value["name"];
//             $logo = getInfo($getInfo, getSlug($getLatestList, 20))[$key]["logo"];
//             $symbol = $value["symbol"];
//             $rank = $value["cmc_rank"];
//             $price = $value["quote"]["USD"]["price"];
//             $change_1h = $value["quote"]["USD"]["percent_change_1h"];
//             $change_24h = $value["quote"]["USD"]["percent_change_24h"];
//             $change_7d = $value["quote"]["USD"]["percent_change_7d"];
//             $market_cap = $value["quote"]["USD"]["market_cap"];
//             $volume_24h = $value["quote"]["USD"]["volume_24h"];
//             $circulating_supply = $value["circulating_supply"];
//             $max_supply = $value["max_supply"];
//             $created_at = $value["date_added"];

//             $arrBigs = array(
//                 'id' => uniqid() . "-$id",
//                 'name_product' => $name,
//                 'logo' => $logo,
//                 'symbol' => $symbol,
//                 'cmc_rank' => $rank,
//                 'price' => $price,
//                 'change_1h' => $change_1h,
//                 'change_24h' => $change_24h,
//                 'change_7d' => $change_7d,
//                 'market_cap' => $market_cap,
//                 'volume_24h' => $volume_24h,
//                 'circulating_supply' => $circulating_supply,
//                 'max_supply' => $max_supply,
//                 'created_at' => $created_at
//             );

//             $arrBigsMulti[$key] = $arrBigs;
//         }
//         print_r($arrBigsMulti);

//         // ================================================================================

//         foreach ($arrBigsMulti as $data) {
//             // Prepare the SQL statement
//             $sql = "INSERT INTO crypto (id, name_product, logo, symbol, cmc_rank, price, change_1h, change_24h, change_7d, market_cap, volume_24h, circulating_supply, max_supply, created_at)
//                 VALUES (:id, :name_product, :logo, :symbol, :cmc_rank, :price, :change_1h, :change_24h, :change_7d, :market_cap, :volume_24h, :circulating_supply, :max_supply, :created_at)";

//             // Prepare the statement
//             $stmt = $conn->prepare($sql);

//             // Bind parameters
//             $stmt->bindParam(':id', $data['id']);
//             $stmt->bindParam(':name_product', $data['name_product']);
//             $stmt->bindParam(':logo', $data['logo']);
//             $stmt->bindParam(':symbol', $data['symbol']);
//             $stmt->bindParam(':cmc_rank', $data['cmc_rank']);
//             $stmt->bindParam(':price', $data['price']);
//             $stmt->bindParam(':change_1h', $data['change_1h']);
//             $stmt->bindParam(':change_24h', $data['change_24h']);
//             $stmt->bindParam(':change_7d', $data['change_7d']);
//             $stmt->bindParam(':market_cap', $data['market_cap']);
//             $stmt->bindParam(':volume_24h', $data['volume_24h']);
//             $stmt->bindParam(':circulating_supply', $data['circulating_supply']);
//             $stmt->bindParam(':max_supply', $data['max_supply']);
//             $stmt->bindParam(':created_at', $data['created_at']);

//             // Execute the statement
//             $stmt->execute();
//         }
//     } else {
//         print_r(connectDB());
//     }
// }

// execute($getLatestList, $getInfo);

// function generateShortUniqueId()
// {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $length = 2;
//     $uniqueId = '';

//     for ($i = 0; $i < $length; $i++) {
//         $uniqueId .= $characters[rand(0, strlen($characters) - 1)];
//     }

//     return $uniqueId;
// }
