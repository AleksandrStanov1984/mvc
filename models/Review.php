<?php


class Review
{
    /** Returns single products items with specified id
     * @rapam integer &id
     * @param $id
     * @return array
     */
    public static function getReviewsItemByID($id)
    {
        $id = intval($id);

        try {
            if ($id) {
                $db = Db::getConnection();
                $result = $db->query('SELECT * FROM reviews WHERE product_id=' . $id);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                $reviewItem = $result->fetchAll();
                return $reviewItem;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function addReview($name_who_add_review, $appraisal, $comment, $product_id): bool
    {
        try {
            $db = Db::getConnection();

            $sql = "INSERT INTO reviews (name_who_add_review, appraisal, comment, product_id) VALUE (:name_who_add_review, :appraisal, :comment, :product_id)";
            $statement = $db->prepare($sql);

            $statement->bindParam(":name_who_add_review", $name_who_add_review);
            $statement->bindParam(":appraisal", $appraisal);
            $statement->bindParam(":comment", $comment);
            $statement->bindParam(":product_id", $product_id);
            $statement->execute();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}