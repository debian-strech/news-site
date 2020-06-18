<?php

namespace app\models;

use Yii;
use yii\base\Component;
use yii\i18n\Formatter;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;


/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property int $viewed
 * @property int $user_id
 * @property int $status
 * @property int $c  ategory_id
 * @property  category_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description', 'content',], 'string'],
         // [['date'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], "default", 'value' => date('Y-m-d')],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'date' => Yii::t('app', 'Date'),
            'image' => Yii::t('app', 'Image'),
            'viewed' => Yii::t('app', 'Viewed'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Статус'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    public function saveImage($filename)

    {
        $this->image = $filename;

        return $this->save(false);
    }


    public function getImage()

    {

        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';

    }

    public function getProfile()


{

    return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';

}


    public function beforeDelete()

    {
        $this->deleteImage();

        return parent::beforeDelete();

    }


    public function deleteImage()

    {
        $imageUploadModel = new ImageUpload();

        $imageUploadModel->deleteCurrentImage($this->image);
    }



    public function getCategory()

    {

        return $this->hasOne(Category::className(), ['id' => 'category_id']);

    }


    public function saveCategory($category_id)

    {

        $category = Category::findOne($category_id);

        if ($category != null) {
            $this->link('category', $category);

            return true;
        }

    }

    public function getTags()

    {

        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id']);

    }


    public function getSelectedTags()

    {

        $selectedIds = $this->getTags()->select('id')->asArray()->all();

        return ArrayHelper::getColumn($selectedIds, 'id');

    }

    public function saveTags($tags)

    {

        if (is_array($tags))

        {


            $this->clearCurrentTags();


            foreach ($tags as $tag_id)

            {

                $tag = Tag::findOne($tag_id);

                $this->link('tags', $tag);

            }
        }

    }

    public function  clearCurrentTags()

    {

        ArticleTag::deleteAll(['article_id'=>$this->id]);

    }


    public static function getAll($pageSize = 6)

    {
        // build a DB query to get all articles
        $query = Article::find();

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();


    //    $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        //создать объект нумерации страниц с общим количеством
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>3]);


        //ограничить запрос с помощью нумерации страниц и получить статьи
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }



    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(2)->all();
    }

    public static function getRecent()
    {
        //return Article::find()->orderBy('date asc')->limit(3)->all();
        return Article::find()->orderBy('date desc')->limit(3)->all();

    }


    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id'=>'id']);
    }

    public function getArticleComments()
    {
        return $this->getComments()->where(['status'=>1])->all();
    }


    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save(true);
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }



    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }


    public function getDate()
    {

        return Yii::$app->formatter->asDate($this->date);

       //return Yii::$app->formatter->locale = 'ru-RU';
    }




}