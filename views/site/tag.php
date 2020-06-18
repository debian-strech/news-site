
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

                                    <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">Посмотреть</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post-content">
                                    <header class="entry-header text-uppercase">


                                        <h5 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$tag->id]);?>"><?= $tag->title?></a></h5>

                                    </header>
                                    <div class="entry-content">

                                        <p>
                                        </p>
                                    </div>


                                    <h5><a href="<?= Url::toRoute(['site/tag','id'=>$tag->id])?>"> <?= $tag->title?></a></h5>




                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize"> Автор <?= $article->author->username;?>  опубликовано <?= $article->getDate();?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach;?>

                <?php echo LinkPager::widget([
                    'pagination' => $pagination

                ]);
                ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
               'category'=>$categories,
                'tags' => $tag
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->