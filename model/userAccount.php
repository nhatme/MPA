<?php
include_once "model/connectDB.php";
include_once "model/user.php";

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

                $password_hashmd5 = md5($databody->password);
                $result = self::login($databody->username, $password_hashmd5);

                if (empty($databody->username) || empty($password_hashmd5)) {

                    echo json_encode(["status" => false, "message" => "tk hoac mk k dc trong", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                    return;
                }

                if ($result == false) {
                    echo json_encode(["status" => false, "message" => "tk k ton tai", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                    return;
                }

                $_SESSION["username"] = $databody->username;
                $_SESSION["password"] = $password_hashmd5;
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

    public function signup()
    {
        // $user = new User();
        $conn = connectDB();

        $entityBody = file_get_contents('php://input');
        $databody = json_decode($entityBody);

        if (isset($databody)) {
            if (isset(($databody->email))) {

                $id = uniqid();
                $password_hashmd5 = md5($databody->password);

                $getUser = $conn->prepare("SELECT * FROM users where users.username = '$databody->username' ");
                // $conn->exec($getUser);
                $getUser->execute();

                $result = $getUser->fetch(PDO::FETCH_ASSOC);
                echo "[";
                echo json_encode(["status" => false, "message" => $result], JSON_PRETTY_PRINT);
                echo ",";
                if ($result != false) {
                    echo json_encode(["status" => false, "message" => "username da ton tai"], JSON_PRETTY_PRINT); echo "]";
                    exit;
                }

                $sql = "INSERT INTO users ( id, email, username, password_user, avatar, role_user, created_at)
                    VALUES ('$id', '$databody->email', '$databody->username', '$password_hashmd5', '', 1, '$databody->currentdateTime')";
                $conn->exec($sql);
                var_dump("INSERT INTO DB COMPLETE");
                echo json_encode($databody, JSON_PRETTY_PRINT);
                exit;
            }
        }
    }



    public function getUsers()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM mpa_db.users;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $user_details = [];

        foreach ($stmt->fetchAll() as $k => $v) {
            $user_detail = new User(...$v);
            $user_details[$k] = $user_detail;
        }
        return $user_details;
    }
}
