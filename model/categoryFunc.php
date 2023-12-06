<?php
include_once "model/connectDB.php";
include_once "model/categories.php";

class CategoryFunc
{
    public function getListCategories()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT c.* FROM mpa_db.categories as c
        inner join list_coins_category as l
        on c.id = l.id_category
        group by id;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function renderListCategories()
    {
        $listCategories = [];

        $categoryFunc = new CategoryFunc();
        $result = $categoryFunc->getListCategories();
        foreach ($result as $key => $value) {
            $categories = new Categories(...$value);
            $listCategories[$key] = $categories;
        }

        return $listCategories;
    }

    public function createNewCategory($name, $title, $description)
    {
        $id = uniqid();
        $conn = connectDB();
        $stmt = $conn->prepare("INSERT INTO `mpa_db`.`categories` (`id`, `name`, `title`, `description`)
            VALUES ('$id', '$name', '$title', '$description');");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $stmt->execute();
        if ($result == false) {
            return "Something went wrong!";
        }
        return $result;
    }

    public function getLatestRecord()
    {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT *
        FROM categories
        ORDER BY created_at DESC
        LIMIT 10;");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function deleteCategory($id)
    {
        $conn = connectDB();
        $stmt = $conn->prepare("DELETE FROM categories WHERE id = '$id';");
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCategByAdmin($id, $name, $title, $desc)
    {
        $conn = connectDB();
        $sql = "UPDATE `mpa_db`.`categories` 
        SET `name` = '$name',
         `title` = '$title',
          `description` = '$desc' WHERE (`id` = '$id');";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
