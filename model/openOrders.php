<?php
include_once "model/connectDB.php";
include_once "model/orders.php";

class openOrder
{
    public function queryOrders($id)
    {
        $conn = connectDB();
        $valueUsername = $conn->prepare("SELECT * FROM order WHERE id = '$id' ");
        $valueUsername->execute();
        $result = $valueUsername->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertToOrder($idCrypto, $amount)
    {
        $conn = connectDB();
        $id = uniqid();
        $idUser = $_SESSION["id"];

        $stmt = $conn->prepare("INSERT INTO `mpa_db`.`order` (`id`, `id_crypto`, `id_user`, `amount`, `status`, `type`, `isCancel`, `created_at`)
                    VALUES ('$id', '$idCrypto', '$idUser', '$amount', 'Pending', 'Buy', 0, now());");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if ($result == false) {
            return json_encode(["status" => false, "message" => "something went wrong!"], JSON_PRETTY_PRINT);
        } else {
            return json_encode(["status" => true, "message" => "Order Successful!"], JSON_PRETTY_PRINT);
        }
    }

    public function getAllOrders()
    {
        $conn = connectDB();
        $valueUsername = $conn->prepare("SELECT * FROM `order`;");
        $valueUsername->execute();
        $valueUsername->setFetchMode(PDO::FETCH_ASSOC);
        $result = $valueUsername->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrderByIdUser($idUser)
    {
        $conn = connectDB();
        $valueUsername = $conn->prepare("SELECT * FROM `order` where id_user = '$idUser';");
        $valueUsername->execute();
        $valueUsername->setFetchMode(PDO::FETCH_ASSOC);
        $result = $valueUsername->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function canceledOrder() {
        
    }
}
