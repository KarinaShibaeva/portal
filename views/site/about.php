<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Каталог кружков';

?>
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
    .btn{
        background: #40176C;
        color: white;
    }
</style>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex justify-content-around align-content-start">
        <div class="">
            <h5>Категории</h5>
            <div class="card" style="width: 12rem;">
                <ul class="list-group list-group-flush">
                    <?php foreach ($categories as $category):?>
                    <li class="list-group-item"><a href="<?php echo Url::toRoute(['site/section', 'id'=>$category['id']]); ?>" class="text-dark text-decoration-none">
                            <?php echo $category['name']?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-between w-100 ms-2">
            <?php foreach ($sections as $section):?>
                <div class="card mt-3" style="width: 18rem;">
                    <img src="../images/<?php echo $section['image']?>" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $section['name']?></h5>
                        <a href="<?php echo Url::toRoute(['site/contact', 'id'=>$section->id]) ?>" class="btn btn-light">Подробнее</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    </div>
    <div class="h-100 d-flex align-items-center justify-content-center mt-5">
        <?php echo LinkPager::widget([
            'pagination' => $pages,]);?>
    </div>
</div>
