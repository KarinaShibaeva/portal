<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $phone
 * @property string $child_surname
 * @property string $child_name
 * @property string $child_patronymic
 * @property string $child_age
 * @property int|null $status
 * @property int|null $user_id
 * @property int $category_id
 * @property int $section_id
 *
 * @property Category $category
 * @property Section $section
 * @property User $user
 */
class Records extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'records';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic', 'phone', 'child_surname', 'child_name', 'child_patronymic', 'child_age', 'category_id', 'section_id'], 'required'],
            [['status', 'user_id', 'category_id', 'section_id'], 'integer'],
            [['surname', 'name', 'patronymic', 'child_surname', 'child_name', 'child_patronymic', 'child_age'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 30],
            ['user_id', 'default', 'value' => Yii::$app->user->getId()],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'surname' => Yii::t('app', 'Фамилия'),
            'name' => Yii::t('app', 'Имя'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'phone' => Yii::t('app', 'Телефон'),
            'child_surname' => Yii::t('app', 'Фамилия'),
            'child_name' => Yii::t('app', 'Имя'),
            'child_patronymic' => Yii::t('app', 'Отчество'),
            'child_age' => Yii::t('app', 'Возраст'),
            'status' => Yii::t('app', 'Статус'),
            'user_id' => Yii::t('app', 'User ID'),
            'category_id' => Yii::t('app', 'Возрастная категория'),
            'section_id' => Yii::t('app', 'Кружок'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
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

    public function getStatus()
    {
        switch ($this->status){
            case 0:return'Ожидание';
            case 1:return'Принято';
            case 2:return'Отклонено';
        }
    }

    public function good()
    {
        $this->status = 1;
        return $this->save(false);
    }

    public function verybad()
    {
        $this->status = 2;
        return $this->save(false);
    }
}
