<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//
AppAsset::register($this);
//PublicAsset::register($this);
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

<style>
    header, main, footer {
        max-width: 1800px;
        margin:  auto;
        border-left: 0px solid green;
        border-right: 0px solid green;
    }



    @media screen and (min-width: 900px) {/* если окно браузера больше максимальной ширины сайта */
        html {
            margin-left: calc(100vw - 100%);
            margin-right: 15px;
        }
    }
</style>

<body>

<?php $this->beginBody() ?>

<body style='background-color:#edeeef'>

<div class="navbar main-menu navbar-default">


    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"><a href="<?= Url::toRoute(['/'])?>">Блог</a></span>

            </div>




            <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">

                        <?php if(Yii::$app->user->isGuest):?>

                            <li><a href="<?= Url::toRoute(['/user/security/login'])?>">Войти</a></li>
                            <li><a href="<?= Url::toRoute(['/user/registration/register'])?>">Зарегистрироваться</a></li>



                         <?php else: ?>


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





                        <?php endif;?>




                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</nav>
<!--main-menu end-->

<?= $content ?>

<!--footer-widget start-->
<footer class="footer-widget-section">


        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">


            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="custom-post">
                        <div>
                        </div>
                        <div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2019 </a><i
                                class="fa fa-heart"></i><a href="#">Новости</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer-widget  end-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

