<?php
namespace app\controllers;

use app\models\Country;
use yii\base\Controller;
use yii\data\Pagination;
class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset(($pagination->offset))
            ->limit($pagination->limit)
            ->all();


        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);

    }
}