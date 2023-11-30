<?php
include_once "model/connectDB.php";
include_once "model/user.php";

class UserAccount
{
    public function querylogin($username, $password_user)
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

    public function queryUsername($username)
    {
        $conn = connectDB();
        $valueUsername = $conn->prepare("SELECT * FROM users WHERE username = '$username'");
        $valueUsername->execute();
        $result = $valueUsername->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function queryPassword($password)
    {
        $conn = connectDB();
        $valuePassword = $conn->prepare("SELECT * FROM users WHERE password_user = '$password'");
        $valuePassword->execute();
        $result = $valuePassword->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function reqLogin()
    {
        $entityBody = file_get_contents('php://input');
        $databody = json_decode($entityBody);

        if (isset($databody)) {
            if (isset(($databody->username))) {

                $password_hashmd5 = md5(strtolower($databody->password));

                $result = self::querylogin($databody->username, $password_hashmd5);
                $resultUsername = self::queryUsername($databody->username);
                $resultPassword = self::queryPassword($password_hashmd5);

                // echo " this is result: <br>";
                // echo json_encode($result, JSON_PRETTY_PRINT);
                // echo "<br>";

                if (empty($databody->username) || empty($password_hashmd5)) {
                    echo json_encode(["status" => false, "message" => "Do not empty your fields", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                    exit;
                }

                if (($resultUsername != false) && ($resultPassword != false)) {

                    $_SESSION["username"] = $databody->username;
                    $_SESSION["password"] = $password_hashmd5;
                    $_SESSION["role_user"] = $result["role_user"];

                    echo json_encode(["status" => true, "message" => "Login is sucessfully", "result" => "", "redirect" => "Homepage"], JSON_PRETTY_PRINT);
                    exit;
                } else {
                    if ($resultUsername == false) {
                        echo json_encode(["status" => false, "message" => "Username or Password is incorrect !", "detailLogin" => "username k chinh xac (Tk khong ton tai)"], JSON_PRETTY_PRINT);
                        exit;
                    } else if ($resultPassword == false) {
                        echo json_encode(["status" => false, "message" => "Username or Password is incorrect !", "detailLogin" => "password k chinh xac"], JSON_PRETTY_PRINT);
                        exit;
                    }
                }
            }
        }
    }

    public function reqlogout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["role_user"]);
        sleep(1);
        header("Location: ./");
    }

    public function signup()
    {
        $conn = connectDB();

        $entityBody = file_get_contents('php://input');
        $databody = json_decode($entityBody);

        if (isset($databody)) {
            if (isset(($databody->username))) {

                $id = uniqid();
                $password_hashmd5 = md5($databody->password);

                $getUser = $conn->prepare("SELECT * FROM users where users.username = '$databody->username' ");
                $getUser->execute();

                $result = $getUser->fetch(PDO::FETCH_ASSOC);

                if ($result != false) {
                    echo json_encode(["status" => false, "message" => "An existed username"], JSON_PRETTY_PRINT);
                    exit;
                } else {

                    $sql = "INSERT INTO users ( id, email, username, password_user, avatar, role_user, created_at)
                        VALUES ('$id', '', '$databody->username', '$password_hashmd5', '', 1, now())";
                    $conn->exec($sql);

                    echo json_encode(["status" => true, "message" => "sign up successful"], JSON_PRETTY_PRINT);
                    // echo "<br>";
                    // var_dump("INSERT INTO DB COMPLETE");
                    // echo "<br>";
                    // echo json_encode($databody, JSON_PRETTY_PRINT);
                    exit;
                }
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
