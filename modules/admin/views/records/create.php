<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Records $model */

$this->title = Yii::t('app', 'Create Records');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
