<?php

namespace app\models;

use Yii;
use yii\base\Model;
use cinghie\userextended\models\Profile;
use cinghie\userextended\models\User;



class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3, 250]]
        ];
    }

    /**
     * @param $article_id
     * @return bool
     */




    public function saveComment($article_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->article_id = $article_id;
        $comment->status = 1; //подтверждение коммента 0-ожидание
        $comment->user->username;
        $comment->date = date('Y-m-d');

         return $comment->save();

    }







}
