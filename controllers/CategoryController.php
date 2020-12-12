<?php


namespace app\controllers;
use app\assets\AppAsset;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit'=>1])->limit(6)->all();// выбираем из БД продукты 6 избранных товаров у которых hit=1
//        debug($hits);
        $this->setMeta('BikeShop');//выводим title
        return $this->render('index',compact('hits'));
    }
    public function actionView($id){
     //   $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
      if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');

//       debug($id);
        //$products = Product::find()->where(['category_id'=>$id])->all();
        //пагинация
        $query = Product::find()->where(['category_id'=>$id]);
        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=>8, 'forcePageParam' => false, 'pageSizeParam'=>false]);//создаем обьект класа Pagination и передаем ему в параметрах общее количество записей которые будут вытащены запросом
        //6 количество выводимых товаров
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();//с какой записи начинать и какой лимит

        $this->setMeta('BikeShop | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products','pages', 'category'));
    }


    //реализауия поиска
    public function actionSearch(){
        $search = trim(Yii::$app->request->get('search'));
        $this->setMeta('BikeShop | Поиск:' . $search);
        if(!$search)
            return $this->render('search');
    //like - оператор поиска
        $query = Product::find()->where(['like', 'name', $search]);


        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=>8, 'forcePageParam' => false, 'pageSizeParam'=>false]);//создаем обьект класа Pagination и передаем ему в параметрах общее количество записей которые будут вытащены запросом
        //6 количество выводимых товаров
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();//с какой записи начинать и какой лимит
        return $this->render('search', compact('products', 'pages', 'search'));

    }
//    public function actionBike(){
//        $query= Product::find()->where(['category_id'=>2]);
//        //        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=>6, 'forcePageParam' => false, 'pageSizeParam'=>false]);
////        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
//        return $this->render('bike', compact( 'products', 'pages', 'product', 'category'));
//    }
}
