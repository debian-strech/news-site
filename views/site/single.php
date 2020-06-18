<?php
use yii\helpers\Url;
use app\models\Tags;
use app\models\Article;
?>
<head>
    <title>
        linux,windows,программирование,веб сервер.
    </title>

</head>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">


                        <a ="<?= /** @var TYPE_NAME $article */

                        Url::toRoute(['site/view', 'id' => $article->id])?>"><img src=" <?= $article->getImage();?>"  width="354" height="450" alt=""></a>

                        </div>

                        <div class="post-content">

                        <header class="entry-header text-center text-uppercase">


                        <h1 class="entry-title"><a ="<?= Url::toRoute(['site/view','id'=>$article->id])?>"><?= $article->title?></a></h1>


                        </header>




                            <?= $article->content?>



                    <!--    <div class="decoration">
                             <a href="#" class="btn btn-default">Decoration</a>
                            <a href="#" class="btn btn-default">Decoration</a>
                        </div>
-->

                        <div class="social-share">
                            <div class="entry-content">


                                <div class="p-content">
                                    <a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"><h6><b><i>Категория:<b><?= $article->category->title?><i></h6></a>

                                </div>

                                <h6><i><b>Теги:</b>
                                        <?php $response_array = array();

                                        foreach ($article->tags as $tag) {
                                            echo $tag->title  . "."  . "\n";
                                        }
                                        ?></i></h6>
                            </div>


                            <span class="social-share-title pull-left text-capitalize"> Автор: <?= $article->author->username;?>,-<br> опубликовано <?= $article->date ?></span>

                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="https://facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>


                <?= /** @var TYPE_NAME $comments */
                /** @var TYPE_NAME $commentForm */
                $this->render('/partials/comment', [
                    'article'=>$article,
                    'comments'=>$comments,
                    'commentForm'=>$commentForm

                ])?>

            </div>

            <?= /** @var TYPE_NAME $recent */
            /** @var TYPE_NAME $popular */
            /** @var TYPE_NAME $categories */
            $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories,
                //'tags'=>$tags

            ]);?>

    </div>

    </div>

    <body>

    <p align="right"   <a href="#" onclick="return up()"><img src="/public/images/str2.jpeg" width="30" height="40" title='наверх' /></a></p>

    </body>
</div>

<!-- end main content-->