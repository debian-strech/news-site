<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php

                /** @var TYPE_NAME $articles */
                foreach($articles as $article):?>

                    <article class="post post-list">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="post-thumb">

                                    <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" height="200" alt="" class="pull-left"></a>

                                    <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"


                                       class="post-thumb-overlay text-center">

                                        <div class="text-uppercase text-center">Посмотреть</div>

                                    </a>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="post-content">

                                 <header class="entry-header text-uppercase">

                                     <div class="p-content">

                                   <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><h4><?= $article->title?></h4></a>

                                    </header>

                                    <div class="entry-content">

                                        <p>
                                        <h6>Категория: <?= $article->category->title?></h6>

                                        </p>

                                    </div>

                                </div>




                                <p style="text-align: left"><i><b>Теги:</b></i>

                                    <?php $response_array = array();

                                    foreach ($article->tags as $tag) {

                                        echo $tag->title  . "."  . "\n";
                                    }

                                    ?>

                                </p>

                                <span class="social-share-title pull-left text-capitalize">  опубликовано: <?= $article->getDate();?></span>

                                <div class="social-share">

                                <ul class="text-center pull-right">

                                    <h6> <li><a class="s-facebook" ="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?></h6>

                                </ul>


                                </div>






                            </div>

                        </div>

                    </article>

                <?php endforeach;?>

                <?php
                /** @var TYPE_NAME $pagination */
                echo LinkPager::widget([

                    'pagination' => $pagination

                ]);
                ?>
            </div>
            <?= /** @var TYPE_NAME $popular */
            /** @var TYPE_NAME $categories */
            /** @var TYPE_NAME $recent */
            $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>

        </div>

    </div>

</div>
<!-- end main content-->