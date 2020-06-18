<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ImageUpload;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Добавить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>

        <?= Html::a('Добавить категорию', ['set-category', 'id' => $model->id], ['class' => 'btn btn-default']) ?>

        <?= Html::a('Добавить теги', ['set-tags', 'id' => $model->id], ['class' => 'btn btn-default']) ?>

        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
             'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'content:ntext',
            'date',
            'image',
            'viewed',
            'user_id',
            'status',
            'category_id',
            'tag_id',
        ],
    ]) ?>

</div>
