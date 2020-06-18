<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\CommentForm;
use app\models\Tag;
use yii\imagine\Image;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;


class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];

    }


    public function actionsImagine()
    {

        Image::thumbnail('@webroot/web/users/imagine.png', 120, 120)
            ->save(Yii::getAlias('@webroot/web/imagine/imagine.png'), ['quality' => 80]);

        return $this->render('single');

    }




    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'backColor'=>0xFFFFFF, //цвет фона капчи
                'testLimit'=>2, //сколько раз капча не меняется

                'foreColor'=>0xE16020, //цвет символов
                'minLength' => 4,
                'maxLength' => 8,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,

            ],
        ];
    }

    public function actionIndex()
    {

        $data = Article::getAll(2);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        $tags = Tag::getAll(4);

        /** @var TYPE_NAME $tags */
        return $this->render('index',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tag'=>$tags


        ]);
    }


    public function actionView($id)
    {

        if (!$article = Article::findOne($id)) {

            throw new NotFoundHttpException('Article not found');

        }

        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();
        $article->viewedCounter();
        $tags = Tag::getAll();



        return $this->render('single', [
            'article' => $article,
            'popular' => $popular,
            'recent' => $recent,
            'categories' => $categories,
            'comments' => $comments,
            'commentForm' => $commentForm,
            'tag' => $tags


        ]);


    }


    public function actionComment($id)

    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                return $this->redirect(['site/view','id'=>$id]);
            }
        }
    }



    public function actionCategory($id)
    {

        $data = Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();

        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,

        ]);
    }

    public function actionTag($id)
    {

        $data = Tag::getArticlesByTag($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $tags = Tag::getAll();

        return $this->render('tag',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'tag'=>$tags,

        ]);
    }


    public function actionCache()
    {
        $cache = Yii::$app->cache;
        $data = $cache->get('my');
        $data = $cache->get('my2');
        if($data) {echo $data;}
        $cache->set('my', 'Данные для кэширования', 10);
        $cache->set('my2', 'Данные для кэширования', 10);
        $data = $cache->get('my');
        if($data) {echo $data;}
        //$cache->flush();
    }


}

