<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\RegisterForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';

?>
<style>
    .btn{
        background: #40176C;
        color: white;
    }
</style>
<div class="d-flex justify-content-center mt-3">
    <div class="card w-100 align-items-center shadow p-3 mb-5 rounded">
        <div class="card-body w-100">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста заполните все поля, чтобы зарегистрироваться:</p>



            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",

                ],
            ]); ?>
<div class="d-flex flex-column w-100 justify-content-between">
    <div class="d-flex justify-content-between">

        <div class="w-50 me-5"><?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?></div>

        <div class="w-50 me-5"><?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?></div>

        <div class="w-50"><?= $form->field($model, 'patronymic')->textInput(['autofocus' => true]) ?></div>

    </div>
    <div class="d-flex justify-content-between">

        <div class="w-50 me-5"><?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?></div>


        <div class="w-50"><?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?></div>
    </div>
    <div class="d-flex justify-content-evenly">

        <div class="w-50 me-5"><?= $form->field($model, 'password')->textInput(['autofocus' => true]) ?></div>

        <div class="w-50"><?= $form->field($model, 'password_repeat')->textInput(['autofocus' => true]) ?></div>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
        <label class="form-check-label" for="flexCheckDefault">
                    Согласие с правилами регистрации
        </label>
    </div>

    <div class="form-group mt-3">
        <div>
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-dark', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>


