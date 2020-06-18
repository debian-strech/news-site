<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\ImageUpload;
use yii\models\Article;

?>


<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


     <div class="form-group">

     <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

     </div>

<?php ActiveForm::end(); ?>





</div>