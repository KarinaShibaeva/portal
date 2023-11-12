<?php

/** @var yii\web\View $this */
/** @var app\models\Comment $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$items=\app\models\Category::find()
    ->select(['name','id'])
    ->indexBy('id')
    ->column();
$items2=\app\models\Section::find()
    ->select(['name','id'])
    ->indexBy('id')
    ->column();
$this->title = '';

?>
<style>

    .testimonial blockquote {
        margin: 10px 10px 0;
        background: #efefef;
        padding: 20px 60px;
        position: relative;
        border: none;
        border-radius: 8px;
        font-style: italic;
    }

    .testimonial blockquote:before,
    .testimonial blockquote:after {
        content: "\201C";
        position: absolute;
        font-size: 80px;
        line-height: 1;
        color: #757f9a;
        font-style: normal;
    }

    .testimonial blockquote:before {
        top: 0;
        left: 10px;
    }

    .testimonial blockquote:after {
        content: "\201D";
        right: 10px;
        bottom: -0.5em;
    }

    .testimonial div {
        width: 0;
        height: 0;
        border-left: 0 solid transparent;
        border-right: 20px solid transparent;
        border-top: 20px solid #efefef;
        margin: 0 0 0 10px;
    }

    .testimonial p {
        margin: 8px 0 0 20px;
        text-align: left;
        color: #000000;
    }
    .btn{
        background: #40176C;
        color: white;
    }
</style>

<div class="site-index d-flex justify-content-center flex-column">

    <?php foreach ($sections as $section):?>
        <div class="card w-75">
            <img src="../images/<?php echo $section['image'];?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $section['name'];?></h5>
                <p class="card-text"><?php echo $section['description'];?></p>
                <a href="<?php echo Url::toRoute(['site/record']) ?>" class="btn btn-light">Записаться на кружок</a>
                <h5 class="mt-3">Отзывы</h5>
                <?php foreach ($status as $comment):?>
                    <div id="content">
                        <div class="testimonial">
                            <blockquote>
                                <?php echo $comment['body']?>
                            </blockquote>
                            <div></div>
                            <p class="fw-bold">
                                <?php echo $comment->user->username?>
                            </p>
                        </div>
                    </div>
                <?php endforeach;?>
                <?if (!Yii::$app->user->isGuest):?>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'col-form-label mr-lg-3'],
                        'inputOptions' => ['class' => 'col-lg-3 form-control'],
                        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                    ],
                ]); ?>

                <?= $form->field($model, 'body')->textarea(['autofocus' => true]) ?>


                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-outline-secondary', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?php endif;?>
    <?php endforeach;?>
</div>