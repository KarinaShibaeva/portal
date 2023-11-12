<?php

/** @var app\models\Comment $model */

use yii\helpers\Url;

?>
<style>
    .card-img-top {
        width: 100%;
        height: 18vw;
        object-fit: cover;
    }
    .btn{
        background: #40176C;
        color: white;
    }
</style>
<div class="d-flex justify-content-evenly">
<?php foreach ($sections as $section):?>
    <div class="card mt-3" style="width: 25rem;">
        <img src="../images/<?php echo $section['image']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $section['name']?></h4>
            <p><?php echo $section['description']?></p>
        </div>
    </div>
<?php endforeach;?>
</div>
