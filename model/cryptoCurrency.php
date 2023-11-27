<?php
include_once "model/connectDB.php";
include_once "model/entityCoin.php";

class Coin
{
    public function __chart()
    {
        
    }

    public function getCoin()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM mpa_db.crypto;");
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
        $stmt = $conn->prepare("SELECT * FROM mpa_db.crypto WHERE id = '$id' ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }
}
