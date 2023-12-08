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
        $valueUsername = $conn->prepare("SELECT * FROM `order` where id_user = '$idUser' and isCancel = 0;");
        $valueUsername->execute();
        $valueUsername->setFetchMode(PDO::FETCH_ASSOC);
        $result = $valueUsername->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function confirmedOrder($idTable, $idUser)
    {
        $conn = connectDB();

        $stmtUpdateConfirmed = $conn->prepare("UPDATE `order` SET status = 'Confirmed', isCancel = 2 WHERE id = :idTable;");
        $stmtUpdateConfirmed->bindParam(':idTable', $idTable, PDO::PARAM_STR);
        $updateConfirmedSuccess = $stmtUpdateConfirmed->execute();
        if ($updateConfirmedSuccess) {
            $stmtUpdateProcessed = $conn->prepare("UPDATE `order` SET isProcessed = 1 WHERE id_user = :idUser AND isCancel IN (1, 2);");
            $stmtUpdateProcessed->bindParam(':idUser', $idUser, PDO::PARAM_STR);
            $updateProcessedSuccess = $stmtUpdateProcessed->execute();
            if ($updateProcessedSuccess) {
            } else {
            }
        } else {
        }
    }

    public function canceledOrder($idTable, $idUser)
    {
        $conn = connectDB();

        $stmtUpdateCancelled = $conn->prepare("UPDATE `order` SET status = 'Cancelled', isCancel = 1 WHERE id = :idTable;");
        $stmtUpdateCancelled->bindParam(':idTable', $idTable, PDO::PARAM_STR);
        $updateCancelledSuccess = $stmtUpdateCancelled->execute();
        if ($updateCancelledSuccess) {
            $stmtUpdateProcessed = $conn->prepare("UPDATE `order` SET isProcessed = 1 WHERE id_user = :idUser AND isCancel IN (1, 2);");
            $stmtUpdateProcessed->bindParam(':idUser', $idUser, PDO::PARAM_STR);
            $updateProcessedSuccess = $stmtUpdateProcessed->execute();
            if ($updateProcessedSuccess) {
            } else {
            }
        } else {
        }
    }

    public function transHistory($idUser)
    {
        $conn = connectDB();
        $stmtInsert = $conn->prepare("INSERT INTO transaction_history (id, id_user, id_crypto, amount, isCancel, status)
        SELECT UUID(), id_user, id_crypto, amount, isCancel, status
        FROM `order` WHERE id_user = :idUser AND isProcessed = 1;");

        $stmtInsert->bindParam(':idUser', $idUser, PDO::PARAM_STR);
        $insertSuccess = $stmtInsert->execute();
        if ($insertSuccess) {
            // echo json_encode(["status" => false, "message" => "Update of isProcessed in transaction_history table successful !"]);
            $stmtUpdate = $conn->prepare("UPDATE `order` SET isProcessed = 2
            WHERE id_user = :idUser AND isProcessed = 1");
            $stmtUpdate->bindParam(':idUser', $idUser, PDO::PARAM_STR);
            $updateSuccess = $stmtUpdate->execute();
            if ($updateSuccess) {
                // echo "Update of isProcessed in order table successful !";
            } else {
                // echo "Update of isProcessed in order table failed !";
            }
        } else {
            // echo json_encode(["status" => false, "message" => "Update of isProcessed in transaction_history table failed !"]);
        }
        $stmtInsert->closeCursor();
        $stmtUpdate->closeCursor();
    }

    public function queryAllTransHistory($idUser)
    {
        $conn = connectDB();
        $valueUsername = $conn->prepare("SELECT * FROM `transaction_history` where id_user = '$idUser';");
        $valueUsername->execute();
        $valueUsername->setFetchMode(PDO::FETCH_ASSOC);
        $result = $valueUsername->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
