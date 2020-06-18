<?php

namespace app\models;

use Yii;

use yii\data\Pagination;


/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $title
 */
class Tag extends \yii\db\ActiveRecord
{


  //  protected $name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    public function getArticles()

    {

        return $this->hasMany(Article::className(), ['id' => 'article_id'])
            ->viaTable('article_tag', ['tag_id' => 'id']);

    }


       public function getArticlesCount()

    {

        return $this->getArticles()->count();

    }


    public static function getAll()

    {
        return Tag::find()->all();
    }

    public static function getArticlesByTag($id)
    {
        //todo
        //построить запрос БД, чтобы получить все статьи
        $query = Article::find()->where(['tag_id'=>$id]);

        // получить общее количество статей (но пока не получить данные о статье)
        $count = $query->count();

        // создать объект нумерации страниц с общим количеством
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>5]);

        // ограничить запрос с помощью нумерации страниц и получить статьи
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }


}
