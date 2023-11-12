<?php



$this->title = 'My Yii Application';
?>
<style>
    .btn{
        background: #40176C;
        color: white;
    }
</style>
    <div class="jumbotron text-center bg-transparent mt-4 mb-5 d-flex align-items-center">
        <div class="d-flex flex-column">
        <h1 class="display-4">Академия развития</h1>
            <p class="fs-3">Запишите своего ребенка на кружок прямо сейчас!</p>
        <p><a class="btn btn-lg" href="<?php echo \yii\helpers\Url::toRoute(['site/about'])?>">Каталог кружков</a></p>
        </div>
            <img src="../images/logo.png" class="w-50">
    </div>
<div class="d-flex flex-column align-items-center">
