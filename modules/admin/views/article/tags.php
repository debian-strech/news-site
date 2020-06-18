<?php
/**
 * Created by PhpStorm.
 * User: jessie
 * Date: 22.12.18
 * Time: 23:13
 */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= /** @var TYPE_NAME $selectedTags */
    /** @var TYPE_NAME $tags */
    Html::dropDownList('tags', $selectedTags, $tags, ['class'=>'form-control', 'multiple'=>true]) ?>

    <div class="form-group">

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>