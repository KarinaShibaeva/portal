<?php

use app\models\Records;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\RecordsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Заявки');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'surname',
            //'name',
            //'patronymic',
            //'phone',
            'child_surname',
            'child_name',
            'child_patronymic',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->getStatus();
                }
            ],
            [
                'attribute' => 'Администрирование',
                'format' => 'html',
                'value' => function($data) {
                    switch ($data->status) {
                        case 0:
                            return Html::a('Одобрить', 'good/?id='.$data->id)."|".
                                Html::a('Отклонить', 'verybad/?id='.$data->id);
                        case 1:
                            return Html::a('Отклонить', 'verybad/?id='.$data->id)."|";
                        case 2:
                            return Html::a('Одобрить', 'good/?id='.$data->id)."|";
                    }
                }
            ],
            //'user_id',
            'category_id',
            'section_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Records $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
