<div class="admin-default-index">
    <h1>Добро пожаловать в админ панель!</h1>
    <p>Здесь можно редактировать заявки и их категории</p>
    <div class="my-3">
        <button type="button" class="btn btn-success"><a href="<?php use yii\helpers\Url; echo Url::toRoute(['records/index'])?>" class="text-light text-decoration-none">Заявки</a></button>
        <button type="button" class="btn btn-success"><a href="<?php echo Url::toRoute(['schedule/index'])?>" class="text-light text-decoration-none">Раписание</a></button>
    </div>
</div>
