<?php
include_once "model/connectDB.php";
include_once "model/entityCoin.php";

// include_once "./connectDB.php";
// include_once "./entityCoin.php";

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

    public function getPageCoin($page = 1)
    {

        $offset = 20 * ($page - 1);
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT c.*,l.logo as logo1 FROM crypto_currency as c
        left outer join logo_coin as l
        on c.id = l.id_coin
        order by c.cmc_rank asc limit $offset,20 ;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $coin_details = [];


        $getTotal = $conn->prepare("SELECT count(*) as total from crypto_currency");
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
}
