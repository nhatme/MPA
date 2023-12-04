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
}
