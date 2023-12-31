<?php
include_once "model/connectDB.php";
include_once "model/entityCoin.php";
include_once "model/userAccount.php";

class Coin
{
    public function __chart()
    {
    }

    public function getFirst20Coin()
    {

        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM crypto_currency order by cmc_rank asc limit 20;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function getDetailCoin($id)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM mpa_db.crypto_currency WHERE id = '$id';");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function getIdCoin($limit)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT id from crypto_currency order by cmc_rank asc limit $limit;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function getCountListCoin()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT count(*) as count_coin FROM crypto_currency;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function getLogoCoin()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT logo, id_coin from crypto_currency as c inner join logo_coin as l on c.id = l.id_coin;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function getPageCoin($page = 1, $categoryId = "")
    {

        $offset = 20 * ($page - 1);
        $conn = connectDB();
        if ($categoryId == "") {
            $stmt = $conn->prepare("SELECT c.*,l.logo as logo1 FROM crypto_currency as c
            left outer join logo_coin as l
            on c.id = l.id_coin
            order by c.cmc_rank asc limit $offset, 20;");
            $getTotal = $conn->prepare("SELECT count(*) as total from crypto_currency");
        } else {
            $getTotal = $conn->prepare("SELECT count(*) as total from list_coins_category as l 
            inner join crypto_currency as c
            on l.id_coin = c.id 
            left outer join logo_coin as lc
            on c.id = lc.id_coin
            where l.id_category = '$categoryId'");
            $stmt = $conn->prepare("SELECT c.*,lc.logo as logo1 from list_coins_category as l 
            inner join crypto_currency as c
            on l.id_coin = c.id 
            left outer join logo_coin as lc
            on c.id = lc.id_coin
            where l.id_category = '$categoryId'
            order by c.cmc_rank asc LIMIT $offset, 20;");
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $coin_details = [];

        $getTotal->execute();
        $getTotal->setFetchMode(PDO::FETCH_ASSOC);
        $valueTotal = $getTotal->fetch();

        foreach ($stmt->fetchAll() as $k => $v) {
            $coin_detail = new CryptoCurrency(
                $v["id"],
                $v["name_product"],
                $v["symbol"],
                $v["logo1"],
                $v["cmc_rank"],
                $v["price"],
                $v["change_1h"],
                $v["change_24h"],
                $v["change_7d"],
                $v["market_cap"],
                $v["volume_24h"],
                $v["circulating_supply"],
                $v["max_supply"],
                $v["created_at"]
            );
            $coin_details[$k] = $coin_detail;
        }
        return ['data' => $coin_details, 'total' => $valueTotal['total']];
    }

    public function searchItem()
    {
        $conn = connectDB();
        $entityBody = file_get_contents('php://input');
        $databody = json_decode($entityBody);

        if (isset($databody)) {
            if (isset($databody->keyword) && $databody->keyword != "") {
                $stmt = $conn->prepare("SELECT id, name_product, symbol, cmc_rank from crypto_currency where name_product LIKE '%$databody->keyword%' or id LIKE '$databody->keyword' or symbol LIKE '%$databody->keyword%' or cmc_rank LIKE '%$databody->keyword%';");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                if ($result != false) {
                    echo json_encode(["status" => true, "result" => $result]);
                } else {
                    echo json_encode(["status" => false, "result" => $result]);
                }
            } else {
                echo json_encode(["status" => false, "result" => "Empty"]);
            }
        }
    }

    public function getLatestRecord()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT *
        FROM crypto_currency
        ORDER BY created_at DESC, cmc_rank
        LIMIT 10;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function deleteCurr($id)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM crypto_currency WHERE id = '$id';");
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCurrByAdmin($idCurr, $name = null, $symbol = null, $logo = null, $price = null, $marketcap = null, $circulating = null)
    {

        $uploadCurrImg = new UserAccount();
        $resultImg = $uploadCurrImg->createNewCurImg($logo);

        $conn = connectDB();
        $sql = "UPDATE `crypto_currency` SET
         `name_product` = '$name',
         `symbol` = '$symbol', 
         `logo` = '$resultImg', 
         `price` = '$price', 
         `market_cap` = '$marketcap', 
         `circulating_supply` = '$circulating' WHERE (`id` = '$idCurr');";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
