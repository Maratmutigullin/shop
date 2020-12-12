<?php


namespace app\controllers;
use app\models\OrderItems;
use app\models\Product;
use app\models\Cart;
use Yii;
use app\models\OrderMy;
use yii\base\Exception;

class CartController extends AppController
{
//Добавляем товар в корзину
    public function actionAdd(){
        $id = Yii::$app->request->get('id');//получаем id товара
        $product = Product::findOne($id);
        if(empty($product)) return false;
       $session = Yii::$app->session;//открываем сессию
       $session->open();
       $cart = new Cart();
       $cart->addToCart($product);
//       debug($_SESSION['cart']);
//       debug($_SESSION['cart.qty']);
//       debug($_SESSION['cart.sum']);
       //убираем из загрузки шаблон
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
//очистка корзины
    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    //удаление отдельных элементов корзины
    public function actionDelItem(){
        $id = Yii::$app->request->get('id');//получаем id товара
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);//метод пересчета корзины
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

//страница корзины
    public function actionShow(){
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new OrderMy();
        if($order->load(Yii::$app->request->post())){

//кличество и сумма если необходимо будет
            $order->qty = $session['cart.qty'];
           $order->sum = $session['cart.sum'];
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id );
                Yii::$app->session->setFlash('success', 'Ваш заказ принят.С вами свяжется менеджер в течении часа');

 //отправка письма  заказа по почте пользователю
                Yii::$app->mailer->compose('order', ['session'=>$session ])
                ->setFrom(['ecobike2020@mail.ru'=>'EcoBike'])
                ->setTo($order->email)
                ->setSubject('Заказ')
                ->send();


//отправка письма  заказа по почте админу
                Yii::$app->mailer->compose('order', ['session'=>$session ])
                    ->setFrom(['ecobike2020@mail.ru'=>'EcoBike'])
                    ->setTo('ecobike2020@mail.ru')
                    ->setSubject('Заказ')
                    ->send();


                $session->remove('cart');//очистка корзины
                $session->remove('cart.qty');//очистка корзины
                $session->remove('cart.sum');//очистка корзины
            return $this->refresh();// перезагружаем страницу
            }else{
                Yii::$app->session->setFlash('error', 'Произошла ошибка при оформлении заказа');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }
    protected function saveOrderItems($items, $order_id){
        foreach ($items as $id=> $item){
            $order_items = new OrderItems();
            $order_items ->order_id = $order_id;
            $order_items ->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items ->save();
        }
    }
}
