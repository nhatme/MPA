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

                    $_SESSION["id"] = $result["id"];
                    $_SESSION["username"] = $databody->username;
                    $_SESSION["password"] = $password_hashmd5;
                    $_SESSION["role_user"] = $result["role_user"];
                    $_SESSION["avatar"] = $result["avatar"];

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



    public function editAdminProfile($file = null, $username = "", $currentPassword = "", $newPassword = "")
    {
        $u_img = "";
        $u_username = "";
        $u_pass = "";



        $queryUpdate = "";
        $message = "";
        $allowed = array("jpg", "jpeg", "png", "pdf");
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
            if (md5($currentPassword) != $_SESSION["password"]) {
                return "Password does not match";
            } else {
                $password_hashmd5 = md5($newPassword);
                $u_pass = $password_hashmd5;
                $queryUpdate .= "password_user = '" . $password_hashmd5 . "',";
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
            if(!empty($u_img)) $_SESSION["avatar"] = $u_img;
            if(!empty($u_username)) $_SESSION["username"] = $u_username;
            if(!empty($u_pass)) $_SESSION["password"] = $$u_pass;
            
            return "Success";
        }

        // if (md5($currentPassword) != $_SESSION["password"]) {
        //     return "Password does not match";
        // } else {



        //     $conn = connectDB();
        //     $sql = "UPDATE users SET
        //             username = '$username',
        //             password_user = '$password_hashmd5',
        //             avatar = '$fileNameNew'
        //             WHERE (id = '$idUser');";

        //     $stmt = $conn->prepare($sql);
        //     $stmt->execute();

        //     if ($stmt == false) {
        //         return "Error: ";
        //     } else {
        //         $_SESSION[""];
        //         $_SESSION["username"] = $username;
        //         $_SESSION["password"] = $password_hashmd5;
        //         return "Success";
        //     }
        // }
    }
}
