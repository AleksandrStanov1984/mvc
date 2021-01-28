<?php

include_once ROOT . '/models/Products.php';
include_once ROOT . '/models/Review.php';


class ReviewController
{
    public function actionView($id): bool
    {
        $count = 0;
        $appr = 0;
        $prodId = $id;;

        if ($id) {
            $reviewItem = Review::getReviewsItemByID($id);
            $imgProduct = Products::getById($id);

            foreach ($reviewItem as $r) {
                $appr += $r['appraisal'];
                $count++;
            }
            if ($appr >= 1)
                $ap = $appr / $count;

            $img = '';
            foreach ($imgProduct as $r) {
                $img = $r['img'];
            }

            $data = ['reviewItem' => $reviewItem,
                'ap' => settype($ap, 'int'),
                'prodId' => settype($prodId, 'int'),
                'img' => settype($img, 'string')
            ];

            require_once(ROOT . '/views/products/view.php');
        }
        return true;
    }

    public function actionAddReview($id): bool
    {
        $name_who_add_review = $_POST['name'];
        $appraisal = $_POST['appraisal'];
        $comment = $_POST['comment'];

        if ($appraisal <= 10 && $appraisal >= 0) {

            $yes = Review::addReview($name_who_add_review, $appraisal, $comment, $id);
            if ($yes) {
                ReviewController::actionView($id);
                return true;
            } else
                return false;
        } else {
            ReviewController::actionView($id);
            return false;
        }
    }
}