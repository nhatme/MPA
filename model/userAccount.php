<?php
include_once "./connectDB.php";

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
        session_start();
        $classUser = new UserAccount();
        $entityBody = file_get_contents('php://input');
        $databody = json_decode($entityBody);

        if (isset($databody)) {
            if (isset($databody->username)) {
                $result = $classUser->login($databody->username, $databody->password);
                // echo json_encode($databody, JSON_PRETTY_PRINT);
                if ($result == true) {
                    $_SESSION["username"] = $databody->username;
                    $_SESSION["password"] = $databody->password;
                    $_SESSION["role_user"] = $result["role_user"];
                } else {
                    unset($_SESSION["username"]);
                    unset($_SESSION["password"]);
                    unset($_SESSION["role_user"]);
                }
                var_dump($result);
            }
        }
    }

    public function reqlogout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["role_user"]);
    }
}

$classUser = new UserAccount();
$classUser->reqLogin();
