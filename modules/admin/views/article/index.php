<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Article;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\models\ImageUpload;


$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
         //    'description:ntext',
            //'content:ntext',
             'date',

            [

             'format' =>'html',
             'label' => 'Image',
             'value' => function($data){
             
         return Html::img($data->getImage(), ['width'=>250]);

             
             }

        ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
