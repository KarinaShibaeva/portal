<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Наши учителя';
?>
<style>
    .card-img-top {
        width: 100%;
        height: 23vw;
        object-fit: cover;
    }
</style>
<div class="site-about">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p class="fs-5 text-center">Наш сплоченный коллектив высококвалифицированных преподавателей уже 7 лет помогают нашим ученикам достигать высоких результатов в их увлечениях!</p>
<div class="d-flex flex-wrap justify-content-around">
    <?php foreach ($sections as $section):?>
        <div class="card mt-3 shadow rounded" style="width: 18rem;">
            <img src="../images/<?php echo $section->teacher->image?>" class="card-img-top img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $section->teacher->surname .' '. $section->teacher->name .' '. $section->teacher->patronymic?></h5>
            <p><?php echo $section->name?></p>
            </div>
        </div>
    <?php endforeach;?>
</div>