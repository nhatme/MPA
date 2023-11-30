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

        if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
            $username = $_SESSION["username"];
            $getIdUser = $conn->prepare("SELECT * FROM users where username = '$username'; ");
            $getIdUser->execute();
            $result = $getIdUser->fetch(PDO::FETCH_ASSOC);
            $idUser = $result["id"];

            if ($result != false) {
                $sql = "INSERT INTO `mpa_db`.`order` (`id`, `id_crypto`, `id_user`, `amount`, `status`, `type`, `isDelete`, `created_at`)
                VALUES ('$id', '$idCrypto', '$idUser', '$amount', 'pending', 'Buy', '0', now());
                ";
            }
        }
    }
}
