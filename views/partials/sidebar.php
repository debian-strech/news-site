<?php

use yii\helpers\Url;

?>

<div class="col-md-4" data-sticky_column>

    <div class="primary-sidebar">

         <aside class="widget pos-padding">


             <u><h2 class="widget-title text-uppercase text-center">Рубрики.</h2></u>

             <ul>
                 <?php /** @var TYPE_NAME $categories */

                 foreach($categories as $category):?>

                 </h2>

                 <li>
                     <a href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>"><b><?= $category->title?></b></a>

                     <span class="post-count pull-right"> (<?= $category->getArticlesCount();?>)</span>

                 </li>

                 <h2>
                     <?php endforeach;?>

             </ul>



             <aside class="widget pos-padding">

                 <h3 class="widget-title text-uppercase text-center"><b><u>Новые новости.</u></b></h3>

                 <?php /** @var TYPE_NAME $popular */

                 foreach($popular as $article):?>

                     <div class="popular-post">

                         <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">

                             <div class="p-overlay"></div>

                         </a>

                         <div class="p-content">

                             <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="text-uppercase"><h4><?= $article->title?></h4></a>

                             <hr>

                             <div class="entry-content">




                                 <ul class="text-center pull-right">

                                     <h6> <i class="fa fa-eye"></i><?= (int) $article->viewed?></h6>
                                 </ul>

                             </div>
                         </div>

                         <span class="p-date"><?= $article->getDate();?></span>

                     </div>

                 <?php endforeach;?>



             </aside>
                 <aside class="widget pos-padding">

                     <h3 class="widget-title text-uppercase text-center"><b><u>Популярные новости.</u></b></h3>

                     <?php /** @var TYPE_NAME $popular */

                     foreach($popular as $article):?>

                         <div class="popular-post">

                             <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">

                                 <div class="p-overlay"></div>

                             </a>

                             <div class="p-content">

                                 <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="text-uppercase"><h4><?= $article->title?></h4></a>

                                 <hr>

                                 <div class="entry-content">




                                     <ul class="text-center pull-right">

                                         <h6> <i class="fa fa-eye"></i><?= (int) $article->viewed?></h6>
                                     </ul>

                                 </div>
                             </div>

                             <span class="p-date"><?= $article->getDate();?></span>

                         </div>

                     <?php endforeach;?>



         </aside>

        <aside class="widget border pos-padding">


<br>

    </div>

</div>