<?php


namespace app\controllers;

use app\models\Category;

use app\models\Product;

use Yii;

class ProductController extends AppController
{
    public function actionView($id){
        $id = Yii::$app->request->get('id');//id товара
        $product = Product::findOne($id);//сам продукт
//        if(empty($category))
//            throw new \yii\web\HttpException(404, 'Такого товара нет');
        return $this->render('view', compact('product'));
    }
}