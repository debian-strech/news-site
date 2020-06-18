<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= /** @var TYPE_NAME $selectedCategory */
    /** @var TYPE_NAME $categories */
    Html::dropDownList('category', $selectedCategory, $categories, ['class'=>'form-control']) ?>

    <div class="form-group">

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
