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
<h3 class="text-center">О нас</h3>
<p class="fs-4 text-center">Это онлайн-платформа, которая предлагает различные кружки и занятия для детей. Он создан с целью развития и обучения детей разного возраста в различных областях.</p>
<p class="fs-4 text-center">На сайте также можно найти расписание занятий, информацию о педагогах, отзывы родителей и детей.</p>

<div id="carouselExample" class="carousel slide w-50">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../images/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/4.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/5.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>