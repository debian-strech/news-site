<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException as NotFoundHttpExceptionAlias;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use yii\web\UploadedFile;
use app\modules;
use app\models\Category;
use app\models\Tag;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),//
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->saveArticle()) {

         //   var_dump(Yii::$app->request->post()); die;
         //   var_dump($model->attributes);die;

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)

    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {

            return $model;
        } else {

            throw new NotFoundHttpExceptionAlias('The requested page does not exist.');
        }

    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionSetImage($id)

    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost)

        {

            $article = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');

        if ($article->saveImage($model->uploadFile($file, $article->image)))

            {
                return $this->redirect(['view', 'id'=>$article->id]);

            }

        }

        return $this->render('image', ['model'=>$model]);
    }


    public function actionSetCategory($id)
    {
        $article = $this->findModel($id);

        $selectedCategory = ($article->category) ? $article->category->id : '0';
     //   ($selectedCategory = ($article->category) ? $article->category->id : '0');


        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        if(Yii::$app->request->isPost)
        {
            $category = Yii::$app->request->post('category');
            if($article->saveCategory($category))
            {
                return $this->redirect(['view', 'id'=>$article->id]);
            }
        }

        return $this->render('category', [
            'article'=>$article,
            'selectedCategory'=>$selectedCategory,
            'categories'=>$categories

        ]);
    }

    public function actionSetTags($id)

    {
        $article = $this->findModel($id);

        $selectedTags = $article->getSelectedTags();
       // var_dump($selectedTags);die;
        $tags = ArrayHelper::map(Tag::find()->all(), 'id', 'title');


        if(Yii::$app->request->isPost)

        {

            $tags = Yii::$app->request->post('tags');

            $article->saveTags($tags);

            return $this->redirect(['view', 'id' => $article->id]);

        }

        return $this->render('tags', [

            'selectedTags'=>$selectedTags,

            'tags'=>$tags
        ]);
    }


}

