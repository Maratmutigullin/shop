<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property float $price
 * @property string|null $keywords
 * @property string|null $description
 * @property string $img
 * @property int $hit
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }
public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
}
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'content', 'price', 'hit'], 'required'],
            [['category_id', 'hit'], 'integer'],
            [['content', 'description'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Контент',
            'price' => 'Цена',
            'keywords' => 'Ключевые описания',
            'description' => 'Мета-описание',
            'img' => 'Фото',
            'hit' => 'Хит',
        ];
    }
}
