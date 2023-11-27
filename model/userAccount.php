<?php
include_once "model/connectDB.php";

class UserAccount
{
    public function login($username, $password_user)
    {
        $conn = connectDB();
        $valueUser = $conn->prepare("SELECT * FROM users WHERE username = :username AND password_user = :password_user");
        $valueUser->bindParam(':username', $username);
        $valueUser->bindParam(':password_user', $password_user);
        $valueUser->execute();

        $result = $valueUser->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    public function reqLogin()
    {
        $entityBody = file_get_contents('php://input');
        $databody = json_decode($entityBody);

        if (isset($databody)) {
            if (isset(($databody->username))) {

                $result = self::login($databody->username, $databody->password);
                
                if (empty($databody->username) || empty($databody->password)) {

                    echo json_encode(["status" => false, "message" => "tk hoac mk k dc trong", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                    return;
                }

                if ($result == false) {
                    echo json_encode(["status" => false, "message" => "tk k ton tai", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                    return;
                }

                $_SESSION["username"] = $databody->username;
                $_SESSION["password"] = $databody->password;
                $_SESSION["role_user"] = $result["role_user"];

                echo json_encode(["status" => true, "message" => "dang nhap thanh cong", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                return;


                //echo json_encode($databody, JSON_PRETTY_PRINT);
                // var_dump($_SESSION['password'] . "okok");
            }
        }
    }

    public function reqlogout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["role_user"]);
        header("Location: ./");
    }
}


