<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article_tag}}".
 *
 * @property int $id
 * @property int $article_id
 * @property int $tag_id
 */
class ArticleTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'tag_id'], 'required'],
            [['id', 'article_id', 'tag_id'], 'integer'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'article_id' => Yii::t('app', 'Article ID'),
            'tag_id' => Yii::t('app', 'Tag ID'),
        ];
    }
}
