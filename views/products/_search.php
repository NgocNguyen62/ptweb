<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\ProductsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'original_price') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
