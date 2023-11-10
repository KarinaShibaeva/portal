<?php

namespace app\models;

use Yii;

class RegisterForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $username;
    public $password;
    public $password_repeat;
    public $name;
    public $surname;
    public $patronymic;
    public $email;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'name', 'surname', 'email', 'password_repeat'], 'required'],
            // rememberMe must be a boolean value
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => 'app\models\User',
                'message' => 'Пользователь с таким именем уже существует'],
            ['email', 'unique', 'targetClass' => 'app\models\User',
                'message' => 'Пользователь с таким email уже существует'],
            ['patronymic', 'string'],
            [['name', 'surname', 'patronymic'], 'match', 'pattern' => '/^[а-яёА-ЯЁ]++$/u',
                'message' => 'Фамилия, имя и отчество могут содержать только буквы русского алфавита'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'string'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat', 'message' => 'Пароли не совпадают'],
            // password is validated by validatePassword()

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Логин'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
            'password_repeat' => Yii::t('app', 'Повтор пароля'),
            'is_admin' => Yii::t('app', 'Is Admin'),
        ];
    }

    public function register(){
        if(!$this->validate()){
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->email = $this->email;
        $user->HashPassword($this->password);

        return $user->save() ? $user : null;
    }

}
