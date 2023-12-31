<?php

namespace app\models;

use app\models\base\Categories;
use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

class Products extends \app\models\base\Products
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function getCate()
    {
        $cate = Categories::find()->all();
        $options = [];
        foreach ($cate as $item) {
            $options[(int)$item->id] = $item->name;
        }
        return $options;
    }

    public static function getAllCategories()
    {
        $cate = Categories::find()->all();
        $options = [];
        foreach ($cate as $item) {
            $options[] = $item->name;
        }
        return $options;
    }

    public static function getStatus()
    {
        return [
            self::ACTIVE => 'Hoạt động',
            self::INACTIVE => 'Khóa'
        ];
    }

    public function getCategory()
    {
        return (string)Categories::findOne(['id' => $this->category_id])->name;
    }

    public function getProductOfCate($cate, $limit)
    {
        return Products::find()->where(['category_id' => $cate])->andWhere(['<>', 'id', $this->id])->limit($limit)->all();
    }
    public function inCart(){
        $user = Yii::$app->user->identity;
        $cart = $user->getCart();
        $list = [];
        foreach ($cart as $item){
            $list[] = $item[0];
        }
//        var_dump($favorite);
//        die();
//        var_dump(in_array($this, $list));
//        die();
        return in_array($this, $list);
    }
    public static function getPercentCate(){
        $total = Products::find()->count();
        $cates = Categories::find()->all();
        $result = [];
        foreach ($cates as $cate){
            $products = Products::find()->where(['category_id' => $cate->id])->count();
            $result[] = $products/$total*100;
        }
        return $result;
    }
}

