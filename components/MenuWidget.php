<?php
namespace app\components;
use yii\base\Widget;
use app\models\Category;
use function Composer\Autoload\includeFile;
use Yii;
class MenuWidget extends Widget
{
    public $tpl;
    public $model;
    public $data;  //массив категории из базы данных
    public $tree; //результат работы функции
    public $menuHtml;
    public function init(){
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .='.php';
    }

    public function run()
    {
        //Получение данных из КЭША get cahe
        if($this->tpl == 'menu.php'){
            $menu = Yii::$app->cache->get('menu');
            if($menu) return $menu; /*если что то получено из кэша то это вернем*/
        }



        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        /*Если ничего нет в кэше то запишем туда set cahe*/
        if($this->tpl == 'menu.php'){
            Yii::$app->cache->set('menu', $this->menuHtml, 60);  /*menu -ключ кэша, this->menuHtml =данные, 60 - время кэширования*/

        }
        return $this->menuHtml;
    }
    protected function getTree(){ //строим дерево из массива данных категории
        $tree = [];
        foreach ($this->data as $id=>&$node){
            if(!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;


        }
        return $tree;
    }
    protected function getMenuHtml($tree,$tab = '')
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }
    protected function catToTemplate($category, $tab){
            ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
            return ob_get_clean();

    }

}