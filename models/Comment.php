<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 * @property int $user_id
 * @property int|null $section_id
 *
 * @property Section $section
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    //ActiveRecord::EVENT_BEFORE_INSERT => ['date', 'updated_at'],
                    //ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                //if you're using datetime instead of UNIX timestamp:
                'value' => new Expression('NOW()'), //смотри в zeal Behaviors, там пример TimestampBehavior, в таблицу надо добавить
                // 2 поля: created_at и updated_at, экспортировать Expression из use yii\db\Expression;
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'required'],
            [['body'], 'string'],
            ['user_id', 'default', 'value' => Yii::$app->user->getId()],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            //[['user_id'], 'integer'],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'body' => Yii::t('app', 'Оставьте свой отзыв'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'user_id' => Yii::t('app', 'User ID'),
            'section_id' => Yii::t('app', 'Section ID'),
        ];
    }

    /**
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /*public function saveComment()
    {
        $comments = new Comment();
        $sections = Section::findOne(6);
        $comments->body = $this->body;

        $comments->link('section', $sections);
        //$comments->user_id = $users->id;
        $comments->save();
    }*/

    public function getStatus()
    {
        switch ($this->status){
            case 0:return'Ожидание';
            case 1:return'Принято';
        }
    }
}
