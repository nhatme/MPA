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
            if (isset($databody->username)) {

                $password = strtolower($databody->password);

                $resultUsername = self::queryUsername($databody->username);
                $resultPassword = self::queryPassword($password);

                // echo " this is result: <br>";
                // echo json_encode($result, JSON_PRETTY_PRINT);
                // echo "<br>";

                if (empty($databody->username) || empty($password)) {
                    echo json_encode(["status" => false, "message" => "Do not empty your fields", "result" => "", "redirect" => ""], JSON_PRETTY_PRINT);
                    exit;
                }

                if (($resultUsername != false) && ($resultPassword != false)) {
                    $result = self::querylogin($databody->username, $password);

                    $_SESSION["id"] = $result["id"];
                    $_SESSION["username"] = $databody->username;
                    $_SESSION["password"] = $password;
                    $_SESSION["role_user"] = $result["role_user"];
                    $_SESSION["avatar"] = $result["avatar"];

                    echo json_encode(["status" => true, "message" => "Login is sucessfully", "result" => "", "redirect" => "Homepage"], JSON_PRETTY_PRINT);
                    exit;
                } else if (($resultUsername == false) && ($resultPassword != false)) {
                    echo json_encode(["status" => false, "message" => "Username or Password is incorrect !", "detailLogin" => "username k chinh xac (Tk khong ton tai)"], JSON_PRETTY_PRINT);
                    exit;
                } else if (($resultUsername != false) && ($resultPassword == false)) {
                    echo json_encode(["status" => false, "message" => "Username or Password is incorrect !", "detailLogin" => "password k chinh xac"], JSON_PRETTY_PRINT);
                    exit;
                } else {
                    echo json_encode(["status" => false, "message" => "Username or Password is incorrect !", "detailLogin" => "username va password k chinh xac"], JSON_PRETTY_PRINT);
                    exit;
                }
            }
        }
    }

    public function reqlogout()
    {
        unset($_SESSION["id"]);
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
                $password = strtolower($databody->password);

                $getUser = $conn->prepare("SELECT * FROM users where users.username = '$databody->username' ");
                $getUser->execute();

                $result = $getUser->fetch(PDO::FETCH_ASSOC);

                if ($result != false) {
                    echo json_encode(["status" => false, "message" => "An existed username"], JSON_PRETTY_PRINT);
                    exit;
                } else {

                    $sql = "INSERT INTO users ( id, email, username, password_user, avatar, role_user, created_at)
                        VALUES ('$id', '$databody->email', '$databody->username', '$password', '', 1, now())";
                    $conn->exec($sql);

                    echo json_encode(["status" => true, "message" => "sign up successful"], JSON_PRETTY_PRINT);
                    exit;
                }
            }
        }
    }

    public function getUsers($id)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM users where id = '$id';");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result != false) {
            $user_detail = new User(...$result);
            return $user_detail;
        }
    }

    public function userEditProfile($file = null, $username = "", $currentPassword = "", $newPassword = "")
    {
        $u_img = "";
        $u_username = "";
        $u_pass = "";

        $queryUpdate = "";
        $message = "";

        $allowed = array("jpg", "jpeg", "png", "pdf", "webp");
        if (isset($file) && $file['error'] == 0) {
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            $fileSize = $file["size"];
            $fileError = $file["error"];
            $fileType = $file["type"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = uniqid("", true) . "." . $fileActualExt;
                        if (!file_exists("./view/src/img/uploads/")) {
                            mkdir("./view/src/img/uploads/");
                        }
                        $fileDestination = "./view/src/img/uploads/" . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $queryUpdate .= "avatar = '" . $fileNameNew . "',";
                        $u_img = $fileNameNew;
                    } else {
                        $message = "your file is too big!";
                    }
                } else {
                    $message =  "there was an error uploading your file!";
                }
            } else {
                $message = "You cannot upload files of this type!";
            }
        }

        if (!empty($message)) {
            return $message;
        }

        $idUser = $_SESSION["id"];

        if ($username != "") {
            $queryUpdate .= "username = '" . $username . "',";
            $u_username = $username;
        }

        // pass
        if ($currentPassword != "" && $newPassword != "") {
            if (strtolower($currentPassword) != $_SESSION["password"]) {
                return "Password does not match";
            } else {
                $password = strtolower($newPassword);
                $u_pass = $password;
                $queryUpdate .= "password_user = '" . $password . "',";
            }
        }

        // update user
        $queryUpdate = rtrim($queryUpdate, ",");
        $conn = connectDB();
        $sql = "UPDATE users SET
                    $queryUpdate
                    WHERE (id = '$idUser');";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt == false) {
            return "Error: ";
        } else {
            if (!empty($u_img)) $_SESSION["avatar"] = $u_img;
            if (!empty($u_username)) $_SESSION["username"] = $u_username;
            if (!empty($u_pass)) $_SESSION["password"] = $u_pass;

            return "Success";
        }
    }

    public function createNewCurImg($file)
    {
        $message = "";
        $fileNameNew = "";
        $allowed = array("jpg", "jpeg", "png", "pdf", "webp");
        if (isset($file) && $file['error'] === 0) {
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            $fileSize = $file["size"];
            $fileError = $file["error"];
            $fileType = $file["type"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = uniqid("", true) . "." . $fileActualExt;
                        $uploadDir = "./view/src/img/uploads/coin/";
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir);
                        }
                        $fileDestination = $uploadDir . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    } else {
                        $message = "your file is too big!";
                    }
                } else {
                    $message =  "there was an error uploading your file!";
                }
            } else {
                $message = "You cannot upload files of this type!";
            }
        }
        return $fileNameNew;
    }

    public function createNewUserImg($file)
    {
        $message = "";
        $fileNameNew = "";
        $allowed = array("jpg", "jpeg", "png", "pdf", "webp");
        if (isset($file) && $file['error'] === 0) {
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            $fileSize = $file["size"];
            $fileError = $file["error"];
            $fileType = $file["type"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = uniqid("", true) . "." . $fileActualExt;
                        $uploadDir = "./view/src/img/uploads/";
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir);
                        }
                        $fileDestination = $uploadDir . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    } else {
                        $message = "your file is too big!";
                    }
                } else {
                    $message =  "there was an error uploading your file!";
                }
            } else {
                $message = "You cannot upload files of this type!";
            }
        }
        return $fileNameNew;
    }

    public function insertaddNewCurr($name_product = null, $symbol = null, $file = null, $price = null, $market_cap = null, $circulating_supply = null)
    {
        $fileNameImage = self::createNewCurImg($file);
        $id = uniqid();
        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO `mpa_db`.`crypto_currency` (`id`, `name_product`, `symbol`, `logo`, `price`, `market_cap`, `circulating_supply`)
            VALUES ('$id', '$name_product', '$symbol', '$fileNameImage', '$price', '$market_cap', '$circulating_supply');");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->execute();
    }

    public function getAllUsers()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM users where role_user = 1;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLatestRecord()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT *
        FROM users
        ORDER BY created_at DESC
        LIMIT 10;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function deleteUser($id)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = '$id';");
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createNewUser($file, $username, $password)
    {
        $fileNameImage = self::createNewUserImg($file);
        $id = uniqid();
        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO users (id, username, password_user, avatar, role_user, created_at)
        VALUES ('$id', '$username', '$password', '$fileNameImage', 1, now())");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $stmt->execute();
        if ($result == false) {
            return "Something went wrong!";
        }
        return $result;
    }

    public function updateUserByAdmin($idUser, $file = null, $email = null, $username = null, $password = null)
    {
        $avatar = self::createNewUserImg($file);
        $conn = connectDB();
        $sql = "UPDATE `mpa_db`.`users` 
        SET `email` = '$email',
         `username` = '$username',
          `password_user` = '$password',
           `avatar` = '$avatar' WHERE (`id` = '$idUser');";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
