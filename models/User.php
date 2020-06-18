<?php

namespace app\models;


use Yii;
use yii\web\IdentityInterface;

/**;
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property int $last_login_at
 * @property string $email
 * @property string $password_hash
 * @property int $asAdmin
 * @property string $photo
 * @property string $auth_key
 * @property int $confirmed_at
 * @property string $unconfirmed_email
 * @property int $blocked_at
 * @property string $registration_ip
 * @property int $created_at
 * @property int $updated_at
 * @property int $flags
 * @property int $email_verified_at default null
 *
 * @property Profile $profile
 * @property SocialAccount[] $socialAccounts
 * @property Token[] $tokens
 * @property mixed gravatar
 */
//class User extends \yii\db\ActiveRecord
class User extends \yii\db\ActiveRecord implements IdentityInterface


{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
        // return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at', 'email_verified_at default null', 'asAdmin'], 'required'],
            [['last_login_at', 'asAdmin', 'confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags', 'email_verified_at default null'], 'integer'],
            [['username', 'email', 'photo', 'avatar', 'unconfirmed_email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 45],
            [['email'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User_id'),
            'username' => Yii::t('app', 'Username'),
            'last_login_at' => Yii::t('app', 'Last Login At'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'asAdmin' => Yii::t('app', 'As Admin'),
            'photo' => Yii::t('app', 'Photo'),

            'avatar' => Yii::t('app', 'Avatar'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'confirmed_at' => Yii::t('app', 'Confirmed At'),
            'unconfirmed_email' => Yii::t('app', 'Unconfirmed Email'),
            'blocked_at' => Yii::t('app', 'Blocked At'),
            'registration_ip' => Yii::t('app', 'Registration Ip'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'flags' => Yii::t('app', 'Flags'),
            'email_verified_at default null' => Yii::t('app', 'Email Verified At Default Null'),
        ];
    }

//
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);//не нужна
    }

    //

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }


//
    public function getId()
    {
        return $this->id;
    }

//
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

//
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }


// TODO
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

//
    public static function findByEmail($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

//
    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;


    }

    //
    public function create()
    {
        return $this->save(false);
    }


   public function saveFromVk($uid, $name, $avatar) //не нужна ,толька для вк
    {
        $username = User::findOne($uid);
        if($username)
        {
            return Yii::$app->user->login($username);

            //'user'->$username;
        }

        $this->id = $uid;
        $this->username = $name;
        $this->profile = $avatar;
        $this->create();

        return Yii::$app->user->login($this);
    }

    public function getImage()
    {
        return $this->profile->getImageUrl();
    }




}
