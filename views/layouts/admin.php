<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'На сайт',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            //   'class' => 'navbar-inverse navbar-fixed-top',
            'class' => 'navbar',
            'render InnerContainer' => false,
        ],
    ]);


    echo Nav::widget([
        //'options' => ['class' => 'navbar-nav navbar-right'],
           'options' => ['class' => 'nav nav-pills nav-justified'],

        'items' => [


            ['label' => 'Новости', 'url' => ['/admin/article/index']],
            ['label' => 'Рубрики', 'url'=> ['/admin/category/index']],
            ['label' => 'Теги', 'url'=> ['/admin/tag/index']],

        ],
    ]);
    NavBar::end();
    ?>

    <p style="text-align: right">
        <button>
            <?= Html::beginForm(['/user/security/logout'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
            )
            . Html::endForm() ?>
        </button>
    </p>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php echo "<hr size=\"6px\">" ?>
        <?= $content ?>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;127.0.0.1 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<?php $this->registerJsFile('/ckeditor/ckeditor.js');?>
<?php $this->registerJsFile('/ckfinder/ckfinder.js');?>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })

</script>

</body>
</html>
<?php $this->endPage() ?>

