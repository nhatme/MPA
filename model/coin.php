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

    public function getCoin()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM mpa_db.crypto_currency order by cmc_rank asc limit 20;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $coin_details = [];

        foreach ($stmt->fetchAll() as $k => $v) {
            $coin_detail = new CryptoCurrency(...$v);
            $coin_details[$k] = $coin_detail;
        }
        return $coin_details;
    }

    public function getDetailCoin($id)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM mpa_db.crypto_currency WHERE id = '$id';");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }
}

// $coin = new Coin();
// print_r($coin->getCoin());
