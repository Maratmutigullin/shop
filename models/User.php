<?php

namespace app\models;
use yii\db\ActiveRecord;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    //все данные берем из БД User
    public static function tableName()
    {
        return 'user';
    }
////    public $id;
////    public $username;
////    public $password;
////    public $authKey;
////    public $accessToken;
//
//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);//возвращает пользователя по его $id
    }

    /**
     * {@inheritdoc}
     */
    //не нужен этот метод
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        return static::findOne(['access_token'=> $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username'=> $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
        //return $this->password === $password;
    }
    //метод генерации случайной строки для поля auth_key
    public function generateAuthKey(){
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }
}
