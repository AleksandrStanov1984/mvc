<?php


class Products
{
    /**
     * Returns an array of products items
     */
    public static function getProductsList()
    {
        $productList = array();

        try {
            $db = Db::getConnection();
            $result = $db->query('SELECT id, name, img, date_to_add, price, name_who_add FROM products ORDER BY name ASC ');

            $i = 0;
            while ($row = $result->fetch()) {
                $productList[$i]['id'] = $row['id'];
                $productList[$i]['name'] = $row['name'];
                $productList[$i]['img'] = $row['img'];
                $productList[$i]['date_to_add'] = $row['date_to_add'];
                $productList[$i]['price'] = $row['price'];
                $productList[$i]['name_who_add'] = $row['name_who_add'];
                $i++;
            }

            return $productList;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function addProduct($name, $img, $price, $nameWhoAdd)
    {
        try {

            $db = Db::getConnection();

            $sql = "INSERT INTO products (name, img, price, name_who_add) VALUE (:name, :img, :price, :name_who_add)";
            $statement = $db->prepare($sql);

            $statement->bindParam(":name", $name);
            $statement->bindParam(":img", $img);
            $statement->bindParam(":price", $price);
            $statement->bindParam(":name_who_add", $nameWhoAdd);
            $statement->execute();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }


    public static function getById($id)
    {

        $id = intval($id);

        try {
            if ($id) {
                $db = Db::getConnection();
                $result = $db->query('SELECT * FROM products WHERE id=' . $id);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                $imgRes = $result->fetchAll();
                return $imgRes;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}