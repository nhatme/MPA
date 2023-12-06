<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="file" placeholder="upload" name="image">
        <input type="submit" value="btn">
    </form>
</body>

</html>



<?php

function uploadImage($file)
{
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
                    $uploadDirectory = "./view/src/img/uploads/coin";

                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true);
                    }
                    $fileDestination = $uploadDirectory . "/" . $fileNameNew;
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
    return $message;
}

if (isset($_FILES["image"])) {
    $uploadResult = uploadImage($_FILES["image"]);
    echo $uploadResult;
}
