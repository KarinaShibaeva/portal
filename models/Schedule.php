<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $section_id
 * @property int $teacher_id
 * @property int $day_id
 * @property int $time_id
 *
 * @property Day $day
 * @property Section $section
 * @property Teacher $teacher
 * @property Time $time
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'teacher_id', 'day_id', 'time_id'], 'required'],
            [['section_id', 'teacher_id', 'day_id', 'time_id'], 'integer'],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'id']],
            [['time_id'], 'exist', 'skipOnError' => true, 'targetClass' => Time::class, 'targetAttribute' => ['time_id' => 'id']],
            [['day_id'], 'exist', 'skipOnError' => true, 'targetClass' => Day::class, 'targetAttribute' => ['day_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'section_id' => Yii::t('app', 'Section ID'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'day_id' => Yii::t('app', 'Day ID'),
            'time_id' => Yii::t('app', 'Time ID'),
        ];
    }

    /**
     * Gets query for [[Day]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Day::class, ['id' => 'day_id']);
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
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::class, ['id' => 'teacher_id']);
    }

    /**
     * Gets query for [[Time]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTime()
    {
        return $this->hasOne(Time::class, ['id' => 'time_id']);
    }
}
