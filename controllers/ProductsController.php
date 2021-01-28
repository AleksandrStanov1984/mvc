<?php

include_once ROOT . '/models/Products.php';
include_once ROOT . '/models/Review.php';


class ProductsController
{
    public function actionIndex(): bool
    {
        $count= 1;
        $countReview = array();
        $productList = array();

        $productList = Products::getProductsList();

        foreach ($productList as $p) {
            $reviewList = Review::getReviewsItemByID($p['id']);

            foreach ($reviewList as $r ) {
                $count++;
            }
            array_push($countReview, $count);
            $count = 1;
        }

        $data = ['productList' => $productList,
            'countReview' => $countReview
        ];

        require_once(ROOT . '/views/products/index.php');
        return true;
    }

    public function actionAdd(): bool
    {
        require_once(ROOT . '/views/products/addProduct.php');
        return true;
    }

    public function actionAddNew(): bool
    {
        $name = $_POST['name_product'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $nameWhoAdd = $_POST['name_user'];

        $yes = Products::addProduct($name, $img, $price, $nameWhoAdd);

        ProductsController::actionIndex();
        if ($yes) {
            ProductsController::actionIndex();
            return true;
        } else {
            return false;
        }
    }
}

