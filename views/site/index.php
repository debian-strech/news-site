<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php /** @var TYPE_NAME $articles */
                foreach($articles as $article):?>
                    <article class="post">

                        <div class="post-thumb">

                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" height="430" alt=""></a>

                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">

                                <div class="text-uppercase text-center">Посмотреть</div>

                            </a>
                        </div>


                        <div class="post-content">

                        <div class="p-content">


                        <div class="text-uppercase text-center">

                        <br>

                         <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><h3><?= $article->title?></h3></a>

                         </div>

                          <p style="text-align: left">

                           <p><i><b><?= $article->description?></b></i>

                            </p>

                        </div>

                            <div class="entry-content">

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Продолжить чтение</a>
                                </div>
                            </div>

                            <div class="social-share">

                            <div class="p-content">


                                <h6><i><b>Теги:</b>
                                        <?php $response_array = array();

                                        foreach ($article->tags as $tag) {
                                            echo $tag->title  . "."  . "\n";
                                        }
                                        ?></i></h6>
                                </p>

                                <span class="social-share-title pull-left text-capitalize">опубликовано <?= $article->getDate();?></span>

                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" ="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?php
                /** @var TYPE_NAME $pagination */
                echo LinkPager::widget([
                    'pagination' => $pagination
                     
                ]);
                ?>
            </div>
            <?= /** @var TYPE_NAME $popular */
            /** @var TYPE_NAME $recent */
            /** @var TYPE_NAME $categories */
            $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories,
                'tags'=>$tag
            ]);?>
        </div>

    </div>

    <body>

    <p align="right"   <a href="#" onclick="return up()"><img src="/public/images/str2.jpeg" width="30" height="40" title='наверх' /></a></p>

    </body>


</div>
<!-- end main content-->
<!--footer start-->