<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\Records $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\MaskedInput;

$items = \app\models\Category::find()
    ->select(['name', 'id'])
    ->indexBy('id')
    ->column();

$items1 = \app\models\Section::find()
    ->select(['name', 'id'])
    ->indexBy('id')
    ->column();

$this->title = 'Отправка заявки';

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

            <p>Пожалуйста заполните все поля, чтобы отправить заявку:</p>


            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    /*'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],*/
                ],
            ]); ?>
            <h5>Данные родителя:</h5>
            <div class="d-flex justify-content-between">
                <div class="w-25 me-2"><?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'patronymic')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25"><?= $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7(999)-999-99-99']) ?></div>
            </div>
            <h5>Данные ребенка:</h5>
            <div class="d-flex justify-content-between">
                <div class="w-25 me-2"><?= $form->field($model, 'child_surname')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'child_name')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'child_patronymic')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25"><?= $form->field($model, 'child_age')->textInput(['autofocus' => true]) ?></div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-50 me-2"><?= $form->field($model, 'category_id')->dropdownList($items,['prompt' => 'Выбрать возрастную категорию']) ?></div>

                <div class="w-50 me-2"><?= $form->field($model, 'section_id')->dropdownList($items1,['prompt' => 'Выбрать кружок']) ?></div>
            </div>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-dark', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

